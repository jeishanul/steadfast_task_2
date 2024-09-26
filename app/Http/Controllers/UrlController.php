<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function home()
    {
        $urls = request()->user()->urls()->latest()->get();
        return view('home', compact('urls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url|max:255'
        ]);

        $shortCode = Str::random(6);
        
        request()->user()->urls()->create([
            'long_url' => $request->long_url,
            'short_code' => $shortCode,
        ]);

        return back()->withSuccess(__('Short URL generated successfully.'));
    }

    public function shorten($code)
    {
        $url = Url::where('short_code', $code)->firstOrFail();
        $url->increment('clicks');
        return redirect($url->long_url);
    }
}

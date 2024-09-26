@extends('layouts.app')
@section('title', 'URL Details')
@section('content')
    <div class="container">
        <h2>URL Details</h2>
        <div class="card">
            <div class="card-header">Shortened URL Info</div>
            <div class="card-body">
                <p><strong>Original URL:</strong> {{ $url->long_url }}</p>
                <p><strong>Short URL:</strong> <a href="{{ route('url.shorten', $url->short_code) }}"
                        target="_blank">{{ route('url.shorten', $url->short_code) }}</a></p>
                <p><strong>Click Count:</strong> {{ $url->clicks }}</p>
            </div>
        </div>

        <a href="{{ route('urls.index') }}" class="btn btn-primary mt-3">Back to URL List</a>
    </div>
@endsection

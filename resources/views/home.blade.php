@extends('layouts.app')
@section('title', 'URL List')
@section('content')
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <form role="form" action="{{ route('url.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-10">
                            <x-input-group label="Long URL" type="text" name="long_url" id="long_url"
                                placeholder="Enter your long url" required />
                        </div>
                        <div class="col-2">
                            <x-button type="submit" class="btn btn-primary btn-block w-100 shorten-url-btn"
                                label="Shorten URL" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-title w-100">{{ __('Shortened URL List') }}</div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('S.N') }}</th>
                            <th>{{ __('Original URL') }}</th>
                            <th>{{ __('Short URL') }}</th>
                            <th>{{ __('Click Count') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($urls->isNotEmpty())
                            @foreach ($urls as $url)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::limit($url->long_url ?? 'N/A', 50) }}</td>
                                    <td>
                                        <a href="{{ route('url.shorten', $url->short_code) }}" target="_blank">
                                            {{ route('url.shorten', $url->short_code) }}
                                        </a>
                                    </td>
                                    <td>{{ $url->clicks }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#shortedUrlDetails{{ $url->id }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <div class="modal fade" id="shortedUrlDetails{{ $url->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="shortedUrlDetailsTitle{{ $url->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered static" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="shortedUrlDetailsTitle{{ $url->id }}">
                                                            {{ __('Shortened URL Details') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-text">
                                                            <strong>{{ __('Original URL') }} :</strong>
                                                            {{ $url->long_url }}
                                                        </div>
                                                        <div class="card-text">
                                                            <strong>{{ __('Short URL') }} :</strong>
                                                            <a href="{{ route('url.shorten', $url->short_code) }}"
                                                                target="_blank">{{ route('url.shorten', $url->short_code) }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                            {{ __('Close') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">{{ __('No shortened URLs found') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

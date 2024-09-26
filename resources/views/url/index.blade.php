@extends('layouts.app')
@section('title', 'URL List')
@section('content')
    <div class="container">
        <h2>Your Shortened URLs</h2>

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to create new short URL -->
        <form action="{{ route('url.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="long_url">Enter Long URL</label>
                <input type="url" name="long_url" id="long_url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Shorten URL</button>
        </form>

        <!-- Listing all the URLs -->
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Original URL</th>
                    <th>Short URL</th>
                    <th>Click Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($urls as $url)
                    <tr>
                        <td>{{ $url->long_url }}</td>
                        <td><a href="{{ route('url.shorten', $url->short_code) }}"
                                target="_blank">{{ route('url.shorten', $url->short_code) }}</a></td>
                        <td>{{ $url->clicks }}</td>
                        <td><a href="{{ route('url.show', $url->id) }}" class="btn btn-info">View Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

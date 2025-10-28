@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-white border-bottom">
                <h4 class="mb-0">Create New Post</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') }}" placeholder="Enter post title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="5"
                            placeholder="Write your post content here..." required>{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

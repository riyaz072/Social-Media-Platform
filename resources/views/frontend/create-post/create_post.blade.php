@extends('frontend.layouts.app')
@section('title', 'New Post')

@section('contents')

    <div class="container mt-5">
        <form action="{{ route('create-post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="form-control" class="form-label">Caption</label>
                <input type="text" class="form-control" name="caption">
                @error('caption')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="form-control" class="form-label">Select Image</label>
                <input type="file" class="form-control" name="post_image[]" multiple>
                @error('post_image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-3">Post</button>
            <a href="{{ route('profile.index') }}" class="btn btn-secondary mb-3">Back</a>
        </form>
    </div>

@endsection

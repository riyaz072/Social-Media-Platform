@extends('frontend.layouts.app')

@section('title', 'Profile')

@section('contents')

    <div class="bg-white">
        <div class="row  p-3">
            <div class="col-md-3">
                <img src="{{ $user->image_url }}" class="img-thumbnail mt-2 rounded-circle" alt="Profile Picture" width="150" height="150">
            </div>
            <div class="col-md-3 mt-4 text-center">
                <h4>Posts</h4>
                <h3>573</h3>
            </div>
            <div class="col-md-3 mt-4 text-center">
                <h4>Followers</h4>
                <h3>291M</h3>
            </div>
            <div class="col-md-3 mt-4 text-center">
                <h4>Following</h4>
                <h3>244</h3>
            </div>
        </div>

        {{--  --}}

        <div class="row ">
            <div class="col-md-12 mx-3">
                <h5 class="text-dark font-weight-bold">{{ $user->first_name }} {{ $user->last_name }}</h5>
                <h6 class="text-dark">{{ $user->bio }}</h6>
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>

    </div>

@endsection

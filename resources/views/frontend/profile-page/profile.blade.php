@extends('frontend.layouts.app')

@section('title', 'Profile')

@section('contents')

<div class="bg-white">
    <div class="row p-3">
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

    <div class="row">
        <div class="col-md-12 mx-3">
            <h5 class="text-dark font-weight-bold">{{ $user->first_name }} {{ $user->last_name }}</h5>
            <h6 class="text-dark">{{ $user->bio }}</h6>
            <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>

    <hr>

    <div class="row">
        @foreach ($posts as $i => $post)
            <div class="col-md-4 mt-2">
                <div class="card bg-dark" style="width: 18rem;">
                    <div id="carouselExample{{ $i }}" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($post->images as $j => $image)
                                <div class="carousel-item @if ($j == 0) active @endif">
                                    <img src="{{ asset('storage/images/' . $image->post_image) }}" class="d-block w-100 post-images" alt="post" height="250">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{ $i }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{ $i }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="card-body text-light h-25">
                        <p class="card-text">{{ $post->caption }}</p>
                        <p id="like-count-{{ $post->id }}"> Likes</p>
                        <form action="" method="POST" id="delete-form-{{ $post->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="float-end btn btn-outline-danger editBtnForPost mx-2" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                        <a href="" class="float-end btn btn-outline-secondary editBtnForPost">
                            <i class="fa-regular fa-file"></i>
                        </a>
                        <i class="fa-solid fa-heart fa-lg me-2 likebtn after-like" data-post-id="{{ $post->id }}"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

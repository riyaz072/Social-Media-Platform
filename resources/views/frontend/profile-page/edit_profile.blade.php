@extends('frontend.layouts.app')
@section('title', 'Edit Profile')

@section('contents')
    <div class="container mt-5">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $user->first_name }}">
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $user->last_name }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="privacy" class="form-label">Account Type</label>
                    <select class="form-control" id="privacy" name="privacy">
                        <option value="1" {{ $user->privacy == '1' ? 'selected' : '' }}>Public</option>
                        <option value="2" {{ $user->privacy == '2' ? 'selected' : '' }}>Private</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="profile_picture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">

                    <div class="d-flex align-items-center mt-2">
                        <img src="{{ $user->image_url }}" class="img-thumbnail rounded-circle" id="user_dp"
                            alt="Profile Picture" width="100" height="100">

                            @if ($user->profile_picture = null)
                            <div class="form-check ms-3 ml-2">
                                <input type="hidden" name="remove_dp" id="assign-value">
                                <button type="button" class="btn btn-outline-danger" value="" id="remove_dp"><i
                                        class="fa-solid fa-trash"></i></button>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Save Changes</button>
            <a href="{{ route('profile.index') }}" class="btn btn-secondary mb-3">Back</a>
        </form>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#remove_dp').click(function(e) {
                e.preventDefault();
                $('#assign-value').val('1');
                $('#user_dp').attr('src', '{{ asset('storage/image/instagram_default.png') }}');
                $(this).hide();
                console.log('Profile picture removed.');
            });
        });
    </script>
@endpush

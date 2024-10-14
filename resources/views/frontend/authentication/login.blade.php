<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form Design | CodeLab</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('dist/css/authpage.css') }}">
</head>

<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div class="wrapper">
        <div class="title">
            Login Form
        </div>
        <form action="{{ route('loginsave') }}" method="POST">
            @csrf
            <div class="field">
                <input type="text" name="email" required>
                <label>Email Address</label>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="content">
                <div class="pass-link">
                    <a href="{{route('forgot-password')}}">Forgot password?</a>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <a href="{{ '/register' }}">Register now</a>
            </div>
        </form>
    </div>
</body>

</html>

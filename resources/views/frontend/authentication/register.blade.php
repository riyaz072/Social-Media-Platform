<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="{{asset('admin_assets/css/authpage.css')}}">
</head>
<body>
  <div class="container">
    <!-- Title section -->
    <div class="title">Registration</div>
    <div class="content">
      <!-- Registration form -->
      <form action="{{route('registersave')}}" method="POST">
        @csrf
        <div class="user-details">
          <!-- Input for First Name -->
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="first_name" placeholder="Enter your first name">
            @error('first_name')
              <span class="error">{{$message}}</span>
            @enderror
          </div>
          <!-- Input for Last Name -->
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="last_name" placeholder="Enter your last name">
            @error('last_name')
              <span class="error">{{$message}}</span>
            @enderror
          </div>
          <!-- Input for Username -->
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username">
            @error('username')
              <span class="error">{{$message}}</span>
            @enderror
          </div>
          <!-- Input for Email -->
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email">
            @error('email')
              <span class="error">{{$message}}</span>
            @enderror
          </div>
          <!-- Input for Password -->
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password">
            @error('password')
              <span class="error">{{$message}}</span>
            @enderror
          </div>
          <!-- Input for Phone Number -->
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone_no" placeholder="Enter your number">
            @error('phone_no')
              <span class="error">{{$message}}</span>
            @enderror
          </div>
          <!-- Radio buttons for gender selection -->
          <input type="radio" name="gender" value="1" id="dot-1">
          <input type="radio" name="gender" value="2" id="dot-2">
          <input type="radio" name="gender" value="3" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <!-- Label for Male -->
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <!-- Label for Female -->
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <!-- Label for Prefer not to say -->
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Other</span>
              @error('gender')
              <span class="error">{{$message}}</span>
            @enderror
            </label>
          </div>
        </div>
        <!-- Submit button -->
        <div class="button">
          <input type="submit" value="Register">
        </div>
        
        <!-- Login page link -->
        <div class="signup-link">
            Already have an account? <a href="{{('/login')}}">Login now</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
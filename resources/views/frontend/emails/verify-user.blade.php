<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h2>Welcome to the site, {{$user->first_name}}</h2>
    <br/>
    Your registered email ID is {{$user->email}}. Please click on the link below to verify your email account:
    <br/>
    <a href="{{ url('user/verify', $user->verifyUser->token) }}">Verify Email</a>
</body>
</html>
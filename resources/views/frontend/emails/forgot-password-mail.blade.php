<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password Email</title>
  </head>
  <body>
    <h2>Hello {{$user['first_name']}}</h2>
    <br/>
    Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('change-password/'. $user->verifyUser->token)}}">Verify Email</a>
  </body>
</html>
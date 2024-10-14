<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forgot Password</title>
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center">Forgot Password</h3>
                <form action="{{ route('verify-email')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter your email address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>  
                    <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Banking App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center bg-custom-primary text-white">
            <h1 class="display-4">Welcome to Our Banking App</h1>
            <p class="lead">Manage your accounts and transactions seamlessly.</p>
            <hr class="my-4">
            <p>Get started by creating an account or logging in.</p>
            <div class="d-flex justify-content-center">
                <a href="{{ route('register') }}" class="btn btn-lg btn-custom-secondary me-3">Sign Up</a>
                <a href="{{ route('login') }}" class="btn btn-lg btn-custom-primary">Login</a>
            </div>
        </div>
    </div>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/registeration.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
</head>
<body>
    <div class="container">
        <header>
            <h1>
                <a href="#">
                    <img src="http://tfgms.com/sandbox/dailyui/logo-1.png" alt="Authentic Collection">
                </a>
            </h1>
        </header>
        <h1 class="text-center">Register</h1>
        <form class="registration-form" action="{{route('taske.signup')}}" method="POST">
            @csrf
            <label class="col-one-half">
                <span class="label-text">First Name</span>
                <input type="text" name="firstName">
                @error('firstName')
                    {{ $message }}
                @enderror
            </label>
            <label class="col-one-half">
                <span class="label-text">Last Name</span>
                <input type="text" name="lastName">
            </label>
            <label>
                <span class="label-text">Email</span>
                <input type="text" name="email">
            </label>
            <label class="password">
                <span class="label-text">Password</span>
                <button class="toggle-visibility" title="toggle password visibility" tabindex="-1">
                    <span class="glyphicon glyphicon-eye-close"></span>
                </button>
                <input type="password" name="password">
            </label>
            <label class="checkbox">
                <input type="checkbox" name="newsletter">
                <span>Sign me up for the weekly newsletter.</span>
                <a href="back/login">Go to Login</a>
            </label>
            <div class="text-center">
                <button class="submit" name="register">Sign Me Up</button>
            </div>
        </form>
    </div>
</body>
</html>

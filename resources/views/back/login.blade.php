<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/master.css')}}">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <!-- Login -->
            <form class="login-form" action="{{route('taske.check')}}" method="post">
                @csrf
                <input type="email" name="email" value="{{old('email')}}" placeholder="email"/>
                @error('email') {{ $messages }} @enderror
                <input type="password" name="password" placeholder="password"/>
                <button>login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>

    {{-- <script src="{{asset('assets/js/master.js')}}"></script> --}}
</body>
</html>

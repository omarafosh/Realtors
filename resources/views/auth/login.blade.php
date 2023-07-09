<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.partials._css')
    <title>Document</title>
</head>




<body class="bg-black">

    <div class="form-box" id="login-box">
        <div class="header">Sign In</div>
        <form action={{ route('login') }} method="post">
            @csrf
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="User ID" />
                </div>
                @error('email')
                    <span class="invalid-feedback alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                </div>
                @error('password')
                    <span class="invalid-feedback alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <input type="checkbox" name="remember_me" /> Remember me
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                <a class="btn btn-primary btn-block" href="{{ route('register') }}">Sign Up</a>
                <p><a href="{{ route('password.request') }}">I forgot my password</a></p>
            </div>
        </form>

        <div class="margin text-center">
            <span>Sign in using social networks</span>
            <br />
            <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
            <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
            <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

        </div>
    </div>

    @include('layouts.partials._js')


</body>

</html>

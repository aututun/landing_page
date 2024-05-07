<!DOCTYPE html>
<html>
<head>
    <title>Login / Signup</title>
    <link href="{{asset('main/login.scss')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('main/css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class="login">
        <form action="{{asset('/loginPost')}}" method="post">
            {{ csrf_field() }}
            @csrf
            <label for="chk" aria-hidden="true">Login</label>
            <input type="hidden" name="action" value="signup">
            <input type="text" name="username" placeholder="User name" required="">
            <input type="password" name="password" placeholder="Password" required="">
            <button>Login</button>
            <div class="flex-c-m">
            </div>
            <br>
            <div style="text-align: center">Or Login Using</div>
            <div class="flex-c-m">
                <button class="google-sign-in"><i class="fa fa-google"></i> Google</button>
                <button class="zalo-sign-in"><i class="fa fa-zalo"></i> Zalo</button>
                <button class="facebook-sign-in"><i class="fa fa-facebook"></i> Facebook</button>
            </div>
        </form>
    </div>
    <div class="signup">
        <form action="{{asset('/signUpPost')}}" method="post">
            {{ csrf_field() }}
            @csrf
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="User name" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Password" required="">
            <button>Sign up</button>
            <br>
            <div style="text-align: center">Or Sign Up Using</div>
        </form>
        <button class="google-sign-in"><i class="fa fa-google"></i> Google</button>
        <button class="zalo-sign-in"><i class="fa fa-zalo"></i> Zalo</button>
        <button class="facebook-sign-in"><i class="fa fa-facebook"></i> Facebook</button>

    </div>
</div>
</body>
</html>

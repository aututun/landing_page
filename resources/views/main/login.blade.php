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
    <div class="signup">
        <form>
            <label for="chk" aria-hidden="true">Sign up</label>
            <input type="text" name="txt" placeholder="User name" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Password" required="">
            <button>Sign up</button>
            <br>
            <div style="text-align: center">Or Sign Up Using</div>
        </form>
        <button class="google-sign-in"><i class="fa fa-google"></i> Google</button>
        <button class="zalo-sign-in"><i class="fa fa-zalo"></i> Zalo</button>
        <button class="facebook-sign-in"><i class="fa fa-facebook"></i> Facebook</button>

    </div>

    <div class="login">
        <form>
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Password" required="">
            <button>Login</button>
            <div class="flex-c-m">
            </div>
            <br>
            <div style="text-align: center">Or Login Using</div>
            <div class="flex-c-m">
                <a href="#" class="login100-social-item bg1">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="login100-social-item bg2">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="login100-social-item bg3">
                    <i class="fa fa-google"></i>
                </a>
            </div>
        </form>
    </div>
</div>
</body>
<script src="https://accounts.google.com/gsi/client" async></script>
</html>

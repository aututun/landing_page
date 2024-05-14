<!DOCTYPE html>
<html>
<head>
    <title>Login / Signup</title>
    <link href="{{asset('main/login.css')}}" rel="stylesheet" type="text/css" media="all">
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
            @if(session()->has('wrong_credentials'))
                <label aria-hidden="true">Sai thông tin xác thực</label>
                {{ session()->forget('wrong_credentials') }}
            @endif
            @if(session()->has('exist'))
                <label aria-hidden="true">Tai khoản này đã tồn tại</label>
                {{ session()->forget('exist') }}
            @endif
            @if(isset($signup_success))
                <label aria-hidden="true">Đăng ký thành công</label>
            @endif
            <input type="hidden" name="action" value="login">
            <input type="text" name="LoginName" placeholder="User name" required="">
            <input type="password" name="Password" placeholder="Password" required="">
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
            <input type="hidden" name="action" value="signup">
            <input type="text" name="LoginName" placeholder="User name" required="">
            <input type="email" name="Email" placeholder="Email" required="">
            <input type="password" name="Password" placeholder="Password" required="">
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

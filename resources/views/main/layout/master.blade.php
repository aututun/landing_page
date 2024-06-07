@include('main.layout.header')
@include('main.layout.rightBanner')
@include('main.layout.navbar')
@include('main.layout.navbarModile')
<div class="nk-main">
    <div class="nk-gap-2"></div>
    <div class="container">
        @yield('index')
        @yield('news')
    </div>
    <div class="nk-gap-4"></div>
</div>
<img class="nk-page-background-top" src="{{asset('main/images/b1.jpg')}}" alt="">
<img class="nk-page-background-bottom" src="{{asset('main/images/bg-bottom.png')}}" alt="{{env('SITE_NAME','Kiếm Võ')}}">
@include('main.layout.search')
@include('main.login')
@include('main.layout.footer')

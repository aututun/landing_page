@include('main.layout.header')
<body>
@include('main.layout.rightBanner')
{{--@include('main.layout.navbar')--}}
@include('main.layout.navbar')
@include('main.layout.image')
<div id="content" style="width: 100%">
    @yield('heroes')
    @yield('gallery')
    @yield('heroDetails')
</div>
</body>
@include('main.layout.footer')

@include('main.layout.header')
<body>
<header class="nk-header nk-header-opaque">
    @include('main.layout.rightBanner')
    @include('main.layout.navbar')
    @include('main.layout.navbarModile')
</header>
    @yield('heroes')
    @yield('gallery')
    @yield('news')
    @yield('heroDetails')
</body>
@include('main.layout.footer')

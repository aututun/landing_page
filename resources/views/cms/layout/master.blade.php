@include('cms.layout.header')
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('cms.layout.menu')
        <div class="layout-page">
            @php($user =App\Models\User::getCurrentUser())
            @include('cms.layout.navbar',['user' => $user])
            @yield('dashboard')
            @yield('listUser')
            @yield('account')
            @yield('connections')
            @php($kvcoin = App\Http\Controllers\Money::getKTcoin())
            @include('cms.modalKvcoin',['kvcoin' => $kvcoin])
            @include('cms.modalDong',['kvcoin' => $kvcoin])
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <div class="buy-now">
        <a href="#" target="_blank" class="btn btn-danger btn-buy-now">Nạp tiền</a>
    </div>
</div>
</body>
@include('cms.layout.footer')

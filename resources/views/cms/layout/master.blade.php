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
            @yield('changePassword')
            @yield('connections')
            @yield('giftcode')
            @php($kvcoin = App\Http\Controllers\Money::getKTcoin())
            @include('cms.modalKvcoin',['kvcoin' => $kvcoin])
            @include('cms.modalDong',['kvcoin' => $kvcoin])
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <div class="buy-now">
        <a class="btn btn-danger btn-buy-now" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalKvcoin">Nạp tiền</a>
    </div>
</div>
</body>
@include('cms.layout.footer')

<script>
    (function () {
        if (typeof _bsa !== 'undefined' && _bsa) {
            // format, zoneKey, segment:value, options
            _bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
        }
    })();
</script>

<script>
    (function () {
        if (typeof _bsa !== 'undefined' && _bsa) {
            // format, zoneKey, segment:value, options
            _bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
        }
    })();
</script>

<script>
    (function () {
        if (typeof _bsa !== 'undefined' && _bsa) {
            // format, zoneKey, segment:value, options
            _bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
        }
    })();
</script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-98H8KRKT85');
</script>
<meta name="robots" content="noindex">
<!-- New toolbar-->
<div class="pull-right toggle-right-sidebar">
    <span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span>
</div>

<div id="right-sidebar" class="right-sidebar-notifcations nav-collapse">
    <div class="bs-example bs-example-tabs right-sidebar-tab-notification" data-example-id="togglable-tabs">

        <div id="w3lDemoBar" class="w3l-demo-bar">
            <div class="demo-btns">
                @if(session()->has('user_id'))
                    <a href="{{asset('/dashboard')}}">
                    <span class="w3l-icon -back">
                        <span class="fa fa-user"></span>
                    </span>
                        <span class="w3l-text">Quản lý tài khoản</span>
                    </a>
                @else
                    <a href="{{asset('/login')}}">
                    <span class="w3l-icon -back">
                        <span class="fa fa-address-card"></span>
                    </span>
                        <span class="w3l-text">Đăng nhập</span>
                    </a>
                @endif
                <a href="{{asset('/KiemVo1.apk')}}">
                  <span class="w3l-icon -download">
                      <span class="fa fa-download"></span>
                  </span>
                    <span class="w3l-text">Download Apk</span>
                </a>
               <a href="https://testflight.apple.com/join/Psw5dPTE" class="no-margin-bottom-mobile">
                    <span class="w3l-icon -download">
                        <svg fill="#e6ebff" xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 384 512"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>
                    </span>
                    <span class="w3l-text">Download iOS</span>
               </a>
            </div>
            <!---<div class="responsive-icons">
                <a href="#url" class="desktop-mode">
                    <span class="w3l-icon -desktop">
                        <span class="fa fa-desktop"></span>
                    </span>
                </a>
                <a href="#url" class="tablet-mode">
                    <span class="w3l-icon -tablet">
                        <span class="fa fa-tablet"></span>
                    </span>
                </a>
                <a href="#url" class="mobile-mode no-margin-bottom">
                    <span class="w3l-icon -mobile">
                        <span class="fa fa-mobile"></span>
                    </span>
                </a>
            </div>-->
        </div>
        <div class="right-sidebar-panel-content animated fadeInRight" tabindex="5003"
             style="overflow: hidden; outline: none;">
        </div>
    </div>
</div>

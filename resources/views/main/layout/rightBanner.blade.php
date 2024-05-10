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
                        <span class="fa fa-check"></span>
                    </span>
                        <span class="w3l-text">Tài khoản</span>
                    </a>
                @else
                    <a href="{{asset('/login')}}">
                    <span class="w3l-icon -back">
                        <span class="fa fa-check"></span>
                    </span>
                        <span class="w3l-text">Login</span>
                    </a>
                @endif
                <a href="{{asset('/KiemVo.apk')}}">
                  <span class="w3l-icon -download">
                      <span class="fa fa-download"></span>
                  </span>
                    <span class="w3l-text">Download Apk</span>
                </a>
                <!--               <a href="https://w3layouts.com/checkout/?add-to-cart=" class="no-margin-bottom-mobile">-->
                <!--            <span class="w3l-icon -buy">-->
                <!--                <span class="fa fa-shopping-cart"></span>-->
                <!--            </span>-->
                <!--                  <span class="w3l-text">Buy</span>-->
                <!--               </a>-->
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

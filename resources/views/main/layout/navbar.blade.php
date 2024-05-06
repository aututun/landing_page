<div class="header-w3layouts">
    <div class="container">
        <div class="right-side">
            <p>
                <button id="trigger-overlay" type="button">
                    <span class="fa fa-bars" aria-hidden="true"></span>
                </button>
            </p>
        </div>
        <!-- open/close -->
        <div class="overlay overlay-hugeinc">
            <button type="button" class="overlay-close">Close</button>
            <nav>
                <ul>
                    <li><a href="{{asset('/')}}">Trang Chủ</a></li>
                    <!--                        <li><a href="about.html" >Về chúng tôi</a></li>-->
                    <!--                        <li><a href="history.html" >Lịch sử</a></li>-->
                    <li><a href="{{asset('heroes')}}">Môn phái</a></li>
                    <li><a href="{{asset('gallery')}}">Thư viện ảnh</a></li>
                    <!--                        <li><a href="contact.html"  >Liên hệ</a></li>-->
                </ul>
            </nav>
        </div>
        <div class="hedder-logo">
            <h1><a href="{{asset('/')}}">
                    <img src="{{asset('main/images/logo.png')}}" class="img-fluid" alt="Responsive image"></a>
            </h1>
        </div>
        <!-- /open/close -->
        <!-- /navigation section -->
    </div>
    <div class="clearfix"> </div>
</div>

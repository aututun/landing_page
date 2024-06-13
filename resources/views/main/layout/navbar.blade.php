<nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
    <div class="container">
        <div class="nk-nav-table">

            <a href="{{asset('/')}}" class="nk-nav-logo">
                <img src="{{asset('main/images/logo-ngang.png')}}" alt="{{env('SITE_NAME','Kiếm Võ')}}" width="100">
            </a>

            <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
                <li>
                    <a href="#" data-toggle="modal" data-target="#modalLogin">Đăng nhập</a>
                </li>
                @php($listCategory = App\Http\Controllers\Dashboard::getListCategoriesMenu())
                    @foreach($listCategory as $category)
                        <li>
                            <a href="{{asset('category')}}/{{$category->ID}}">{{$category->CategoryName}}</a>
                        </li>
                    @endforeach
                <li class="nk-drop-item">
                    <a href="#">
                        Cộng đồng
                    </a>
                    <ul class="dropdown">
                        <li>
                            <a href="https://www.facebook.com/KiemVo.KiemTheMobile">Fanpage</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/groups/1129603218325456">Group</a>
                        </li>
                        <li>
                            <a href="https://zalo.me/g/qdfoeh733">Zalo</a>
                        </li>
{{--                        <li>--}}
{{--                            <a href="404.html">Youtube</a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
            </ul>
            <ul class="nk-nav nk-nav-right nk-nav-icons">

                <li class="single-icon d-lg-none">
                    <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

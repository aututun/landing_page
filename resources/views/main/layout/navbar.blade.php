<nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
    <div class="container">
        <div class="nk-nav-table">

            <a href="{{asset('/')}}" class="nk-nav-logo">
                <img src="{{asset('main/images/logo-ngang.png')}}" alt="{{env('SITE_NAME','Kiếm Võ')}}" width="100">
            </a>

            <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">

                <li class=" nk-drop-item">
                    <a href="elements.html">Features</a>
                    <ul class="dropdown">
                        <li>
                            <a href="elements.html">Elements (Shortcodes)</a>
                        </li>
                        <li class=" nk-drop-item">
                            <a href="forum.html">Forum</a>
                            <ul class="dropdown">
                                <li>
                                    <a href="forum.html">Forum</a>
                                </li>
                                <li>
                                    <a href="forum-topics.html">Topics</a>
                                </li>
                                <li>
                                    <a href="forum-single-topic.html">Single Topic</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="widgets.html">Widgets</a>
                        </li>
                        <li>
                            <a href="coming-soon.html">Coming Soon</a>
                        </li>
                        <li>
                            <a href="offline.html">Offline</a>
                        </li>
                        <li>
                            <a href="404.html">404</a>
                        </li>
                    </ul>
                </li>
                @php($listCategory = App\Http\Controllers\Dashboard::getListCategoriesMenu())
                    @foreach($listCategory as $category)
                        <li>
                            <a href="test/{{$category->ID}}">{{$category->CategoryName}}</a>
                        </li>
                    @endforeach
                <li class="nk-drop-item">
                    <a href="gallery.html">
                        Cộng đồng
                    </a>
                    <ul class="dropdown">
                        <li>
                            <a href="widgets.html">Fanpage</a>
                        </li>
                        <li>
                            <a href="coming-soon.html">Group</a>
                        </li>
                        <li>
                            <a href="offline.html">Zalo</a>
                        </li>
                        <li>
                            <a href="404.html">Youtube</a>
                        </li>
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

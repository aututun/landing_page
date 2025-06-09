@extends('main.layout.master')
@section('index')
    <!-- START: Image Slider -->
    <div class="nk-image-slider" data-autoplay="5000">
        @php($listNewsSlide = App\Http\Controllers\Dashboard::getListSlide())
        @if(!empty($listNewsSlide))
            @foreach($listNewsSlide as $news)
                @php($i = 3)
                <div class="nk-image-slider-item">
                    <img src="{{asset('main/images/b1.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('main/images/slide-1-thumb.jpg')}}">
                    <div class="nk-image-slider-content">
                        <h3 class="h4">{{$news->Title}}</h3>
                        <p class="text-white">{!! $news->Context !!}</p>
                        <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Đọc thêm</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="nk-image-slider-item">
                <img src="{{asset('main/images/b1.jpg')}}" alt="" class="nk-image-slider-img" data-thumb="{{asset('main/images/b1.jpg')}}">
                <div class="nk-image-slider-content">
                    <h3 class="h4">Kiếm Võ - Kiếm Thế Mobile </h3>
                    <p class="text-white">Kiếm Thế mobile phiên bản giám định trang bị độc lạ.</p>
                    <p class="text-white">Code vip tân thủ (nhận ở lễ quan):.</p>
                    🎁KIEMVOTANTHU <br>
                    🎁KIEMVOTANTHU2 <br>
                    🎁KIEMVOTANTHU3 <br>
                    🎁KIEMVOBICANH <br>
                    🎁KIEMVOTUAN1 <br>
                    🎁KIEMVOTUAN2 <br>
                    🎁KIEMVOTUAN3</p>
                    <a href="{{ config('app.link_fb_page') }}" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Đọc thêm</a>
                </div>
            </div>
        @endif
    </div>
    <!-- END: Image Slider -->

    <!-- START: Categories -->
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-3">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <a target="_blank" href="{{ config('app.link_apk') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="75" viewBox="0 0 48 48">
                            <path fill="#7cb342" d="M12 29c0 1.1-.9 2-2 2s-2-.9-2-2v-9c0-1.1.9-2 2-2s2 .9 2 2V29zM40 29c0 1.1-.9 2-2 2s-2-.9-2-2v-9c0-1.1.9-2 2-2s2 .9 2 2V29zM22 40c0 1.1-.9 2-2 2s-2-.9-2-2v-9c0-1.1.9-2 2-2s2 .9 2 2V40zM30 40c0 1.1-.9 2-2 2s-2-.9-2-2v-9c0-1.1.9-2 2-2s2 .9 2 2V40z"></path><path fill="#7cb342" d="M14 18v15c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V18H14zM24 8c-6 0-9.7 3.6-10 8h20C33.7 11.6 30 8 24 8zM20 13.6c-.6 0-1-.4-1-1 0-.6.4-1 1-1s1 .4 1 1C21 13.1 20.6 13.6 20 13.6zM28 13.6c-.6 0-1-.4-1-1 0-.6.4-1 1-1s1 .4 1 1C29 13.1 28.6 13.6 28 13.6z"></path><path fill="#7cb342" d="M28.3 10.5c-.2 0-.4-.1-.6-.2-.5-.3-.6-.9-.3-1.4l1.7-2.5c.3-.5.9-.6 1.4-.3.5.3.6.9.3 1.4l-1.7 2.5C29 10.3 28.7 10.5 28.3 10.5zM19.3 10.1c-.3 0-.7-.2-.8-.5l-1.3-2.1c-.3-.5-.2-1.1.3-1.4.5-.3 1.1-.2 1.4.3l1.3 2.1c.3.5.2 1.1-.3 1.4C19.7 10 19.5 10.1 19.3 10.1z"></path>
                        </svg>
                    </a>
                </div>
                <div class="nk-feature-cont">
                    <h4 class="nk-feature-title text-main-1"><a target="_blank" href="{{ config('app.link_apk') }}">Tải</a></h4>
                    <h3 class="nk-feature-title"><a target="_blank" href="{{ config('app.link_apk') }}">Apk</a></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <a target="_blank" href="{{ config('app.link_ios') }}">
                        <svg fill="#e6ebff" xmlns="http://www.w3.org/2000/svg" width="100" height="75" viewBox="0 0 384 512">
                            <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
                        </svg>
                    </a>
                </div>
                <div class="nk-feature-cont">
                    <h4 class="nk-feature-title text-main-1"><a target="_blank" href="{{ config('app.link_ios') }}">Tải</a></h4>
                    <h3 class="nk-feature-title"><a target="_blank" href="{{ config('app.link_ios') }}">iOS</a></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <a target="_blank" href="{{ config('app.link_fb_page') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="75" viewBox="0 0 48 48">
                            <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"></stop><stop offset="1" stop-color="#007ad9"></stop></linearGradient><path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path><path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"></path>
                        </svg>
                    </a>
                </div>
                <div class="nk-feature-cont">
                    <h4 class="nk-feature-title text-main-1"><a target="_blank" href="{{ config('app.link_fb_page') }}">Trang</a></h4>
                    <h3 class="nk-feature-title"><a target="_blank" href="{{ config('app.link_fb_page') }}">Facebook</a></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <a target="_blank" href="{{ config('app.link_zalo') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="75" viewBox="0 0 48 48">
                            <path fill="#2962ff" d="M15,36V6.827l-1.211-0.811C8.64,8.083,5,13.112,5,19v10c0,7.732,6.268,14,14,14h10	c4.722,0,8.883-2.348,11.417-5.931V36H15z"></path>
                            <path fill="#eee" d="M29,5H19c-1.845,0-3.601,0.366-5.214,1.014C10.453,9.25,8,14.528,8,19	c0,6.771,0.936,10.735,3.712,14.607c0.216,0.301,0.357,0.653,0.376,1.022c0.043,0.835-0.129,2.365-1.634,3.742	c-0.162,0.148-0.059,0.419,0.16,0.428c0.942,0.041,2.843-0.014,4.797-0.877c0.557-0.246,1.191-0.203,1.729,0.083	C20.453,39.764,24.333,40,28,40c4.676,0,9.339-1.04,12.417-2.916C42.038,34.799,43,32.014,43,29V19C43,11.268,36.732,5,29,5z"></path>
                            <path fill="#2962ff" d="M36.75,27C34.683,27,33,25.317,33,23.25s1.683-3.75,3.75-3.75s3.75,1.683,3.75,3.75	S38.817,27,36.75,27z M36.75,21c-1.24,0-2.25,1.01-2.25,2.25s1.01,2.25,2.25,2.25S39,24.49,39,23.25S37.99,21,36.75,21z"></path>
                            <path fill="#2962ff" d="M31.5,27h-1c-0.276,0-0.5-0.224-0.5-0.5V18h1.5V27z"></path>
                            <path fill="#2962ff" d="M27,19.75v0.519c-0.629-0.476-1.403-0.769-2.25-0.769c-2.067,0-3.75,1.683-3.75,3.75	S22.683,27,24.75,27c0.847,0,1.621-0.293,2.25-0.769V26.5c0,0.276,0.224,0.5,0.5,0.5h1v-7.25H27z M24.75,25.5	c-1.24,0-2.25-1.01-2.25-2.25S23.51,21,24.75,21S27,22.01,27,23.25S25.99,25.5,24.75,25.5z"></path>
                            <path fill="#2962ff" d="M21.25,18h-8v1.5h5.321L13,26h0.026c-0.163,0.211-0.276,0.463-0.276,0.75V27h7.5	c0.276,0,0.5-0.224,0.5-0.5v-1h-5.321L21,19h-0.026c0.163-0.211,0.276-0.463,0.276-0.75V18z"></path>
                        </svg>
                    </a>
                </div>
                <div class="nk-feature-cont">
                    <h4 class="nk-feature-title text-main-1"><a target="_blank" href="{{ config('app.link_zalo') }}">Nhóm</a></h4>
                    <h3 class="nk-feature-title"><a target="_blank" href="{{ config('app.link_zalo') }}">Zalo</a></h3>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Categories -->

    <!-- START: Latest News -->
    <div class="nk-gap-2"></div>
    <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Tin</span> Mới</span></h3>
    <div class="nk-gap"></div>

    <div class="nk-news-box">
        <div class="nk-news-box-list">
            <div class="nano">
                <div class="nano-content">
                    @php($listNews = App\Http\Controllers\Dashboard::getListNewsMenu(5))
                    @foreach($listNews as $news)
                    <div class="nk-news-box-item @if ($loop->first) nk-news-box-item-active @endif ">
                        <div class="nk-news-box-item-img">
                            <img src="@if($news->LinkPicture) {{asset($news->LinkPicture)}} @else {{asset('main/images/post-1-sm.jpg')}} @endif" alt="{{$news->Title}}">
                        </div>
                        <img src="@if($news->LinkPicture) {{asset($news->LinkPicture)}} @else {{asset('main/images/post-1.jpg')}} @endif" alt="{{$news->Title}}" class="nk-news-box-item-full-img">
                        <h3 class="nk-news-box-item-title">{{$news->Title}}</h3>

                        <span class="nk-news-box-item-categories">
                            @php($categoryObj = App\Http\Controllers\Dashboard::getCategoryById($news->Catagory))
                            @php($categoryColor = App\Http\Controllers\Dashboard::getCategoryColorClass($news->Catagory))
                            <span class="{{$categoryColor}}">{{$categoryObj->CategoryName}}</span>
                        </span>

                        <div class="nk-news-box-item-text">
                            @php($context = App\Http\Controllers\Dashboard::getShortenedContext($news->Context))
                            <p>{{$context}}</p>
                        </div>
                        <a href="{{asset('/newsDetails')}}/{{$news->ID}}" class="nk-news-box-item-url">Đọc thêm</a>
                        <div class="nk-news-box-item-date"><span class="fa fa-calendar"></span> {{$news->DateTime}}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="nk-news-box-each-info">
            <div class="nano">
                <div class="nano-content">
                    <!-- There will be inserted info about selected news-->
                    <div class="nk-news-box-item-image">
                        <span class="nk-news-box-item-categories">
                            <span class="bg-main-4"></span>
                        </span>
                    </div>
                    <h3 class="nk-news-box-item-title"></h3>
                    <div class="nk-news-box-item-text">
                        <p></p>
                    </div>
                    <a href="#" class="nk-news-box-item-more">Đọc thêm</a>
                    <div class="nk-news-box-item-date">
                        <span class="fa fa-calendar"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="nk-gap-2"></div>--}}
{{--    <div class="nk-blog-grid">--}}
{{--        <div class="row">--}}


{{--            <div class="col-md-6 col-lg-3">--}}
{{--                <!-- START: Post -->--}}
{{--                <div class="nk-blog-post">--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-img">--}}
{{--                        <img src="{{asset('main/images/post-5-mid.jpg')}}" alt="He made his passenger captain of one">--}}
{{--                        <span class="nk-post-comments-count">13</span>--}}

{{--                        <span class="nk-post-categories">--}}
{{--                                    <span class="bg-main-5">Indie</span>--}}
{{--                                </span>--}}

{{--                    </a>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">He made his passenger captain of one</a></h2>--}}
{{--                    <div class="nk-post-text">--}}
{{--                        <p>Just then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door...</p>--}}
{{--                    </div>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Đọc thêm</a>--}}
{{--                    <div class="nk-post-date float-right"><span class="fa fa-calendar"></span> Jul 23, 2018</div>--}}
{{--                </div>--}}
{{--                <!-- END: Post -->--}}
{{--            </div>--}}


{{--            <div class="col-md-6 col-lg-3">--}}
{{--                <!-- START: Post -->--}}
{{--                <div class="nk-blog-post">--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-img">--}}
{{--                        <img src="{{asset('main/images/post-6-mid.jpg')}}" alt="At first, for some time, I was not able to answer">--}}
{{--                        <span class="nk-post-comments-count">0</span>--}}

{{--                        <span class="nk-post-categories">--}}
{{--                                    <span class="bg-main-5">Racing</span>--}}
{{--                                </span>--}}

{{--                    </a>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">At first, for some time, I was not able to answer</a></h2>--}}
{{--                    <div class="nk-post-text">--}}
{{--                        <p>This little wandering journey, without settled place of abode, had been so unpleasant to me, that my own house, as I called it to myself, was a perfect settlement to me compared to that...</p>--}}
{{--                    </div>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Đọc thêm</a>--}}
{{--                    <div class="nk-post-date float-right"><span class="fa fa-calendar"></span> Jul 3, 2018</div>--}}
{{--                </div>--}}
{{--                <!-- END: Post -->--}}
{{--            </div>--}}


{{--            <div class="col-md-6 col-lg-3">--}}
{{--                <!-- START: Post -->--}}
{{--                <div class="nk-blog-post">--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-img">--}}
{{--                        <img src="{{asset('main/images/post-7-mid.jpg')}}" alt="At length one of them called out in a clear">--}}
{{--                        <span class="nk-post-comments-count">0</span>--}}

{{--                        <span class="nk-post-categories">--}}
{{--                                    <span class="bg-main-6">MOBA</span>--}}
{{--                                </span>--}}

{{--                    </a>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">At length one of them called out in a clear</a></h2>--}}
{{--                    <div class="nk-post-text">--}}
{{--                        <p>TJust then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door...</p>--}}
{{--                    </div>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Đọc thêm</a>--}}
{{--                    <div class="nk-post-date float-right"><span class="fa fa-calendar"></span> Jul 3, 2018</div>--}}
{{--                </div>--}}
{{--                <!-- END: Post -->--}}
{{--            </div>--}}


{{--            <div class="col-md-6 col-lg-3">--}}
{{--                <!-- START: Post -->--}}
{{--                <div class="nk-blog-post">--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-img">--}}
{{--                        <img src="{{asset('main/images/post-8-mid.jpg')}}" alt="For good, too though, in consequence">--}}
{{--                        <span class="nk-post-comments-count">0</span>--}}

{{--                        <span class="nk-post-categories">--}}
{{--                                    <span class="bg-main-2">Adventure</span>--}}
{{--                                </span>--}}

{{--                    </a>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">For good, too though, in consequence</a></h2>--}}
{{--                    <div class="nk-post-text">--}}
{{--                        <p>This little wandering journey, without settled place of abode, had been so unpleasant to me, that my own house, as I called it to myself, was a perfect settlement to me compared to that...</p>--}}
{{--                    </div>--}}
{{--                    <div class="nk-gap"></div>--}}
{{--                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Đọc thêm</a>--}}
{{--                    <div class="nk-post-date float-right"><span class="fa fa-calendar"></span> Jul 3, 2018</div>--}}
{{--                </div>--}}
{{--                <!-- END: Post -->--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
    <!-- END: Latest News -->

    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Tin</span> theo chủ đề</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-tabs">
                <ul class="nav nav-tabs nav-tabs-fill" role="tablist">
                    @php($listCategory = App\Http\Controllers\Dashboard::getListCategoriesAndPostMenu())
                    @foreach($listCategory as $categoryID => $category)
                        @if($categoryID == 1) @continue @endif
                        @php($categoryObj = App\Http\Controllers\Dashboard::getCategoryById($categoryID))
                        <li class="nav-item">
                            <a class="nav-link @if ($loop->first) active @endif" href="#tabs-{{$categoryID}}" role="tab" data-toggle="tab">{{$categoryObj->CategoryName}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($listCategory as $categoryID => $category)
                        @php($categoryObj = App\Http\Controllers\Dashboard::getCategoryById($categoryID))
                        <div role="tabpanel" class="tab-pane fade @if ($loop->first) show active @endif" id="tabs-{{$categoryID}}">
                            @if($category)
                                @foreach($category as $news)
                                    @php($categoryColor = App\Http\Controllers\Dashboard::getCategoryColorClass($news->Catagory))
                                    <div class="nk-gap"></div>
                                    @if ($loop->first)
                                        <div class="nk-blog-post nk-blog-post-border-bottom">
                                            <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-img">
                                                <img src="@if($news->LinkPicture) {{asset($news->LinkPicture)}} @else {{asset('main/images/post-2-fw.jpg')}} @endif" alt="{{$news->Title}}">
                                                <span class="nk-post-categories">
                                                    <span class="{{$categoryColor}}">{{$categoryObj->CategoryName}}</span>
                                                </span>
                                            </a>
                                            <div class="nk-gap-1"></div>
                                            <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">{{$news->Title}}</a></h2>
                                            <div class="nk-post-date mt-10 mb-10">
                                                <span class="fa fa-calendar"></span> {{$news->DateTime}}
                                            </div>
                                            <div class="nk-post-text">
                                                @php($context = App\Http\Controllers\Dashboard::getShortenedContext($news->Context))
                                                <p>{{$context}}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="nk-blog-post nk-blog-post-border-bottom">
                                            <div class="row vertical-gap">
                                                <div class="col-lg-3 col-md-5">
                                                    <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-img">
                                                        <img src="{{asset('main/images/post-7-mid-square.jpg')}}" alt="{{$news->Title}}">
                                                        <span class="nk-post-categories">
                                                            <span class="{{$categoryColor}}">{{$categoryObj->CategoryName}}</span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="col-lg-9 col-md-7">
                                                    <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">{{$news->Title}}</a></h2>
                                                    <div class="nk-post-date mt-10 mb-10">
                                                        <span class="fa fa-calendar"></span> {{$news->DateTime}}
                                                    </div>
                                                    <div class="nk-post-text">
                                                        @php($context = App\Http\Controllers\Dashboard::getShortenedContext($news->Context))
                                                        <p>{{$context}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="nk-gap"></div>
                                <div class="d-flex justify-content-center">
                                    <h3>Thể loại này chưa có bài viết nào</h3>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END: Tabbed News -->


            <!-- START: Latest Pictures -->
            <div class="nk-gap"></div>
            <h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1">Môn</span> Phái</span></h2>
            <div class="nk-gap"></div>
            <div class="nk-popup-gallery">
                <div class="row vertical-gap">
                    @php($listHeroes = App\Http\Controllers\Heroes::getListHeroes())
                    @foreach($listHeroes as $hero)
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="{{asset($hero['image'])}}" class="nk-gallery-item" data-size="1123x867">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="{{asset($hero['image'])}}" alt="{{$hero['title']}}">
                            </a>
                            <div class="nk-gallery-item-description">
                                <h4>{{$hero['title']}}</h4>
                                {{$hero['noi_cong']}}
                                <hr>
                                {{$hero['ngoai_cong']}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- END: Latest Pictures -->

        </div>
        <div class="col-lg-4">
            <!--
                START: Sidebar

                Additional Classes:
                    .nk-sidebar-left
                    .nk-sidebar-right
                    .nk-sidebar-sticky
            -->
            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
                <div class="nk-widget nk-widget-highlighted">
{{--                    <h4 class="nk-widget-title"><span><span class="text-main-1">Mạng</span> Xã hội</span></h4>--}}
{{--                    <div class="nk-widget-content">--}}
{{--                        <!----}}
{{--                            Social Links 3--}}

{{--                            Additional Classes:--}}
{{--                                .nk-social-links-cols-5--}}
{{--                                .nk-social-links-cols-4--}}
{{--                                .nk-social-links-cols-3--}}
{{--                                .nk-social-links-cols-2--}}
{{--                        -->--}}
{{--                        <ul class="nk-social-links-3 nk-social-links-cols-4">--}}
{{--                            <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>--}}
{{--                            <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>--}}
{{--                            <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a></li>--}}
{{--                            <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>--}}
{{--                            <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>--}}
{{--                            <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>--}}
{{--                            <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>--}}
{{--                            <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>--}}

{{--                            <!-- Additional Social Buttons--}}
{{--                                <li><a class="nk-social-behance" href="#"><span class="fab fa-behance"></span></a></li>--}}
{{--                                <li><a class="nk-social-bitbucket" href="#"><span class="fab fa-bitbucket"></span></a></li>--}}
{{--                                <li><a class="nk-social-dropbox" href="#"><span class="fab fa-dropbox"></span></a></li>--}}
{{--                                <li><a class="nk-social-dribbble" href="#"><span class="fab fa-dribbble"></span></a></li>--}}
{{--                                <li><a class="nk-social-deviantart" href="#"><span class="fab fa-deviantart"></span></a></li>--}}
{{--                                <li><a class="nk-social-flickr" href="#"><span class="fab fa-flickr"></span></a></li>--}}
{{--                                <li><a class="nk-social-foursquare" href="#"><span class="fab fa-foursquare"></span></a></li>--}}
{{--                                <li><a class="nk-social-github" href="#"><span class="fab fa-github"></span></a></li>--}}
{{--                                <li><a class="nk-social-linkedin" href="#"><span class="fab fa-linkedin"></span></a></li>--}}
{{--                                <li><a class="nk-social-medium" href="#"><span class="fab fa-medium"></span></a></li>--}}
{{--                                <li><a class="nk-social-odnoklassniki" href="#"><span class="fab fa-odnoklassniki"></span></a></li>--}}
{{--                                <li><a class="nk-social-paypal" href="#"><span class="fab fa-paypal"></span></a></li>--}}
{{--                                <li><a class="nk-social-reddit" href="#"><span class="fab fa-reddit"></span></a></li>--}}
{{--                                <li><a class="nk-social-skype" href="#"><span class="fab fa-skype"></span></a></li>--}}
{{--                                <li><a class="nk-social-soundcloud" href="#"><span class="fab fa-soundcloud"></span></a></li>--}}
{{--                                <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li>--}}
{{--                                <li><a class="nk-social-slack" href="#"><span class="fab fa-slack"></span></a></li>--}}
{{--                                <li><a class="nk-social-tumblr" href="#"><span class="fab fa-tumblr"></span></a></li>--}}
{{--                                <li><a class="nk-social-vimeo" href="#"><span class="fab fa-vimeo"></span></a></li>--}}
{{--                                <li><a class="nk-social-vk" href="#"><span class="fab fa-vk"></span></a></li>--}}
{{--                                <li><a class="nk-social-wordpress" href="#"><span class="fab fa-wordpress"></span></a></li>--}}
{{--                            -->--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    @php($i = 3)
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Top {{$i}}</span> Bài viết</span></h4>
                    <div class="nk-widget-content">
                        @php($listRandomNews = App\Http\Controllers\Dashboard::getRandomNews($i))
                        @foreach($listRandomNews as $news)
                        <div class="nk-widget-post">
                            <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-post-image">
                                <img src="@if($news->LinkPicture) {{asset($news->LinkPicture)}} @else {{asset('main/images/post-1-sm.jpg')}} @endif" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="{{asset('newsDetails')}}/{{$news->ID}}">{{$news->Title}}</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> {{$news->DateTime}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
@endsection

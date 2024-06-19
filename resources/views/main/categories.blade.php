@extends('main.layout.master')
@section('categories')
    <div class="nk-blog-fullwidth">
        @if(!empty($listNewsByCategories))
            @foreach($listNewsByCategories as $news)
            <!-- START: Post -->
                <div class="nk-blog-post">
        {{--            <a href="blog-article.html" class="nk-post-img">--}}
        {{--                <img src="{{asset('/main/images/post-1-fw.jpg')}}" alt="Smell magic in the air. Or maybe barbecue">--}}
        {{--                <span class="nk-post-comments-count">4</span>--}}
        {{--            </a>--}}
                    <div class="nk-gap-2"></div>
                    <div class="row vertical-gap">
                        <div class="col-md-8 col-lg-9">
                            <h2 class="nk-post-title h4"><a href="{{asset('newsDetails')}}/{{$news->ID}}">{{$news->Title}}</a></h2>
                            <div class="nk-gap"></div>
                            <div class="nk-post-text">
                                @php($context = App\Http\Controllers\Dashboard::getShortenedContext($news->Context))
                                <p>{{$context}}</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <div class="nk-post-by">
                                <br> {{$news->DateTime}}
                            </div>
                            <div class="nk-gap-3"></div>
                            <div class="text-right">
                                <a href="{{asset('newsDetails')}}/{{$news->ID}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Đọc thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END: Post -->
            @endforeach
        @else
            <div class="nk-gap"></div>
            <div class="d-flex justify-content-center">
                <h3>Thể loại này chưa có bài viết nào</h3>
            </div>
        @endif
        <!-- START: Pagination -->
{{--        <div class="nk-pagination nk-pagination-center">--}}
{{--            <a href="#" class="nk-pagination-prev">--}}
{{--                <span class="ion-ios-arrow-back"></span>--}}
{{--            </a>--}}
{{--            <nav>--}}
{{--                <a class="nk-pagination-current" href="#">1</a>--}}
{{--                <a href="#">2</a>--}}
{{--                <a href="#">3</a>--}}
{{--                <a href="#">4</a>--}}
{{--                <span>...</span>--}}
{{--                <a href="#">14</a>--}}
{{--            </nav>--}}
{{--            <a href="#" class="nk-pagination-next">--}}
{{--                <span class="ion-ios-arrow-forward"></span>--}}
{{--            </a>--}}
{{--        </div>--}}
        <!-- END: Pagination -->
    </div>
@endsection

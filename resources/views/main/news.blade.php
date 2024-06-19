@extends('main.layout.master')
@section('news')
    <div class="nk-gap-1"></div>
    <div class="container">
        <ul class="nk-breadcrumbs">
            <li><a href="{{asset('/')}}">Home</a></li>
            <li><span class="fa fa-angle-right"></span></li>
            <li><a href="#">Blog</a></li>
            <li></li>
        </ul>
    </div>
    <div class="nk-gap-1"></div>
    <div class="nk-blog-post nk-blog-post-single">
        <!-- START: Post Text -->
        <div class="nk-post-text mt-0" style="; padding: 5px">
{{--            <div class="nk-post-img">--}}
{{--                <img src="{{asset('main/images/post-2.jpg')}}" alt="Grab your sword and fight the Horde">--}}
{{--            </div>--}}
            <div class="nk-gap-1"></div>
            <center><h1 class="nk-post-title">{{$news->Title}}</h1></center>
            <div class="nk-post-by">
{{--                {{$news->DateTime}}--}}


                <div class="nk-post-categories">
                    @php($categoryColor = App\Http\Controllers\Dashboard::getCategoryColorClass($news->Catagory))
                    @php($categoryObj = App\Http\Controllers\Dashboard::getCategoryById($news->Catagory))
                    <span class="{{$categoryColor}}">{{$categoryObj->CategoryName}}</span>

                </div>

            </div>
            <div class="nk-gap"></div>
            <p>{!! $news->Context !!}</p>


            <div class="nk-gap"></div>
            <div class="nk-post-share">
                <span class="h5">Chia sẻ bài viết :</span>

                <ul class="nk-social-links-2">
                    <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
                    <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
                    <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
                    <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>

                    <!-- Additional Share Buttons
                        <li><span class="nk-social-linkedin" title="Share page on LinkedIn" data-share="linkedin"><span class="fab fa-linkedin"></span></span></li>
                        <li><span class="nk-social-vk" title="Share page on VK" data-share="vk"><span class="fab fa-vk"></span></span></li>
                    -->
                </ul>
            </div>
        </div>
        <!-- END: Post Text -->
    </div>
@endsection

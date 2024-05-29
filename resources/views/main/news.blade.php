@extends('main.layout.master')
@section('news')
    <section class="gallery-design py-lg-4 py-md-3 py-sm-3 py-3">
        <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
            <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Tin tức - sự kiện</h3>
            <div class="row">
                @if(!isset($news))
                    <style>
                        .carousel-container {
                            position: relative;
                            width: 100%;
                            overflow: hidden;
                        }

                        .carousel-slider {
                            display: flex;
                            transition: transform 0.5s ease-in-out;
                        }

                        .carousel-slide {
                            min-width: 100%;
                            box-sizing: border-box;
                        }
                    </style>
                    <div class="col-12 col-lg-7 order-3 order-md-2">
                        <div class="carousel-container">
                            <div class="carousel-slider" id="carousel-slider">
                                <div class="carousel-slide">
                                    <img style="width:100%; height:100%;" class="d-block w-100"
                                         src="https://scontent.fhan14-5.fna.fbcdn.net/v/t39.30808-6/441546637_122122628678273542_7548781967293658109_n.jpg?stp=dst-jpg_p526x296&_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG5c26HvJ76NbZvrQ_NVvqsFklcps4Y_0oWSVymzhj_SmfcHqUlVxE4ggukFbFCrsp1Xlo-e2Vw5-N0Ju5aRKQi&_nc_ohc=--w90bspVt4Q7kNvgGuDtC9&_nc_ht=scontent.fhan14-5.fna&oh=00_AYBc2Bgds7iRuAetPFMW67874V6yjebCG63BrGd7AeRRDA&oe=665D2952">
                                </div>
                                <div class="carousel-slide">
                                    <img style="width:100%; height:100%;" class="d-block w-100"
                                         src="https://scontent.fhan14-3.fna.fbcdn.net/v/t39.30808-6/441497216_122123436380273542_3406907740346324050_n.jpg?stp=dst-jpg_p526x296&_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFVrlMl0e5UKY-kgDpsYRKQ_V_vPyktUk39X-8_KS1STTVoxUrBqtU51ygvb6Nz1W-ihf1Eh8J2yjPOItQ34wm3&_nc_ohc=_nT1TKPQf9kQ7kNvgHdEXLX&_nc_ht=scontent.fhan14-3.fna&oh=00_AYDS2Jd9EamaiKRojNxfmMhytiS5z51GJrmta3TuwZ2-gQ&oe=665D27CE">
                                </div>
                                <div class="carousel-slide">
                                    <img style="width:100%; height:100%;" class="d-block w-100"
                                         src="https://scontent.fhan14-2.fna.fbcdn.net/v/t39.30808-6/442480982_122122089176273542_5357439815708214773_n.jpg?stp=dst-jpg_p526x296&_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFM3BLxJ9AKt0q0FlL9v2mmuItxXr2_7ou4i3Fevb_ui6lmtZbYfo6SSGhenxSr3k8fqMJC39OKwT76P--HqdIr&_nc_ohc=nO9axSB8_r0Q7kNvgFkYIzS&_nc_ht=scontent.fhan14-2.fna&oh=00_AYAmK-dtS8j7PvwxzaaEdGs3hli78sJMJ8CViSgYD7SN4w&oe=665D2EC1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 order-3 order-md-2">
                        @php($listCategory = App\Http\Controllers\Dashboard::getListCategory())
                        <ul class="header-ul">
                            @foreach($listCategory as $category)
                                <li class="float-left-li">
                                    <a href="{{asset('news')}}/{{$category->Catagory}}">{{$category->Catagory}}</a>
                                </li>
                            @endforeach
                        </ul>
                        @foreach ($listNews->chunk(2) as $news)
                            <div class="row grid gallery-info">
                                <ul style="width: 100%" class="list-group list-group-flush">
                                    @foreach($news as $newDetails)
                                        <div style="overflow: hidden"
                                             class="list-group-item d-flex justify-content-between">
                                            <div style="float: left" class="left-content"><h5><a
                                                        href="{{asset('/newsDetails')}}/{{$newDetails->ID}}">{{$newDetails->Title}}</a>
                                                </h5></div>
                                            <div style="float: right" class="right-content">
                                                <small>{{App\Http\Controllers\Dashboard::countDay($newDetails->DateTime)}}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const slider = document.getElementById('carousel-slider');
                    const slides = slider.children;
                    const totalSlides = slides.length;
                    let currentIndex = 0;

                    function showSlide(index) {
                        slider.style.transform = `translateX(-${index * 100}%)`;
                    }

                    function nextSlide() {
                        currentIndex = (currentIndex + 1) % totalSlides;
                        showSlide(currentIndex);
                    }

                    setInterval(nextSlide, 3600);
                });
            </script>
            @else
                <div style="width: 100%;" class="subweb__main">
                    <div class="midbar">
                        <h2 class="text-center">
                            {{$news->Title}}
                        </h2>
                        <div class="text-center">
                            <small>{{App\Http\Controllers\Dashboard::countDay($news->DateTime)}}</small>
                        </div>
                    </div>
                    <div class="subweb__content">
                        <article class="article">
                            <div class="article__content">
                                {!! $news->Context !!}
                            </div>
                        </article>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

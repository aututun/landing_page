@extends('main.layout.master')
@section('news')
     <section class="gallery-design py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
               <h3 class="title text-center  mb-lg-5 mb-md-4 mb-sm-4 mb-3">Tin tức - sự kiện</h3>
                @php($listCategory = App\Http\Controllers\Dashboard::getListCategory())
                <ul>
                    @foreach($listCategory as $category)
                        <li><a href="{{asset('news')}}/{{$category->Catagory}}">{{$category->Catagory}}</a></li>
                    @endforeach
                </ul>
                @foreach ($listNews->chunk(2) as $news)
                    <div class="row grid gallery-info">
                        @foreach($news as $newDetails)
                        <div class="col-lg-6 col-md-6 col-sm-6 gallery-grids p-0">
                            <figure class="effect-marley gap-gap">
                                <img src="{{asset('main/images/g1.jpg')}}" alt="" class="img-fluid">
                                <figcaption>
                                    <h3>{{$newDetails->Title}}</h3>
                                    <p>{{$newDetails->Datetime}}</p>
                                    <a href="{{asset('main/images/g1.jpg')}}" class="gallery-box" data-lightbox="example-set" data-title="">
                                    </a>
                                </figcaption>
                            </figure>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
         </section>
@endsection

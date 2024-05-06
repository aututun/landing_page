@extends('main.layout.master')
@section('gallery')
     <section class="gallery-design py-lg-4 py-md-3 py-sm-3 py-3">
            <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
               <h3 class="title text-center  mb-lg-5 mb-md-4 mb-sm-4 mb-3">Thư viện ảnh</h3>
               <div class="row grid gallery-info">
                  <div class="col-lg-7 col-md-7 col-sm-7 gallery-grids p-0">
                     <figure class="effect-marley gap-gap">
                        <img src="{{asset('main/images/g1.jpg')}}" alt="" class="img-fluid">
                        <figcaption>
                           <h3>Kiếm <span>Võ</span></h3>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                           <a href="{{asset('main/images/g1.jpg')}}" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 p-0 gallery-grids">
                     <figure class="effect-marley gap-gap">
                        <img src="{{asset('main/images/g2.jpg')}}" alt="" class="img-fluid">
                        <figcaption>
                           <h3>Kiếm<span>Võ</span></h3>
                           <p>Lorem ipsum dolor sit amet, consectetur</p>
                           <a href="{{asset('main/images/g2.jpg')}}" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                  </div>
               </div>
               <div class="row grid gallery-info">
                  <div class="col-lg-5 col-md-5 col-sm-5 gallery-grids p-0">
                     <figure class="effect-marley gap-gap">
                        <img src="images/g3.jpg" alt="" class="img-fluid">
                        <figcaption>
                           <h3>Kiếm<span>Võ</span></h3>
                           <p>Lorem ipsum dolor sit amet, consectetur </p>
                           <a href="images/g3.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                     <figure class="effect-marley gap-gap">
                        <img src="images/g4.jpg" alt="" class="img-fluid">
                        <figcaption>
                           <h3>Kiếm<span>Võ</span></h3>
                           <p>Lorem ipsum dolor sit amet, consectetur</p>
                           <a href="images/g4.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-7 p-0 gallery-grids">
                     <figure class="effect-marley gap-gap">
                        <img src="images/g5.jpg" alt="" class="img-fluid">
                        <figcaption>
                           <h3>Kiếm<span>Võ</span></h3>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                           <a href="images/g5.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                     <figure class="effect-marley gap-gap">
                        <img src="images/g6.jpg" alt="" class="img-fluid">
                        <figcaption>
                           <h3>Kiếm<span>Võ</span></h3>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
                           <a href="images/g6.jpg" class="gallery-box" data-lightbox="example-set" data-title="">
                           </a>
                        </figcaption>
                     </figure>
                  </div>
               </div>
            </div>
         </section>
@endsection

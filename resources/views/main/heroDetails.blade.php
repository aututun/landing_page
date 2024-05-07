@extends('main.layout.master')
@section('heroDetails')
<section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">

        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Môn phái</h3>
        <div class="row">
            <div class="col-lg-8 about-txt-left">
                <img src="{{asset($hero['image'])}}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-4 about-txt-right">
                <div class="jst-wthree-text">
                    <h2>{{$hero['name']}}
                    </h2>
                </div>
                <div class="info-sub-w3">
                    <p>Bổng Pháp hệ ngoại công, Lấy gậy làm vũ khí,
                        tính thông tuyệt kỹ Đá Cẩu Bồng
                    </p>
                    <p class="pt-2">Chưởng Pháp hệ nội công, bao tay làm vũ khí,
                        tính thông Hàng Long Chưởng Pháp
                    </p>
                </div>
                <div class="abut-fst-img pt-3">
                    <img src="{{asset('main/images/ab2.jpg')}}" alt=" " class="img-fluid">
                    <div class="abut-secound-img">
                        <img src="{{asset('main/images/ab3.jpg')}}" alt=" " class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

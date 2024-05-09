@extends('main.layout.master')
@section('heroes')
<section class="select-hero py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
        <h3 class="title text-center  mb-lg-5 mb-md-4 mb-sm-4 mb-3">Chọn môn phái</h3>
        <div class="state-us ">
{{--            @php--}}
{{--                $count = 0; // Initialize a counter--}}
{{--            @endphp--}}
            @foreach ($listHeroes->chunk(3) as $heros)
                @foreach($heros as $hero)
                    @if ($count % 3 == 0) <div class="row mt-lg-5 mt-md-3 mt-3"> @endif
                        <div class="col-lg-4 col-md-4 col-sm-4 latest-jewel-grid">
                            <figure class="snip1321">
                                <img src="{{$hero['image']}}" class="img-thumbnail" alt="">
                                <figcaption>
                                    <i class="ion-upload"></i>
                                    <h4>{{$hero['name']}}</h4>
                                </figcaption>
                                <a href="{{$hero['link']}}"></a>
                            </figure>
                        </div>
{{--                    @if ($count == 2) </div> @endif--}}
{{--                    @php $count++;@endphp--}}
                @endforeach
            @endforeach
        </div>
    </div>
</section>
@endsection

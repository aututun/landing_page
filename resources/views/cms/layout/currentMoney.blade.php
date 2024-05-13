<div class="col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{asset('cms/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card"
                         class="rounded"/>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalKvcoin">Nạp KV coin</a>
                    </div>
                </div>
            </div>
            <span class="d-block mb-1"><h4>KV coin</h4></span>
            <h3 class="card-title text-nowrap mb-2">{{number_format($kvcoin)}}</h3>
            {{--                                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>--}}
        </div>
    </div>
</div>
<div class="col-6 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{asset('cms/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card"
                         class="rounded"/>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalDong">Nạp đồng</a>
                    </div>
                </div>
            </div>
            <span class="fw-semibold d-block mb-1"><h4>Đồng</h4></span>
            <h3 class="card-title mb-2">{{number_format($dong)}}</h3>
            {{--                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>--}}
        </div>
    </div>
</div>

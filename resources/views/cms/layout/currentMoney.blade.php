<div class="col-12 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{asset('cms/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card"
                         class="rounded"/>
                </div>
{{--                <div class="dropdown">--}}
{{--                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalKvcoin">Nạp KV coin</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <span class="d-block mb-1"><h4>KV coin : {{number_format($kvcoin)}}</h4></span>
            <button data-bs-toggle="modal" data-bs-target="#modalKvcoinQR" type="button" class="btn btn-outline-secondary account-image-reset">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Thanh toán qua QR</span>
            </button>
            <button data-bs-toggle="modal" data-bs-target="#modalKvcoinNapas" type="button" class="btn btn-outline-secondary account-image-reset">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Thanh toán qua Napas</span>
            </button>
            <hr>
            <small class="text-danger fw-semibold">100.000 VNĐ = 100 KVcoin</small>
        </div>
    </div>
</div>
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{asset('cms/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card"
                         class="rounded"/>
                </div>
{{--                <div class="dropdown">--}}
{{--                    <div class="dropdown-menu" aria-labelledby="cardOpt1">--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalDong">Nạp đồng</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <span class="d-block mb-1"><h4>Đồng</h4></span>
            <button data-bs-toggle="modal" data-bs-target="#modalDong" type="button" class="btn btn-outline-secondary account-image-reset">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">&nbsp;&nbsp;&nbsp; Nạp đồng &nbsp;&nbsp;&nbsp;</span>
            </button>
            <hr>
            <small class="text-danger fw-semibold"> 100 KVcoin = 1,8 vạn Đồng </small>
{{--                                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>--}}
        </div>
    </div>
</div>

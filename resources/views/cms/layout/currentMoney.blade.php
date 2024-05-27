<div class="col-12 mb-4">
    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img src="{{asset('cms/assets/img/icons/unicons/wallet-info.png')}}" alt="Credit Card"
                         class="rounded"/>
                </div>
            </div>
            <span class="d-block mb-1"><h4>KV coin : {{number_format($kvcoin)}}</h4></span>
            <button data-bs-toggle="modal" data-bs-target="#modalKvcoinNapas" type="button" class="btn btn-sm btn-outline-primary">
                Nạp tự động
            </button>
            <button data-bs-toggle="modal" data-bs-target="#modalKvcoinQR" type="button" class="btn btn-sm btn-outline-primary">
                Nạp thủ công
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
            </div>
            <span class="d-block mb-1"><h4>Đồng</h4></span>
            <button data-bs-toggle="modal" data-bs-target="#modalDong" type="button" class="btn btn-sm btn-outline-primary">
                Nạp đồng
            </button>
            <hr>
            <small class="text-danger fw-semibold"> 100 KVcoin = 1,8 vạn Đồng </small>
        </div>
    </div>
</div>

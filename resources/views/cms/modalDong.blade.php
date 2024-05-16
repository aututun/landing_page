<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <div class="modal fade" id="modalDong" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{asset('/napDong')}}" method="post">
                    {{ csrf_field() }}
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Nạp Đồng</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Bạn có : {{number_format($kvcoin)}} KV coin</label>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="KVcoin" class="form-label">Số đồng quy đổi</label>
                                <select id="KVcoin" name="KVcoin" class="form-select color-dropdown">
                                    @php($mark = 'disabled')
                                    <option selected value="0">0 KV coin - {{ 0 * env('RATE_NAP',180) }} Đồng</option>
                                    <option value="20" {{ $kvcoin < 20 ? $mark : '' }}>20 KV coin - {{number_format(20*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="50" {{ $kvcoin < 50 ? $mark : '' }}>50 KV coin - {{number_format(50*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="100" {{ $kvcoin < 100 ? $mark : '' }}>100 KV coin - {{number_format(100*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="200" {{ $kvcoin < 200 ? $mark : '' }}>200 KV coin - {{number_format(200*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="500" {{ $kvcoin < 500 ? $mark : '' }}>500 KV coin - {{number_format(500*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="1000" {{ $kvcoin < 1000 ? $mark : '' }}>1000 KV coin - {{number_format(1000*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="2000" {{ $kvcoin < 2000 ? $mark : '' }}>2000 KV coin - {{number_format(2000*env('RATE_NAP',180))}} Đồng</option>
                                    <option value="5000" {{ $kvcoin < 5000 ? $mark : '' }}>5000 KV coin - {{number_format(5000*env('RATE_NAP',180))}} Đồng</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="ServerID" class="form-label">Danh sách máy chủ</label>
                                <select id="ServerID" name="ServerID" class="form-select color-dropdown">
                                    @php($serverList = App\Http\Controllers\Dashboard::getListServer())
                                    <option selected disabled value="0">Chọn máy chủ bạn muốn nạp</option>
                                    @foreach($serverList as $server)
                                        @if($server->isTestServer == 3)
                                            <option value="{{$server->nServerID}}">{{$server->strServerName}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Nạp đồng</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

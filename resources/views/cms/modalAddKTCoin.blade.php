<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <div class="modal fade" id="modalAddTKCoin_{{$userId}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{asset('/congKTcoin')}}" method="post">
                    <input type="hidden" name="userDuocNap" value="{{$userId}}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Nạp KVCoin</h5>
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
                                    <label for="KVcoin" class="form-label">Số Coin cộng thêm</label>
                                    <select id="KVcoin" name="KVcoin" class="form-select color-dropdown">
                                        <option value="20">20 KV coin</option>
                                        <option value="50">50 KV coin</option>
                                        <option value="100">100 KV coin</option>
                                        <option value="200">200 KV coin</option>
                                        <option value="500">500 KV coin</option>
                                        <option value="1000">1000 KV coin</option>
                                        <option value="2000">2000 KV coin</option>
                                        <option value="5000">5000 KV coin</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Nạp Coin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="modalMinusTKCoin_{{$userId}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{asset('/truKTcoin')}}" method="post">
                    <input type="hidden" name="userDuocNap" value="{{$userId}}">
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Trừ KVCoin</h5>
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
                                <label for="KVcoin" class="form-label">Số Coin trừ đi</label>
                                <select id="KVcoin" name="KVcoin" class="form-select color-dropdown">
                                    <option value="20">20 KV coin</option>
                                    <option value="50">50 KV coin</option>
                                    <option value="100">100 KV coin</option>
                                    <option value="200">200 KV coin</option>
                                    <option value="500">500 KV coin</option>
                                    <option value="1000">1000 KV coin</option>
                                    <option value="2000">2000 KV coin</option>
                                    <option value="5000">5000 KV coin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Trừ Coin</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <div class="modal fade" id="modalKvcoinQR" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Nạp KV coin bằng mã QR</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body" style="align-items: center;">
                        <img id="qr_img" src="{{asset('/qr.png')}}" alt="">
{{--                        <div class="row">--}}
{{--                            <div class="col mb-3">--}}
{{--                                <label for="nameBasic" class="form-label">Name</label>--}}
{{--                                <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row g-2">--}}
{{--                            <div class="col mb-0">--}}
{{--                                <label for="emailBasic" class="form-label">Email</label>--}}
{{--                                <input type="text" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx" />--}}
{{--                            </div>--}}
{{--                            <div class="col mb-0">--}}
{{--                                <label for="dobBasic" class="form-label">DOB</label>--}}
{{--                                <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY" />--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <hr>
                        <h4>Nội dung nạp là : KV tentaikhoan</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Nạp KV coin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="mt-3">
        <div class="modal fade" id="modalKvcoinNapas" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Nạp KV coin trực tuyến qua Napas</h5>
                        <button
                            type="button"
                            class="btn-close remove_qr"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <form id="kvcoinForm">
                        @csrf
                        <div class="modal-body" style="align-items: center;">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="KVcoin" class="form-label">Số Coin nạp</label>
                                    <select required id="KVcoin" name="KVcoin" class="form-select color-dropdown">
                                        <option value="20000">20.000 VNĐ - 20 KV coin</option>
                                        <option value="50000">50.000 VNĐ - 50 KV coin</option>
                                        <option value="100000">100.000 VNĐ - 100 KV coin</option>
                                        <option value="200000">200.000 VNĐ - 200 KV coin</option>
                                        <option value="500000">500.000 VNĐ - 500 KV coin</option>
                                        <option value="1000000">1.000.000 VNĐ - 1000 KV coin</option>
                                        <option value="2000000">2.000.000 VNĐ - 2000 KV coin</option>
                                        <option value="5000000">5.000.000 VNĐ - 5000 KV coin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row qr_code" style="height: 550px; display: none"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary remove_qr" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" id="submitForm" class="btn btn-primary">Nạp KV coin</button>
                        </div>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function(){
                            $('#submitForm').click(function(e){
                                e.preventDefault();
                                $.ajax({
                                    url: "{{ asset('/createUrl') }}", // Assuming 'create' is the route name
                                    type: 'POST',
                                    data: $('#kvcoinForm').serialize(),
                                    success: function(response) {
                                        window.open(response, '_blank');
                                        $('#modalKvcoinNapas').modal('hide');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(xhr.responseText);
                                    }
                                });
                            });
                        });
                        $('.remove_qr').on('click', function () {
                            $('.qr_code').empty().hide();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

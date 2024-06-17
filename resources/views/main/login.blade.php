<div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>

                <h4 class="mb-0"><span class="text-main-1">Đăng</span> nhập</h4>

                <div class="nk-gap-1"></div>
                <form action="{{asset('/loginPost')}}" method="post" class="nk-form text-white">
                    @csrf
                    <div class="row vertical-gap">
                        <div class="col-md-12">
                            Tài khoản và mật khẩu:
                            <div class="nk-gap"></div>
                            <input type="text" name="LoginName" placeholder="Tài khoản" required>

                            <div class="nk-gap"></div>
                            <input type="password" name="Password" placeholder="Mật khẩu" required>
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            Sử dụng tài khoản xã hội:--}}

{{--                            <div class="nk-gap"></div>--}}

{{--                            <ul class="nk-social-links-2">--}}
{{--                                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a>--}}
{{--                                </li>--}}
{{--                                <li><a class="nk-social-google-plus" href="#"><span--}}
{{--                                            class="fab fa-google-plus"></span></a></li>--}}
{{--                                <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>

{{--                    <div class="nk-gap-1"></div>--}}
{{--                    <div class="row vertical-gap">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <button type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Đăng nhập</button>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mnt-5">--}}
{{--                                <small><a href="#">Quên mật khẩu ?</a></small>--}}
{{--                            </div>--}}
{{--                            <div class="mnt-5">--}}
{{--                                <small><a href="#">Chưa có tài khoản ? Đăng ký ngay</a></small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
</div>

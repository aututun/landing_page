@extends('cms.layout.master')
@section('changePassword')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý tài khoản /</span> Đổi mật khẩu</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/account')}}"><i class="bx bx-user me-1"></i> Thông tin cá nhân</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{asset('/connections')}}"--}}
{{--                            ><i class="bx bx-link-alt me-1 active"></i> Connections</a--}}
{{--                            >--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link active" href="{{asset('/changePassword')}}"
                            ><i class="bx bx-lock me-1"></i> Đổi mật khẩu</a
                            >
                        </li>
                    </ul>
                    <div class="card mb-4">
                        @if(session()->get('status') == 'success')
                            <div class="alert alert-success alert-dismissible" role="alert">Thành công
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif(session()->get('status') == 'error')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                Thất bại
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @php(session()->forget('status'))
                        <h5 class="card-header">Đổi mật khẩu</h5>
                        <!-- Account -->
                        <hr class="my-0" />
                        <div class="card-body">
                            <form action="{{asset('/postChangePassword')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="firstName" class="form-label">Mật khẩu cũ</label>
                                        <input required class="form-control" type="password" id="oldPassword" name="oldPassword" autofocus/>
                                    </div>
                                    <div class="text-danger" id="passwordError" @if(!session()->get('wrong_pass') == 1) style="display: none" {{session()->forget('wrong_pass')}} @endif> Mật khẩu cũ không đúng !</div> <!-- Error message -->
                                    <div class="mb-3 col-md-12">
                                        <label for="lastName" class="form-label">Mật khẩu mới</label>
                                        <input required class="form-control" type="password" name="newPassword" id="newPassword"/>
                                    </div>
                                    <div class="text-danger" id="passwordError" @if(!session()->get('same_pass') == 1) style="display: none" {{session()->forget('same_pass')}} @endif > Mật khẩu mới trùng với mật khẩu cũ !</div> <!-- Error message -->
                                    <div class="mb-3 col-md-12">
                                        <label for="lastName" class="form-label">Nhập lại mật khẩu mới</label>
                                        <input required class="form-control" type="password" name="reNewPassword" id="reNewPassword"/>
                                    </div>
                                    <div class="text-danger" id="passwordError" @if(!session()->get('wrong_retype') == 1) style="display: none" {{session()->forget('wrong_retype')}} @endif > Mật khẩu mới không khớp !</div> <!-- Error message -->
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                                    <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection

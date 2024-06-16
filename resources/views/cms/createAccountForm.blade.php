@extends('cms.layout.master')
@section('account')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        @if(session()->get('statusCreateAccount') == 'success')
                            <div class="alert alert-success alert-dismissible" role="alert">Thành công
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif(session()->get('statusCreateAccount') == 'error')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                Thất bại
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @php(session()->forget('statusCreateAccount'))
                        <h5 class="card-header">Thông tin cá nhân</h5>
                        <!-- Account -->
                        <hr class="my-0" />
                        <div class="card-body">
                            <form action="{{asset('/postCreateAccount')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Họ và tên</label>
                                        <input class="form-control" type="text" name="FullName" id="FullName" value="@if(!empty($user)){{$user->FullName}}@endif"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="LoginName" class="form-label">Tên đăng nhập</label>
                                        <input class="form-control" name="LoginName"  type="text" required/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Phone" class="form-label">Số điện thoại</label>
                                        <input class="form-control" type="tel" name="Phone" id="Phone"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Password" class="form-label">Mật khẩu</label>
                                        <input class="form-control" type="text" name="Password" id="Password" required/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Email" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" id="Email" name="Email" placeholder="john.doe@example.com"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Email" class="form-label">Vai trò</label>
                                        <select required="" name="RoleCms" class="form-select">
                                            <option value="0">Ngươi chơi</option>
                                            <option value="1">Quản trị viên</option>
                                            <option value="2">Đại lý</option>
                                            <option value="3">Tác giả</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2 1">Lưu lại</button>
                                    <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
{{--                    <div class="card">--}}
{{--                        <h5 class="card-header">Delete Account</h5>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="mb-3 col-12 mb-0">--}}
{{--                                <div class="alert alert-warning">--}}
{{--                                    <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>--}}
{{--                                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <form id="formAccountDeactivation" onsubmit="return false">--}}
{{--                                <div class="form-check mb-3">--}}
{{--                                    <input--}}
{{--                                        class="form-check-input"--}}
{{--                                        type="checkbox"--}}
{{--                                        name="accountActivation"--}}
{{--                                        id="accountActivation"--}}
{{--                                    />--}}
{{--                                    <label class="form-check-label" for="accountActivation"--}}
{{--                                    >I confirm my account deactivation</label--}}
{{--                                    >--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection

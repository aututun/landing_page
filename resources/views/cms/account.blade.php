@extends('cms.layout.master')
@section('account')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Quản lý tài khoản /</span> Thông tin cá nhân</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{asset('/account')}}"><i class="bx bx-user me-1"></i> Thông tin cá nhân</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{asset('/connections')}}"--}}
{{--                            ><i class="bx bx-link-alt me-1"></i> Connections</a--}}
{{--                            >--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/changePassword')}}"
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
                        <h5 class="card-header">Thông tin cá nhân</h5>
                        <!-- Account -->
                        <hr class="my-0" />
                        <div class="card-body">
                            <form action="{{asset('/postChangeInfo')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="FallName" class="form-label">FullName</label>
                                        <input class="form-control" type="text" name="FullName" id="FullName" value="@if(!empty($user)){{$user->FullName}}@endif"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">LoginName</label>
                                        <input disabled class="form-control" type="text" value="@if(!empty($user)){{$user->LoginName}}@endif" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Phone" class="form-label">Phone</label>
                                        <input class="form-control" type="text" name="Phone" id="Phone" value="@if(!empty($user)){{$user->Phone}}@endif" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">LastLoginTime</label>
                                        <input disabled class="form-control" type="text" value="@if(!empty($user)){{$user->LastLoginTime}}@endif" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Email" class="form-label">E-mail</label>
                                        <input class="form-control" type="email" id="Email" name="Email" value="@if(!empty($user)){{$user->Email}}@endif" placeholder="john.doe@example.com"/>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2 1">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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

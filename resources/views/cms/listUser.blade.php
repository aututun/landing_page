@extends('cms.layout.master')
@section('listUser')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Danh sách người chơi</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header"></h5>
{{--                <h5 class="card-header">Table Basic</h5>--}}
                <div class="table-responsive text-nowrap">
                    <table class="table display" style="text-align: center;">
                        <thead>
                        <tr>
                            <th>LoginName</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>KV Coin</th>
                            <th>RoleCms</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($listUser as $user)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->LoginName}}</strong></td>
                            <td>{{$user->Phone}}</td>
                            <td>{{$user->Email}}</td>
                            <td>{{$user->KTcoin}}</td>
                            @if($user->RoleCms == 1)
                                <td><span class="badge bg-label-success me-1">Admin</span></td>
                            @else
                                <td><span class="badge bg-label-primary me-1">User</span></td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalAddTKCoin_{{$user->ID}}"><i class="bx bx-edit-alt me-1"></i> Nạp KTCoin</a>
                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalMinusTKCoin_{{$user->ID}}"><i class="bx bx-edit-alt me-1"></i> Trừ KTCoin</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @isset($listUser)
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="demo-inline-spacing">
                            <!-- Basic Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
{{--                                    <li class="page-item prev">--}}
{{--                                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>--}}
{{--                                    </li>--}}
                                    @php($total = App\Http\Controllers\User::getTotalPage())
                                    @for ($i = 1; $i < $total; $i++)
                                    <li class="page-item">
                                        <a class="page-link @if($i == $page) active @endif" href="{{asset('/listUser/'.$i)}}">{{$i}}</a>
                                    </li>
                                    @endfor
{{--                                    <li class="page-item next">--}}
{{--                                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>--}}
{{--                                    </li>--}}
                                </ul>
                            </nav>
                            <!--/ Basic Pagination -->
                        </div>
                    </div>
                </div>
            </div>
            @endisset
        </div>
    </div>
@endsection

@extends('cms.layout.master')
@section('listUserSearch')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Kết quả tìm kiếm cho : {{$loginName}}</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
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
                <h5 class="card-header"></h5>
{{--                <h5 class="card-header">Table Basic</h5>--}}
                <div class="table-responsive text-nowrap">
                    <table class="table display" style="text-align: center;min-height: 300px">
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
                                <td><span class="badge bg-label-success me-1">Admin (quản trị viên)</span></td>
                            @elseif($user->RoleCms == 2)
                                <td><span class="badge bg-label-info me-1">Agency (đại lý)</span></td>
                            @elseif($user->RoleCms == 3)
                                <td><span class="badge bg-label-primary me-1">Author (tác giả)</span></td>
                            @else
                                <td><span class="badge bg-label-secondary me-1">User (người chơi)</span></td>
                            @endif
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        @if(session()->get('roleCms') == 1)
                                            <a class="dropdown-item" href="{{asset('/historyKVcoin')}}/{{$user->ID}}">
                                                <i class="bx bx-history me-1"></i> Lịch sử nạp
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalAddTKCoin_{{$user->ID}}">
                                                <i class="bx bx-plus me-1"></i> Nạp KVCoin
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalMinusTKCoin_{{$user->ID}}">
                                                <i class="bx bx-minus me-1"></i> Trừ KVCoin
                                            </a>
                                        @endif
                                        @if(session()->get('roleCms') == 2)
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalAddTKCoin_{{$user->ID}}">
                                                <i class="bx bx-edit-alt me-1"></i> Nạp KVCoin
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php($kvcoin = App\Http\Controllers\Money::getKTcoin($user->ID))
                        @include('cms.modalAddKTCoin',['kvcoin' => $kvcoin, 'userId' => $user->ID])
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

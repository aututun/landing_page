@extends('cms.layout.master')
@section('news')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Danh sách bài viết</h4>
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{asset('/editNews')}}/0"><i class="menu-icon tf-icons bx bx-detail"></i>Tạo bài viết</a>
                </li>
            </ul>
            <!-- Basic Bootstrap Table -->

            <div class="card">
                @if(session()->get('statusGiftCode') == 'success')
                    <div class="alert alert-success alert-dismissible" role="alert">Xóa thành công
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session()->get('statusGiftCode') == 'error')
                    <div class="alert alert-danger alert-dismissible" role="alert">Xóa thất bại
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h5 class="card-header"></h5>
                {{--                <h5 class="card-header">Table Basic</h5>--}}
                <div class="table-responsive text-nowrap">
                    <table class="table display" style="text-align: center;">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Server</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Item List</th>
                            <th>Time Created</th>
                            <th>Max Active</th>
                            <th>User Name</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($listNews as $news)
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{asset('/editNews')}}/{{$news->ID}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{asset('/deleteGiftCode')}}/{{$news->ID}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{$news->ServerID}}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$news->Code}}</strong></td>
                            @if($news->Status == 1)
                                <td><span class="badge bg-label-success me-1">Active</span></td>
                            @else
                                <td><span class="badge bg-label-danger me-1">InActive</span></td>
                            @endif
                            <td>{{$news->ItemList}}</td>
                            <td>{{$news->TimeCreate}}</td>
                            <td>{{$news->MaxActive}}</td>
                            <td>{{$news->UserName}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

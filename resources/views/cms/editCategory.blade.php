@extends('cms.layout.master')
@section('editCategory')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Form controls -->
                <div class="col-md-12">
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
                        {{session()->forget('success')}}
                        @if($id != 0)
                            <h5 class="card-header">Sửa thể loại bài viết</h5>
                        @else
                            <h5 class="card-header">Tạo thể loại bài viết</h5>
                        @endif
                        <div class="card-body">
                            <form action="{{asset('/postCategory')}}" method="post">
                                @csrf
                                @if($id != 0)
                                    <input type="hidden" name="ID" value="{{$category->ID}}">
                                @else
                                    <input type="hidden" name="ID" value="0">
                                @endif
                                <div class="mb-3">
                                    <label for="CategoryName" class="form-label">Thể loại bài viết</label>
                                    <input type="text" class="form-control" name="CategoryName" id="Category" value="@if($id != 0){{$category->CategoryName}}@endif"/>
                                </div>
                                @if($id != 0)
                                    <button type="submit" class="btn btn-primary">Sửa thể loại bài viết</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Tạo thể loại bài viết</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection

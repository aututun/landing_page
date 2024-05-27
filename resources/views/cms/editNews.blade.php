@extends('cms.layout.master')
@section('editNews')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <!-- Form controls -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        @if(session()->get('success') == 'success')
                            <div class="alert alert-success alert-dismissible" role="alert">Thành công
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif(session()->get('success') == 'error')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                Thất bại
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{session()->forget('success')}}
                        @if($id != 0)
                            <h5 class="card-header">Sửa bài viết</h5>
                        @else
                            <h5 class="card-header">Tạo bài viết</h5>
                        @endif
                        <div class="card-body">
                            <form action="{{asset('/postNews')}}" method="post">
                                {{ csrf_field() }}
                                @csrf
                                @if($id != 0)
                                    <input type="hidden" name="ID" value="{{$news->ID}}">
                                @else
                                    <input type="hidden" name="ID" value="0">
                                @endif
                                <div class="mb-3">
                                    <label for="Category" class="form-label">Thể loại bài viết</label>
                                    <input type="text" class="form-control" name="Category" id="Category" value="@if($id != 0){{$news->Category}}@endif"/>
                                </div>
                                <div class="mb-3">
                                    <label for="Title" class="form-label">Tiêu đề bài viết</label>
                                    <input type="text" class="form-control" name="Title" id="Title" value="@if($id != 0){{$news->Title}}@endif"/>
                                </div>
                                <div class="mb-3">
                                    <label for="Context" class="form-label">Nội dung bài viết</label>
                                    <textarea class="form-control" name="Context" id="Context" rows="10" cols="80">@if($id != 0){{$news->Context}}@endif</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="LinkPicture" class="form-label">Ảnh</label>
                                    <input class="form-control" type="file" id="LinkPicture" name="LinkPicture" value="@if($id != 0){{$news->LinkPicture}}@endif"/>
                                </div>
                                @if($id != 0)
                                    <button type="submit" class="btn btn-primary">Sửa bài viết</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Tạo bài viết</button>
                                @endif
                            </form>
                            <script type="text/javascript" src="{{asset('cms/ckeditor/ckeditor.js')}}"></script>
                            <script>
                                CKEDITOR.replace('Context');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection

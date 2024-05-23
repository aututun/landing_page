@extends('cms.layout.master')
@section('listServer')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Danh sách server</h4>

            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Danh sách Server</label>
                <select required name="ServerID" class="form-select" id="exampleFormControlSelect1" onchange="window.location.href=this.value;">
                    <option selected></option>
                    @php($serverList = App\Http\Controllers\Dashboard::getListServer())
                    @foreach($serverList as $server)
                        @if($server->isTestServer == 3)
                            <option value="{{asset("/serverDetails/$server->nServerID")}}">{{$server->strServerName}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <!-- Basic Bootstrap Table -->
            @if($serverDetails)
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Chi tiết server</h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">ID</label>
                                <input type="text" class="form-control" name="Code" id="exampleFormControlInput1" value="{{$serverDetails->ID}}"/>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">str_ServerName</label>
                                <input type="text" class="form-control" name="Code" id="exampleFormControlInput1" value="{{$serverDetails->strServerName}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

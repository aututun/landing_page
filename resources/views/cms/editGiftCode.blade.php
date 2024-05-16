@extends('cms.layout.master')
@section('giftcode')
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
                            <div class="alert alert-success alert-dismissible" role="alert">
                                Thành công
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{session()->forget('success')}}
                        @if($id != 0)
                            <h5 class="card-header">Sửa Giftcode</h5>
                        @else
                            <h5 class="card-header">Tạo Giftcode</h5>
                        @endif
                        <div class="card-body">
                            <form action="{{asset('/postGiftCode')}}" method="post">
                                {{ csrf_field() }}
                                @csrf
                                @if($id != 0)
                                    <input type="hidden" name="ID" value="{{$giftCode->ID}}">
                                @else
                                    <input type="hidden" name="ID" value="0">
                                @endif
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Danh sách Server</label>
                                    <select required name="ServerID" class="form-select" id="exampleFormControlSelect1">
         ServerID                               @php($serverList = App\Http\Controllers\Dashboard::getListServer())
         ServerID                               @php($serverIdGC = $giftCode->ServerID ?: 0)
                                        @foreach($serverList as $server)
                                            @if($server->isTestServer == 3)
                                                <option @if($server->ID == $serverIdGC) selected @endif value="{{$server->ID}}">{{$server->strServerName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Code</label>
                                    <input type="text" class="form-control" name="Code" id="exampleFormControlInput1" value="@if($id != 0){{$giftCode->Code}}@endif"/>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                    <select required name="Status" class="form-select" id="exampleFormControlSelect1">
                                        <option @if($id != 0) @if($giftCode->Status == 0) selected @endif @endif value="0">In Active</option>
                                        <option @if($id != 0) @if($giftCode->Status == 1) selected @endif @endif value="1">Active</option>
                                    </select>
                                </div>
                                {{--                            <div class="mb-3 row">--}}
                                {{--                                <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Datetime</label>--}}
                                {{--                                <div class="col-md-10">--}}
                                {{--                                    <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="html5-datetime-local-input">--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Max Active</label>
                                    <input type="number" class="form-control" name="MaxActive" id="exampleFormControlInput1" value="@if($id != 0){{$giftCode->MaxActive}}@endif"/>
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Danh sách vật phẩm</label>
                                    <textarea class="form-control" name="ItemList" id="exampleFormControlTextarea1" rows="3">@if($id != 0){{$giftCode->ItemList}}@endif</textarea>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Created By</label>
                                    <input
                                        type="text" readonly class="form-control-plaintext" id="exampleFormControlReadOnlyInputPlain1" value="@if($id != 0){{$giftCode->UserName}}@else @php($user=App\Models\User::getCurrentUser()){{$user->LoginName}}@endif"/>
                                </div>
                                <br>
                                @if($id != 0)
                                    <button type="submit" class="btn btn-primary">Sửa Giftcode</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Tạo Giftcode</button>
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

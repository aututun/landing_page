@extends('cms.layout.master')
@section('listHistoryKTcoin')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Kết lịch sử nạp của : {{$loginName}}</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header"></h5>
                {{--                <h5 class="card-header">Table Basic</h5>--}}
                <div class="table-responsive text-nowrap">
                    <table class="table display" style="text-align: center;min-height: 300px">
                        <thead>
                        <tr>
                            <th>Người nạp</th>
                            <th>Số tiền</th>
{{--                            <th>Phương thức</th>--}}
                            <th>Ngày nạp</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($listHistoryKTcoin as $history)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$history->FromUser}}</strong></td>
                                <td>{{$history->KVcoin}}</td>
{{--                                <td>{{$history->Method}}</td>--}}
                                <td>{{$history->Date}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

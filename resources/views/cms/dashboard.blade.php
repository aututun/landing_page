@extends('cms.layout.master')
@section('dashboard')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            @isset($status)
                @if($status)
                    <div class="alert alert-success alert-dismissible" role="alert">
                        Thành công
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        Thất bại
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @endisset
            <div class="row">
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                        <div
                                            class="flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title">
                                                <h5 class="text-nowrap mb-2">Hướng dẫn nạp</h5>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <ul>
                                                    <li><h6> Chuyển khoản theo mốc nạp 20k, 50k, 100k, 200k, 500k,..... </h6></li>
                                                    <li><h6> Chọn nạp kvcoin chuyển tiền theo mốc kèm lời nhắn : "KV tentaikhoan" </h6></li>
                                                    <li><h6> Nếu 5p chưa được cộng kvcoin thì liên hệ ad gửi ảnh chuyển khoản + tên tk </h6></li>
                                                    <li><h6> Đổi KVcoin sang đồng theo các mệnh giá để có đồng trong game </h6></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                        <div
                                            class="flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title">
                                                <h5 class="text-nowrap mb-2">Mốc quy đổi</h5>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <ul>
                                                    <li>20.000 VNĐ  &nbsp; - &nbsp;  20 KVcoin</li>
                                                    <li>50.000 VNĐ  &nbsp; - &nbsp;  50 KVcoin</li>
                                                    <li>100.000 VNĐ  &nbsp; - &nbsp;  100 KVcoin</li>
                                                    <li>200.000 VNĐ  &nbsp; - &nbsp;  200 KVcoin</li>
                                                    <li>500.000 VNĐ  &nbsp; - &nbsp;  500 KVcoin</li>
                                                    <li>1.000.000 VNĐ  &nbsp; - &nbsp;  1000 KVcoin</li>
                                                    <li>2.000.000 VNĐ  &nbsp; - &nbsp;  2000 KVcoin</li>
                                                    <li>5.000.000 VNĐ  &nbsp; - &nbsp;  5000 KVcoin</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                    <div class="row">
                        @php
                            $kvcoin = App\Http\Controllers\Money::getKTcoin();
                            $dong = App\Http\Controllers\Money::getDong();
                        @endphp
                        @include('cms.layout.currentMoney', ['kvcoin' => $kvcoin, 'dong' => $dong])
                    </div>
                </div>
{{--                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">--}}
{{--                    <div class="card">--}}
{{--                        <div class="row row-bordered g-0">--}}
{{--                            <div class="col-md-8">--}}
{{--                                <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>--}}
{{--                                <div id="totalRevenueChart" class="px-2"></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="text-center">--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button--}}
{{--                                                class="btn btn-sm btn-outline-primary dropdown-toggle"--}}
{{--                                                type="button"--}}
{{--                                                id="growthReportId"--}}
{{--                                                data-bs-toggle="dropdown"--}}
{{--                                                aria-haspopup="true"--}}
{{--                                                aria-expanded="false"--}}
{{--                                            >--}}
{{--                                                2022--}}
{{--                                            </button>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">--}}
{{--                                                <a class="dropdown-item" href="javascript:void(0);">2024</a>--}}
{{--                                                <a class="dropdown-item" href="javascript:void(0);">2023</a>--}}
{{--                                                <a class="dropdown-item" href="javascript:void(0);">2022</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div id="growthChart"></div>--}}
{{--                                <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>--}}

{{--                                <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="me-2">--}}
{{--                                            <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column">--}}
{{--                                            <small>2022</small>--}}
{{--                                            <h6 class="mb-0">$32.5k</h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex">--}}
{{--                                        <div class="me-2">--}}
{{--                                            <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column">--}}
{{--                                            <small>2021</small>--}}
{{--                                            <h6 class="mb-0">$41.2k</h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4"><h3>Lịch sử nạp</h3>--}}
{{--                    <table class="table display" style="text-align: center;">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Server</th>--}}
{{--                            <th>Code</th>--}}
{{--                            <th>Status</th>--}}
{{--                            <th>Item List</th>--}}
{{--                            <th>Time Created</th>--}}
{{--                            <th>Max Active</th>--}}
{{--                            <th>User Name</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody class="table-border-bottom-0">--}}
{{--                        <tr>--}}
{{--                            <td>4</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>123_ABC</strong></td>--}}
{{--                            <td><span class="badge bg-label-danger me-1">InActive</span></td>--}}
{{--                            <td></td>--}}
{{--                            <td>2024-05-16 17:18:29.000</td>--}}
{{--                            <td>12</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/6"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>4</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>153</strong></td>--}}
{{--                            <td><span class="badge bg-label-danger me-1">InActive</span></td>--}}
{{--                            <td></td>--}}
{{--                            <td>2024-05-16 17:16:14.000</td>--}}
{{--                            <td>34</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/7"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>4</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>`235`</strong></td>--}}
{{--                            <td><span class="badge bg-label-danger me-1">InActive</span></td>--}}
{{--                            <td></td>--}}
{{--                            <td>2024-05-16 17:16:14.000</td>--}}
{{--                            <td>43</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/8"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>4</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2346</strong></td>--}}
{{--                            <td><span class="badge bg-label-danger me-1">InActive</span></td>--}}
{{--                            <td></td>--}}
{{--                            <td>2024-05-16 17:16:14.000</td>--}}
{{--                            <td>6</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/9"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>1</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>123_123</strong></td>--}}
{{--                            <td><span class="badge bg-label-success me-1">Active</span></td>--}}
{{--                            <td></td>--}}
{{--                            <td>2024-05-16 17:44:54.000</td>--}}
{{--                            <td>12</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/10"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>4</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>123456</strong></td>--}}
{{--                            <td><span class="badge bg-label-success me-1">Active</span></td>--}}
{{--                            <td>1074|1|0#506|1|0</td>--}}
{{--                            <td>2024-05-16 17:46:15.000</td>--}}
{{--                            <td>1000</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/11"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>1</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>ASD</strong></td>--}}
{{--                            <td><span class="badge bg-label-success me-1">Active</span></td>--}}
{{--                            <td></td>--}}
{{--                            <td>2024-05-16 17:48:07.000</td>--}}
{{--                            <td>22</td>--}}
{{--                            <td>admin</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/12"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>1</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>123456</strong></td>--}}
{{--                            <td><span class="badge bg-label-success me-1">Active</span></td>--}}
{{--                            <td>1074|1|0#506|1|0</td>--}}
{{--                            <td>2024-05-16 17:50:44.000</td>--}}
{{--                            <td>24</td>--}}
{{--                            <td></td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/13"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>4</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1234567</strong></td>--}}
{{--                            <td><span class="badge bg-label-success me-1">Active</span></td>--}}
{{--                            <td>1074|1|0#506|1|0</td>--}}
{{--                            <td>2024-05-16 19:24:14.000</td>--}}
{{--                            <td>123</td>--}}
{{--                            <td></td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/14"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>2</td>--}}
{{--                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>123123</strong></td>--}}
{{--                            <td><span class="badge bg-label-success me-1">Active</span></td>--}}
{{--                            <td>1074|1|0#506|1|0</td>--}}
{{--                            <td>2024-05-16 19:30:02.000</td>--}}
{{--                            <td>10</td>--}}
{{--                            <td></td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                                            data-bs-toggle="dropdown">--}}
{{--                                        <i class="bx bx-dots-vertical-rounded"></i>--}}
{{--                                    </button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="https://kiemvo.com/editGiftCode/15"><i--}}
{{--                                                class="bx bx-edit-alt me-1"></i> Edit</a>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
            </div>
            <div class="row">
                <!-- Order Statistics -->
                {{--            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">--}}
                {{--                <div class="card h-100">--}}
                {{--                    <div class="card-header d-flex align-items-center justify-content-between pb-0">--}}
                {{--                        <div class="card-title mb-0">--}}
                {{--                            <h5 class="m-0 me-2">Order Statistics</h5>--}}
                {{--                            <small class="text-muted">42.82k Total Sales</small>--}}
                {{--                        </div>--}}
                {{--                        <div class="dropdown">--}}
                {{--                            <button--}}
                {{--                                class="btn p-0"--}}
                {{--                                type="button"--}}
                {{--                                id="orederStatistics"--}}
                {{--                                data-bs-toggle="dropdown"--}}
                {{--                                aria-haspopup="true"--}}
                {{--                                aria-expanded="false"--}}
                {{--                            >--}}
                {{--                                <i class="bx bx-dots-vertical-rounded"></i>--}}
                {{--                            </button>--}}
                {{--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">--}}
                {{--                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>--}}
                {{--                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>--}}
                {{--                                <a class="dropdown-item" href="javascript:void(0);">Share</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <div class="d-flex justify-content-between align-items-center mb-3">--}}
                {{--                            <div class="d-flex flex-column align-items-center gap-1">--}}
                {{--                                <h2 class="mb-2">8,258</h2>--}}
                {{--                                <span>Total Orders</span>--}}
                {{--                            </div>--}}
                {{--                            <div id="orderStatisticsChart"></div>--}}
                {{--                        </div>--}}
                {{--                        <ul class="p-0 m-0">--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                            <span class="avatar-initial rounded bg-label-primary"--}}
                {{--                            ><i class="bx bx-mobile-alt"></i--}}
                {{--                                ></span>--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <h6 class="mb-0">Electronic</h6>--}}
                {{--                                        <small class="text-muted">Mobile, Earbuds, TV</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress">--}}
                {{--                                        <small class="fw-semibold">82.5k</small>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <h6 class="mb-0">Fashion</h6>--}}
                {{--                                        <small class="text-muted">T-shirt, Jeans, Shoes</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress">--}}
                {{--                                        <small class="fw-semibold">23.8k</small>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <h6 class="mb-0">Decor</h6>--}}
                {{--                                        <small class="text-muted">Fine Art, Dining</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress">--}}
                {{--                                        <small class="fw-semibold">849k</small>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                            <span class="avatar-initial rounded bg-label-secondary"--}}
                {{--                            ><i class="bx bx-football"></i--}}
                {{--                                ></span>--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <h6 class="mb-0">Sports</h6>--}}
                {{--                                        <small class="text-muted">Football, Cricket Kit</small>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress">--}}
                {{--                                        <small class="fw-semibold">99</small>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                {{--            <div class="col-md-6 col-lg-4 order-1 mb-4">--}}
                {{--                <div class="card h-100">--}}
                {{--                    <div class="card-header">--}}
                {{--                        <ul class="nav nav-pills" role="tablist">--}}
                {{--                            <li class="nav-item">--}}
                {{--                                <button--}}
                {{--                                    type="button"--}}
                {{--                                    class="nav-link active"--}}
                {{--                                    role="tab"--}}
                {{--                                    data-bs-toggle="tab"--}}
                {{--                                    data-bs-target="#navs-tabs-line-card-income"--}}
                {{--                                    aria-controls="navs-tabs-line-card-income"--}}
                {{--                                    aria-selected="true"--}}
                {{--                                >--}}
                {{--                                    Income--}}
                {{--                                </button>--}}
                {{--                            </li>--}}
                {{--                            <li class="nav-item">--}}
                {{--                                <button type="button" class="nav-link" role="tab">Expenses</button>--}}
                {{--                            </li>--}}
                {{--                            <li class="nav-item">--}}
                {{--                                <button type="button" class="nav-link" role="tab">Profit</button>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body px-0">--}}
                {{--                        <div class="tab-content p-0">--}}
                {{--                            <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">--}}
                {{--                                <div class="d-flex p-4 pt-3">--}}
                {{--                                    <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                        <img src="{{asset('cms/assets/img/icons/unicons/wallet.png')}}" alt="User" />--}}
                {{--                                    </div>--}}
                {{--                                    <div>--}}
                {{--                                        <small class="text-muted d-block">Total Balance</small>--}}
                {{--                                        <div class="d-flex align-items-center">--}}
                {{--                                            <h6 class="mb-0 me-1">$459.10</h6>--}}
                {{--                                            <small class="text-success fw-semibold">--}}
                {{--                                                <i class="bx bx-chevron-up"></i>--}}
                {{--                                                42.9%--}}
                {{--                                            </small>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div id="incomeChart"></div>--}}
                {{--                                <div class="d-flex justify-content-center pt-4 gap-2">--}}
                {{--                                    <div class="flex-shrink-0">--}}
                {{--                                        <div id="expensesOfWeek"></div>--}}
                {{--                                    </div>--}}
                {{--                                    <div>--}}
                {{--                                        <p class="mb-n1 mt-1">Expenses This Week</p>--}}
                {{--                                        <small class="text-muted">$39 less than last week</small>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <!--/ Expense Overview -->

                <!-- Transactions -->
                {{--            <div class="col-md-6 col-lg-4 order-2 mb-4">--}}
                {{--                <div class="card h-100">--}}
                {{--                    <div class="card-header d-flex align-items-center justify-content-between">--}}
                {{--                        <h5 class="card-title m-0 me-2">Transactions</h5>--}}
                {{--                        <div class="dropdown">--}}
                {{--                            <button--}}
                {{--                                class="btn p-0"--}}
                {{--                                type="button"--}}
                {{--                                id="transactionID"--}}
                {{--                                data-bs-toggle="dropdown"--}}
                {{--                                aria-haspopup="true"--}}
                {{--                                aria-expanded="false"--}}
                {{--                            >--}}
                {{--                                <i class="bx bx-dots-vertical-rounded"></i>--}}
                {{--                            </button>--}}
                {{--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">--}}
                {{--                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>--}}
                {{--                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>--}}
                {{--                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <ul class="p-0 m-0">--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <img src="{{asset('cms/assets/img/icons/unicons/paypal.png')}}" alt="User" class="rounded" />--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <small class="text-muted d-block mb-1">Paypal</small>--}}
                {{--                                        <h6 class="mb-0">Send money</h6>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress d-flex align-items-center gap-1">--}}
                {{--                                        <h6 class="mb-0">+82.6</h6>--}}
                {{--                                        <span class="text-muted">USD</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <img src="{{asset('cms/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <small class="text-muted d-block mb-1">Wallet</small>--}}
                {{--                                        <h6 class="mb-0">Mac'D</h6>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress d-flex align-items-center gap-1">--}}
                {{--                                        <h6 class="mb-0">+270.69</h6>--}}
                {{--                                        <span class="text-muted">USD</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <img src="{{asset('cms/assets/img/icons/unicons/chart.png')}}" alt="User" class="rounded" />--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <small class="text-muted d-block mb-1">Transfer</small>--}}
                {{--                                        <h6 class="mb-0">Refund</h6>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress d-flex align-items-center gap-1">--}}
                {{--                                        <h6 class="mb-0">+637.91</h6>--}}
                {{--                                        <span class="text-muted">USD</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <img src="{{asset('cms/assets/img/icons/unicons/cc-success.png')}}" alt="User" class="rounded" />--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <small class="text-muted d-block mb-1">Credit Card</small>--}}
                {{--                                        <h6 class="mb-0">Ordered Food</h6>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress d-flex align-items-center gap-1">--}}
                {{--                                        <h6 class="mb-0">-838.71</h6>--}}
                {{--                                        <span class="text-muted">USD</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex mb-4 pb-1">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <img src="{{asset('cms/assets/img/icons/unicons/wallet.png')}}" alt="User" class="rounded" />--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <small class="text-muted d-block mb-1">Wallet</small>--}}
                {{--                                        <h6 class="mb-0">Starbucks</h6>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress d-flex align-items-center gap-1">--}}
                {{--                                        <h6 class="mb-0">+203.33</h6>--}}
                {{--                                        <span class="text-muted">USD</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li class="d-flex">--}}
                {{--                                <div class="avatar flex-shrink-0 me-3">--}}
                {{--                                    <img src="{{asset('cms/assets/img/icons/unicons/cc-warning.png')}}" alt="User" class="rounded" />--}}
                {{--                                </div>--}}
                {{--                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
                {{--                                    <div class="me-2">--}}
                {{--                                        <small class="text-muted d-block mb-1">Mastercard</small>--}}
                {{--                                        <h6 class="mb-0">Ordered Food</h6>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="user-progress d-flex align-items-center gap-1">--}}
                {{--                                        <h6 class="mb-0">-92.45</h6>--}}
                {{--                                        <span class="text-muted">USD</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                <!--/ Transactions -->
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="/" target="_blank" class="footer-link fw-bolder">Noisyboyy</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
@endsection

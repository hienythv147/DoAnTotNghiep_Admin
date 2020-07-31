@extends('master-page')

@include('layouts.css')

@section('page-content')

<h1 style="margin-top: 50px; text-align: center;">Danh sách thống kê</h1>

<div style="margin-top: 10px;" class="row">
    {{-- <div class="col-xl-4">
        <div class="card-box">
            <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
            <h4 class="mt-0 font-16">Số dư</h4>
            <h2 class="text-primary my-4 text-center"><span data-plugin="counterup">10,000,000</span> VNĐ</h2>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="text-muted mb-1">Tháng này</p>
                    <h3 class="mt-0 font-20 text-truncate">100.000 VNĐ<small class="badge badge-light-success font-13">+15%</small></h3>
                </div>

                <div class="col-6">
                    <p class="text-muted mb-1">Tháng trước</p>
                    <h3 class="mt-0 font-20 text-truncate">100.000 VNĐ<small class="badge badge-light-danger font-13">-5%</small></h3>
                </div>
            </div>

            <div class="mt-5">
                <span data-plugin="peity-line" data-fill="#56c2d6" data-stroke="#4297a6" data-width="100%" data-height="50">3,5,2,9,7,2,5,3,9,6,5,9,7</span>
            </div>

        </div> <!-- end card-box-->
    </div> --}}
    
    {{-- <div class="col-xl-8">
        {{$ordersChart->container()}}
    </div> --}}
    {{-- <div class="col-xl-8">
        <div class="card-box">
            <div class="float-right d-none d-md-inline-block">
                <div class="btn-group mb-2">
                    <button type="button" class="btn btn-xs btn-secondary">Hàng ngày</button>
                    <button type="button" class="btn btn-xs btn-light">Hàng tuần</button>
                    <button type="button" class="btn btn-xs btn-light">Hàng tháng</button>
                </div>
            </div>
            <h4 class="header-title mb-1">Lịch sử giao dịch</h4>
            <div id="rotate-labels-column" class="apex-charts">
                {{$ordersChart->container()}}
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col --> --}}
    <div class="container">
        {{-- <h1></h1> --}}
        <div class="row">
            <div class="col-6">
                <div class="card rounded">
                    <div class="card-body py-3 px-3">
                        {!! $ordersChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@include('Dashboard.js')
@extends('master-page')

<!-- CSS  -->
{{-- @include('layouts.css') --}}
@section('css')
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

@endsection
{{-- Nội dung trang --}}
@section('page-content')
<div class="row" style="margin-top: 50px">
    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            
            <h4 class="header-title mt-0 mb-2">Khách hàng mới</h4>

            <div class="mt-1">
                <div class="float-left" dir="ltr">
                    <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#f05050 "
                        data-bgColor="#F9B9B9" value="{{ $newCustomer[0]}}"
                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                        data-thickness=".15"/>
                </div>
                <div class="text-right">
                    <h2 class="mt-3 pt-1 mb-1"> {{ number_format($newCustomerLastWeek[0],0,".",".")}} </h2>
                    <p class="text-muted mb-0">Tuần trước</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            

            <h4 class="header-title mt-0 mb-3">Đơn hàng trong ngày</h4>

            <div class="mt-1">
                <div class="float-left" dir="ltr">
                    <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#675db7"
                data-bgColor="#e8e7f4" value="{{ $orders_toDay[0] }}"
                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                        data-thickness=".15"/>
                </div>
                <div class="text-right">
                    <h2 class="mt-3 pt-1 mb-1">{{ number_format($orders_LastWeek[0],0,".",".") }} </h2>
                    <p class="text-muted mb-0">Tuần trước</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            

            <h4 class="header-title mt-0 mb-3">Trong tuần (VNĐ)</h4>

            <div class="mt-1">
                <div class="float-left" dir="ltr">
                    <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#23b397"
                        data-bgColor="#c8ece5" value="{{ $orders_toWeek[0] }}"
                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                        data-thickness=".15"/>
                </div>
                <div class="text-right">
                    <h2 class="mt-3 pt-1 mb-1">{{ number_format($total_toWeek[0],0,".",".")}}  </h2>
                    <p class="text-muted mb-0">Tuần này</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card-box">
            

            <h4 class="header-title mt-0 mb-3">Trong ngày (VNĐ)</h4>

            <div class="mt-1">
                <div class="float-left" dir="ltr">
                    <input data-plugin="knob" data-width="64" data-height="64" data-fgColor="#ffbd4a"
                        data-bgColor="#FFE6BA" value="{{ $orders_toDay[0] }}"
                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                        data-thickness=".15"/>
                </div>
                <div class="text-right">
                    <h2 class="mt-3 pt-1 mb-1">{{ number_format($total_toDay[0],0,".",".")}}</h2>
                    <p class="text-muted mb-0">Doanh thu hôm nay </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!-- end col -->
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="mt-0 font-16">Tổng doanh thu tháng {{ $month }}</h4>
            <h2 class="text-primary my-4 text-center"><span>{{ number_format($total_toMonth[0],0,'.','.') }}</span> VNĐ</h2>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="text-muted mb-1">Tuần Này</p>
                    <h3 class="mt-0 font-20 text-truncate">{{ number_format($total_toWeek[0],0,".",".")}} VNĐ<small class="badge badge-light-success font-13"></small></h3>
                </div>
                
                <div class="col-6">
                    <p class="text-muted mb-1">Tuần Trước</p>
                    <h3 class="mt-0 font-20 text-truncate">{{ number_format($total_LastWeek[0],0,".",".")}} VNĐ<small class="badge badge-light-danger font-13"></small></h3>
                </div>
            </div>

            <div class="mt-5">
            <span data-plugin="peity-line" data-fill="#56c2d6" data-stroke="#4297a6" data-width="100%" data-height="50">{{ implode(',', $orders_InMonth) }}</span>
            </div>
            

        </div> <!-- end card-box-->
    </div>
    <div class="col-xl-6">
        <div class="card-box">
            <div id="chart" style="height: 300px;"></div>
        </div>
    </div>
</div>
@endsection
{{-- @include('layouts.js') --}}
@section('js')
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<script>
     const chart = new Chartisan({
         el: '#chart',
         url: "@chart('order_chart2')", 
         loader: {
            color: '#1ed865',
            size: [30, 30],
            type: 'bar',
            textColor: '#1c1c59',
            text: 'Đang tải dữ liệu..',
        },
         hooks: new ChartisanHooks()
          .title("Đồ thị thống kê doanh thu tháng")
          .responsive(true)
          .beginAtZero()
          .colors(['rgb(240, 100, 59)'])
          .borderColors()
          // .datasets(['bar']),
       });
</script>


<!-- Third Party js-->
<script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('assets/libs/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<!-- third party js ends -->

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>
<!-- App js-->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
@endsection
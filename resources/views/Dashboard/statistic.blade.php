@extends('master-page')

{{-- @include('layouts.css') --}}

@section('page-content')

{{-- <h1 style="margin-top: 50px; text-align: center;">Danh sách thống kê</h1> --}}
<div class="row" style="margin-top: 50px;">
    <div class="col-xl-4"></div>
    <div class="col-xl-4">
      {{-- <div  class="button-list"> --}}
      <form class="form-horizontal" action="" method="GET" >
        &emsp;&emsp;&emsp;
        <button type="submit" class="btn btn-secondary waves-effect waves-light">&emsp;Ngày&emsp;</button>
        <button type="submit" class="btn btn-secondary waves-effect waves-light">&emsp;Tuần&emsp;</button>
        <button type="submit" class="btn btn-secondary waves-effect waves-light">&emsp;Tháng&emsp;</button>
        </form>
      {{-- </div> --}}
    </div>
    <div class="col-xl-4"></div>

</div>
     <!-- Chart's container -->
     <div id="chart" style="height: 300px;"></div>
     <div id="chart2" style="height: 300px"></div>
     <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
     <!-- Your application script -->
     <script>
       const chart = new Chartisan({
         el: '#chart',
         url: "@chart('order_chart')", 
         loader: {
            color: '#1ed865',
            size: [30, 30],
            type: 'bar',
            textColor: '#1c1c59',
            text: 'Đang tải dữ liệu..',
        },
         hooks: new ChartisanHooks()
          .title('Đồ thị thống kê đơn hàng tuần')
          .responsive(true)
          .beginAtZero()
          .colors()
          .borderColors()
          .datasets([{ type: 'line', fill: false }, 'bar']),
       });

      
     </script>
<!-- end row -->
 @endsection 

{{-- @include('Dashboard.js') --}}
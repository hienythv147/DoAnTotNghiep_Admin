@extends('master-page')

@include('layouts.css')

@section('page-content')

{{-- <h1 style="margin-top: 50px; text-align: center;">Danh sách thống kê</h1> --}}

     <!-- Chart's container -->
     <div id="chart" style="height: 300px;margin-top: 50px;"></div>
     <!-- Charting library -->
     {{-- <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script> --}}
     <!-- Chartisan -->
     {{-- <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script> --}}
     <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
     <!-- Your application script -->
     <script>
       const chart = new Chartisan({
         el: '#chart',
         url: "@chart('order_chart')", 
    //      loader: {
    //         color: '#ff00ff',
    //         size: [30, 30],
    //         type: 'bar',
    //         textColor: '#ffff00',
    //         text: 'Đang tải dữ liệu..',
    //     },
         hooks: new ChartisanHooks()
        .colors(['#ECC94B', '#4299E1'])
        .responsive()
        .beginAtZero()
        
        .legend({ position: 'top' })
        .title('Đồ thị thống kê doanh thu')
       });
     </script>
<!-- end row -->
@endsection

{{-- @include('Dashboard.js') --}}
@extends('master-page')

@include('layouts.css')

@section('page-content')

<h1 style="margin-top: 50px; text-align: center;">Danh sách thống kê</h1>

     <!-- Chart's container -->
     <div id="chart" style="height: 300px;"></div>
     <!-- Charting library -->
     <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
     <!-- Chartisan -->
     <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
     <!-- Your application script -->
     <script>
       const chart = new Chartisan({
         el: '#chart',
         url: "@chart('order_chart')",
       });
     </script>
<!-- end row -->
@endsection

{{-- @include('Dashboard.js') --}}
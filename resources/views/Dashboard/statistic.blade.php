@extends('master-page')
@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
     <!-- Charting library -->
     <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
     <!-- Chartisan -->
     <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
@endsection
@section('page-content')

{{-- <h1 style="margin-top: 50px; text-align: center;">Danh sách thống kê</h1> --}}
  <div class="row" style="margin-top: 50px;">
    <form method="POST">
      @csrf
      <div class="row">

        <input name="startDay" id="datepicker1" width="276"/>
        
      <input style="margin-left: 10px" name="endDay" id="datepicker2" width="276"/>
      <button style="margin-left: 10px" class="btn btn-primary waves-effect waves-light"> Tìm</button>
      </div>
    </form>
  </div>

     <div id="chart" style="height: 300px;"></div>
     <div id="chart2" style="height: 300px;"></div>

     <!-- Your application script -->
     <script>
       $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',

        });
      var daysInMonth = {!!$daysInMonth!!};
      var orders_dayInMonth = {!!$orders_dayInMonth!!};
      var orders_complete = {!!$orders_complete!!};
       const chart = new Chartisan({
         el: '#chart',
         data: {
          chart: { "labels": daysInMonth },
          datasets: [
                { "name": "Tổng đơn", "values": orders_dayInMonth },
                { "name": "Tổng đơn hoàn thành", "values": orders_complete }
            ],
         },
         loader: {
            color: '#1ed865',
            size: [30, 30],
            type: 'bar',
            textColor: '#1c1c59',
            text: 'Đang tải dữ liệu..',
        },
         hooks: new ChartisanHooks()
          .title('Đồ thị thống kê đơn hàng')
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
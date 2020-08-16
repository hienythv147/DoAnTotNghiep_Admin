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
  <div class="row" style="margin-top: 40px;">
    <form method="POST">
      @csrf
      <div class="row">
        <input value="{{ old('startDay') }}" name="startDay" id="datepicker1" width="276" autocomplete="off"/>
        <input value="{{ old('endDay') }}"  name="endDay" style="margin-left: 10px" id="datepicker2" width="276" autocomplete="off"/>
        <button style="margin-left: 10px" class="btn btn-primary waves-effect waves-light"> Tìm</button>
      </div>
    </form>
  </div>

    @if($errors->has('startDay'))
      <div style="margin-top:30px"  id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$errors->first('startDay')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif($errors->has('endDay'))
    <div style="margin-top:30px"  id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
      {{$errors->first('endDay')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    <div class="row">
      <div class="col-6">
        <div id="chart" style="height: 400px;"></div>
      </div>
      <div class="col-6">
        <div id="chart2" style="height: 400px;"></div>
      </div>
    </div>

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
      var total_dayInMonth = {!!$total_dayInMonth!!};
      var total_complete = {!!$total_complete!!};
      var orders_fail = {!!$orders_fail!!};
      var total_fail = {!!$total_fail!!};
      const chart = new Chartisan({
         el: '#chart',
         data: {
          chart: { "labels": daysInMonth },
          datasets: [
                { "name": "Tổng đơn", "values": orders_dayInMonth },
                { "name": "Tổng đơn hoàn thành", "values": orders_complete },
                { "name": "Tổng đơn hủy", "values": orders_fail },
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
          .colors(['#56aaff','#aaffaa','#ff5656'])
          .borderColors()
          .datasets('bar'),
       });
       const chart2 = new Chartisan({
         el: '#chart2',
         data: {
          chart: { "labels": daysInMonth },
          datasets: [
                { "name": "Tổng doanh thu", "values": total_dayInMonth },
                { "name": "Doanh thu thật sự", "values": total_complete },
                { "name": "Tổn thất", "values": total_fail },
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
          .title('Đồ thị thống kê doanh thu')
          .responsive(true)
          .beginAtZero()
          .colors(['#56aaff','#aaffaa','#ff5656'])
          .borderColors()
          .datasets('bar'),
       });
     </script>
<!-- end row -->
 @endsection 
{{-- @include('Dashboard.js') --}}

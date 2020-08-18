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
    <form class="form-row" method="POST">
      @csrf
        <div class="col-md-3">
          <select name="product_id" class="browser-default custom-select">
              <option selected>Sản phẩm</option>
              @foreach($products as $value)
              <option value="{{ $value->id }}">{{ $value->name }}</option>
              @endforeach
          </select>
        </div>
        <div class="col-md-3">
        <input id="datepicker1" value="{{ old('startDay') }}" name="startDay"  placeholder="Ngày bắt đầu" autocomplete="off"/>
        </div>
        <div class="col-md-3">
        <input id="datepicker2" value="{{ old('endDay') }}"  name="endDay"  placeholder="Ngày kết thúc"  autocomplete="off"/>
        </div>
        <div class="col-md-3">
        <button  class="btn btn-primary waves-effect waves-light"> Tìm</button>
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
      var ngay_tong = {!!$ngay_tong!!};
      var don_tong = {!!$don_tong!!};
      var tien_tong = {!!$tien_tong!!};
      var don_ht_2 = {!!$don_ht_2!!};
      var tien_ht_2 = {!!$tien_ht_2!!};
      var don_huy = {!!$don_huy!!};
      var tien_huy = {!!$tien_huy!!};
      const chartDon = new Chartisan({
         el: '#chart',
         data: {
          chart: { "labels": ngay_tong },
          datasets: [
                { "name": "Tổng đơn", "values": don_tong },
                { "name": "Tổng đơn hoàn thành", "values": don_ht_2 },
                { "name": "Tổng đơn hủy", "values": don_huy },
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
       const chartTien = new Chartisan({
         el: '#chart2',
         data: {
          chart: { "labels": ngay_tong },
          datasets: [
                { "name": "Tổng doanh thu", "values": tien_tong },
                { "name": "Doanh thu thật sự", "values": tien_ht_2 },
                { "name": "Tổn thất", "values": tien_huy },
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

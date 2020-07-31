
@section('script')
<script src="{{asset('assets/libs/peity/jquery.peity.min.js') }}"></script>
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{asset('assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{asset('assets/libs/jquery-vectormap/jquery-jvectormap-us-merc-en.js') }}"></script>

<script src="{{asset('assets/js/app.min.js') }}"></script>
<!-- Dashboard init -->
<script src="{{asset('assets/js/pages/dashboard-1.init.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@if($ordersChart)
{{ $ordersChart->script() }}
@endif
@endsection
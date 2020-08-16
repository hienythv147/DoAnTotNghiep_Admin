@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')
<h1 style="margin-top: 50px; text-align: center;">Chi tiết hóa đơn bán</h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="basic-datatable" class="table table-striped table-bordered table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%; text-align: center;">ID</th>
                            <!-- <th style="color:white; width: 10%;">Mã đơn bán</th> -->
                            <th style="color:white; width: 40%;">Tên sản phẩm</th>
                            <th style="color:white; width: 10%;">Giá</th>
                            <th style="color:white; width: 10%;">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                        @foreach($orders_out_detail as $value) 
                        <tr style="font-weight: bold;">
                            <td class="tool">{{ $count++ }}</td>
                            <!-- <td>{{ $value->pivot->order_out_id }}</td> -->
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->pivot->price }} VNĐ</td>
                            <td>{{ $value->pivot->amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3>Cập nhật trạng thái đơn hàng</h3>
                <form action="{{ Route('edit-status') }}" method="GET">
                    @csrf
                     <!--Blue select-->
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <select class="browser-default custom-select" name="status">
                                @foreach($listStatus as $key => $value)
                                    @if($key == $orderStatus)
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--/Blue select-->
                    <input type="hidden" value="{{ $orderId }}" name="order_id"/>
                    <a href="{{route('orders-by-status', $orderStatus)}}" class="btn btn-info waves-effect waves-light"><i
                        class="mdi mdi-keyboard-return" style="padding-right:10px"></i>Quay lại</a>
                    <button type="submit" class="btn btn-danger waves-effect waves-light"><i
                        class="fe-edit-1" style="padding-right:10px"></i>Cập nhật</button>
                </form>
			</div>
		</div>
	</div>
</div>
@endsection
@include('layouts.js')
@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')
<h1 style="margin-top: 50px; text-align: center;">Chi tiết hóa đơn nhập</h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="basic-datatable" class="table table-striped table-bordered table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5% ;text-align:center;">ID</th>
                            <th style="color:white; width: 10%;">Hóa đơn nhập</th>
                            <th style="color:white; width: 20%;">Nguyên liệu</th>
                            <th style="color:white; width: 10%;">Giá</th>
                            <th style="color:white; width: 10%;">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders_in_detail as $value) 
                        <tr style="font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->pivot->order_in_id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->pivot->price }} VNĐ</td>
                            <td>{{ $value->pivot->amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('orders-out-list')}}" class="btn btn-info waves-effect waves-light"><i
                    class="mdi mdi-keyboard-return" style="padding-right:10px"></i>Quay lại</a>

			</div>
		</div>
	</div>
</div>
@endsection
@include('layouts.js')
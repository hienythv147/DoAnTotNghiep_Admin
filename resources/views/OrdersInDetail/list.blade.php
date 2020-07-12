@extends('master-page')

<!-- CSS  -->
@include('Body.css')
{{-- Nội dung trang --}}
@section('page-content')
<h1 style="margin-top: 50px; text-align: center;">Chi tiết hóa đơn bán</h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%;">ID</th>
                            <th style="color:white">Đơn nhập</th>
                            <th style="color:white">Nguyên liệu</th>
                            <th style="color:white">Giá</th>
                            <th style="color:white">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_in_detail as $value) 
                        <tr style="font-size: 120%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->order_out_id }}</td>
                            <td>{{ $value->Ingredient->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->amount }}</td>
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
@include('Body.js')
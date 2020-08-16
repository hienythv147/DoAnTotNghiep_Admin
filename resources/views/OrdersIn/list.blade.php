@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')
<h1 style="margin-top: 50px; text-align: center;">Danh sách hóa đơn nhập</h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="basic-datatable" class="table table-striped table-bordered table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%;">ID</th>
                            <th style="color:white; width: 25%;">Nhân viên</th>
                            <th style="color:white; width: 25%;">Tổng tiền</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders_in as $value) 
                        <tr style="font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->User->last_name ." ". $value->User->first_name }}</td>
                            <td>{{ number_format($value->total,"0",",",".") }} VNĐ</td>
                            <td class="tool">
                                <a href="{{ route('orders-in-detail',['id' => $value->id]) }}"  class="btn btn-success waves-effect waves-light "><i class="fas fa-info"></i> Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


			</div>
		</div>
	</div>
</div>
@endsection
@include('layouts.js')
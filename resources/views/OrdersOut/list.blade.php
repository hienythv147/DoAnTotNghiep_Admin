@extends('master-page')

<!-- CSS  -->
@include('Body.css')
{{-- Nội dung trang --}}
@section('page-content')

<h1 style="margin-top: 50px; text-align: center;">Danh sách đơn bán</h1>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white;">ID</th>
                            <th style="color:white">Nhân viên bán</th>
                            <th style="color:white">Khách mua</th>
                            <th style="color:white">Tổng tiền</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $value) 
                        <tr style="font-size: 120%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->staff_id }}</td>
                            <td>{{ $value->customer_id }}</td>
                            <td>{{ $value->total }}</td>
                            <td class="tool">
                                <a href=""
                                    class="btn btn-success waves-effect waves-light ">
                                    <i class="mdi mdi-pencil color " style="padding-right:5px"></i>Chi tiết</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
			</div>
		</div>
	</div>
</div>
@endsection
@include('Body.js')
@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')
<h1 style="margin-top: 50px; text-align: center;">Danh sách hóa đơn bán</h1>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<table id="basic-datatable" class="table table-striped table-bordered table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%;">ID</th>
                            <th style="color:white; width: 20%;">Người lập hóa đơn</th>
                            <th style="color:white; width: 10%;">Tổng tiền</th>
                            <th style="color:white; width: 10%; text-align: center;">Trạng thái</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders_out as $value) 
                        <tr style="font-size: 90%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->User->last_name ." ". $value->User->first_name }}</td>
                            <td>{{ $value->total }} VNĐ</td>
                            @if($value->status == 1)
                            <td style="text-align: center;"><span class="badge badge-pill badge-success" style="width: 100px; padding: .50em .4em;">Đã hoàn tất</span></td>
                            @else
                            <td style="text-align: center;"><span class="badge badge-pill badge-danger" style="width: 100px; padding: .50em .4em;">Chờ xác nhận</span></td>
                            @endif

                            <td>
                                <a href="{{ route('orders-out-detail',['id' => $value->id]) }}" style="margin-left: 100px" class="btn btn-success waves-effect waves-light "><i class="fas fa-info"></i> Chi tiết</a>
                                @if( $value->status != 1)
                                    <a href="{{ route('confirm-order',['id' => $value->id]) }}"  class="btn btn-danger waves-effect waves-light ">Xác nhận</a>
                                @endif
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
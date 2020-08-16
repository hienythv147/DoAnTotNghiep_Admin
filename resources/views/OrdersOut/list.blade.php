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
                <!--Blue select-->
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-md-4">
                        <select class="browser-default custom-select" id="list-status-order">
                            <option value="5">Tất cả hóa đơn</option>
                            <option value="0" {{ Request::path() == 'Admin/orders-out/list/0' ? 'selected' : ''}}>Chờ xác nhận</option>
                            <option value="1" {{ Request::path() == 'Admin/orders-out/list/1' ? 'selected' : ''}}>Đang xử lý</option>
                            <option value="2" {{ Request::path() == 'Admin/orders-out/list/2' ? 'selected' : ''}}>Giao hàng</option>
                            <option value="3" {{ Request::path() == 'Admin/orders-out/list/3' ? 'selected' : ''}}>Đã hoàn tất</option>
                            <option value="4" {{ Request::path() == 'Admin/orders-out/list/4' ? 'selected' : ''}}>Đã hủy</option>
                        </select>
                    </div>
                </div>
                <!--/Blue select-->
				<table id="basic-datatable" class="table table-striped table-bordered table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 7%;">ID</th>
                            <th style="color:white; width: 30%; ">Người lập hóa đơn</th>
                            <th style="color:white; width: 20%; text-align: center;">Tổng tiền</th>
                            <th style="color:white; width: 20%; text-align: center;">Trạng thái</th>
                            <th style="color:white; width: 20%; text-align: center;">Ngày lập</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders_out as $value)
                        <tr style="font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->User->last_name ." ". $value->User->first_name }}</td>
                            <td class="tool">{{ number_format($value->total,"0",",",".") }} VNĐ</td>
                            @if($value->status == 0)
                            <td class="tool"><span class="badge badge-pill badge-danger" style="width: 100px">Chờ xác nhận</span></td>
                            @endif
                            @if($value->status == 1)
                            <td class="tool"><span class="badge badge-pill badge-warning" style="width: 100px">Đang xử lý</span></td>
                            @endif
                            @if($value->status == 2)
                            <td class="tool"><span class="badge badge-pill badge-primary" style="width: 100px">Giao hàng</span></td>
                            @endif
                            @if($value->status == 3)
                            <td class="tool"><span class="badge badge-pill badge-success" style="width: 100px">Đã hoàn tất</span></td>
                            @endif
                            @if($value->status == 4)
                            <td class="tool"><span class="badge badge-pill badge-dark" style="width: 100px">Đã hủy</span></td>
                            @endif
                            <td class="tool">{{ date_format($value->created_at, 'd-m-yy')}}</td>
                            <td class="tool">
                                <a href="{{ route('orders-out-detail',['id' => $value->id]) }}" class="btn btn-success waves-effect waves-light ">
                                    <i class="fas fa-info"></i>
                                    Quản lý
                                </a>
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

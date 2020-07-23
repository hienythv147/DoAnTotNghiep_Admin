@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')

@if(isset($hienThi))
@if($hienThi == 1)
<h1 style="margin-top: 50px; text-align: center;">Danh sách sản phẩm</h1>
@else
<h1 style="margin-top: 50px; text-align: center;">Danh sách sản phẩm đã xóa</h1>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
               @if($hienThi == 1)
                <a href="{{ route('products-add') }}" style="margin-bottom: 10px;color:black"
                    class="btn btn-info waves-effect waves-light">
                    <i class="mdi mdi-plus mr-1" style="padding-right:10px"></i>Thêm mới
                </a>
                <a href="#" style="margin-bottom: 10px;color:black;"
                    class="btn btn-warning waves-effect waves-light">
                    <i class="far fa-trash-alt" style="padding-right:10px"></i>Danh sách sản phẩm đã xóa</a>
                @endif
				<table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%;">ID</th>
                            <th style="color:white">Tên sản phẩm</th>
                            <th style="color:white">Loại sản phẩm</th>
                            <th style="color:white">Giá</th>
                            <th style="color:white">Ảnh minh họa</th>
                            <th style="color:white">Trang thái</th>
                            <th class="h-tool" style="color: white;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if($hienThi == 1) --}}
                        @foreach($products as $value) 
                        <tr style="font-size: 120%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->Categories->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td><img style="height:40px;width:40px;" src="{{asset('assets/images/products_image/'.$value->image)}}" alt="err"></td>
                            @if($value->in_stock == 1)
                            <td>Còn hàng</td>
                            @else
                            <td>Hết hàng</td>
                            @endif
                            <td class="tool">
                                <a href="#"
                                    class="btn btn-success waves-effect waves-light "><i class="mdi mdi-pencil color  "></i>Sửa</a>
                                <a data-href="#"
                                    class="btn btn-danger waves-effect waves-light" style="color:white"><i
                                        class="mdi mdi-trash-can-outline color "></i>Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


			</div>
		</div>
	</div>
</div>
@endif
@endsection
@include('layouts.js')
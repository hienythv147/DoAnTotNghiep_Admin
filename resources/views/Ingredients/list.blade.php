@extends('master-page')

<!-- CSS  -->
@include('Body.css')
{{-- Nội dung trang --}}
@section('page-content')

@if(isset($hienThi))
@if($hienThi == 1)
<h1 style="margin-top: 50px; text-align: center;">Danh sách nguyên liệu</h1>
@else
<h1 style="margin-top: 50px; text-align: center;">Danh sách nguyên liệu đã xóa</h1>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
               @if($hienThi == 1)
                <a href="#" style="margin-bottom: 10px;color:black"
                    class="btn btn-info waves-effect waves-light">
                    <i class="mdi mdi-plus mr-1" style="padding-right:10px"></i>Thêm mới
                </a>
                <a href="#" style="margin-bottom: 10px;color:black;"
                    class="btn btn-warning waves-effect waves-light">
                    <i class="far fa-trash-alt" style="padding-right:10px"></i>Danh sách nguyên liệu đã xóa</a>
                @endif
				<table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%;">ID</th>
                            <th style="color:white">Tên Nguyên Liệu</th>
                            <th style="color:white">Đơn vị</th>
                            <th style="color:white">Số lượng còn lại</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if($hienThi == 1) --}}
                        @foreach($ingredients as $value) 
                        <tr style="font-size: 120%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->ingredient_unit }}</td>
                            <td>{{ $value->amount_stock }}</td>
                            <td class="tool">
                                <a href="#"
                                    class="btn btn-success waves-effect waves-light "><i class="mdi mdi-pencil color  "
                                        style="padding-right:5px"></i>Sửa</a>
                                <a data-href="#"
                                    class="btn btn-danger waves-effect waves-light xoa_linh_vuc" style="color:white"><i
                                        class="mdi mdi-trash-can-outline color " style="padding-right:5px"></i>Xóa</a>
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
@include('Body.js')
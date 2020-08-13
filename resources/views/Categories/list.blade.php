@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')

@if(isset($hienThi))
@if($hienThi == 1)
<h1 style="margin-top: 50px; text-align: center;">Danh sách loại sản phẩm</h1>
@else
<h1 style="margin-top: 50px; text-align: center;">Danh sách loại sản phẩm đã xóa</h1>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
               @if($hienThi == 1)
                <a href="{{ route('categories-add') }}" style="margin-bottom: 10px;color:black"
                    class="btn btn-info waves-effect waves-light">
                    <i class="mdi mdi-plus mr-1" style="padding-right:10px"></i>Thêm mới
                </a>
                <a href="{{ route('categories-trash') }}" style="margin-bottom: 10px;color:black;"
                    class="btn btn-warning waves-effect waves-light">
                    <i class="far fa-trash-alt" style="padding-right:10px"></i>Danh sách loại sản phẩm đã xóa</a>
                @endif
				<table id="basic-datatable" class="table table-striped table-bordered table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 7%;">ID</th>
                            <th style="color:white;width:50%;">Tên loại sản phẩm</th>
                            <th style="color:white; width:15%;">Ảnh minh họa</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($hienThi == 1)  
                        @foreach($categories as $value) 
                        <tr style="font-size: 90%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td style="text-align: center;">
                                <img style="height:40px;width:40px;" src="{{asset('assets/images/categories_image/'.$value->image)}}" alt=""></td>
                            <td class="tool">
                                <a href="{{ route('categories-edit',['id' => $value->id]) }}"
                                    class="btn btn-success waves-effect waves-light "><i class="mdi mdi-pencil color  "
                                        style="padding-right:5px"></i>Sửa</a>
                                <a href="{{ route('categories-del',['id' => $value->id]) }}"
                                    class="btn btn-danger waves-effect waves-light delete-confirm" style="color:white"><i class="mdi mdi-trash-can-outline color "></i>Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @foreach($categories as $value) 
                        <tr style="font-size: 90%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td style="text-align: center;">
                                <img style="height:40px;width:40px;" src="{{asset('assets/images/categories_image/'.$value->image)}}" alt=""></td>
                            <td class="tool">
                               <a href="{{ route('categories-res',['id' => $value->id])}}"
                                    class="btn btn-success waves-effect waves-light "><i class=" la la-history"></i>
                                    Khôi phục</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                @if($hienThi == 2)
                <a href="{{route('categories-list')}}" class="btn btn-info waves-effect waves-light"><i
                        class="mdi mdi-keyboard-return" style="padding-right:10px"></i>Quay lại</a>
                @endif

			</div>
		</div>
	</div>
</div>
@endif
@endsection
@include('layouts.js')
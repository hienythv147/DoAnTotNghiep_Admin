@extends('master-page')

<!-- CSS  -->
@include('layouts.css')
{{-- Nội dung trang --}}
@section('page-content')
@if(isset($hienThi))
@if($hienThi == 1)
<h1 style="margin-top: 50px; text-align: center;">Danh sách loại nhân viên</h1>
@else
<h1 style="margin-top: 50px; text-align: center;">Danh sách loại nhân viên đã xóa</h1>
@endif
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                
               @if($hienThi == 1)
                <a href="{{ route('roles-add') }}" style="margin-bottom: 10px;color:black"
                    class="btn btn-info waves-effect waves-light">
                    <i class="mdi mdi-plus mr-1" style="padding-right:10px"></i>Thêm mới
                </a>
                <a href="{{ route('roles-trash') }}" style="margin-bottom: 10px;color:black;"
                    class="btn btn-warning waves-effect waves-light">
                    <i class="far fa-trash-alt" style="padding-right:10px"></i>Danh sách loại nhân viên đã xóa</a>
                @endif
				<table id="basic-datatable" class="table table-striped table-bordered  table-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 6%;">ID</th>
                            <th style="color:white; width: 69%;">Tên loại nhân viên</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($hienThi == 1)
                        @foreach($roles as $value) 
                        <tr style="font-size: 90%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td class="tool">
                                
                                @if($value->id != 1)
                                <a href="{{ route('roles-edit',['id' => $value->id]) }}"
                                    class="btn btn-success waves-effect waves-light "><i class="mdi mdi-pencil color  "
                                        style="padding-right:5px"></i>Sửa</a>
                                <a href="{{ route('roles-del',['id' => $value->id]) }}"
                                    class="btn btn-danger waves-effect waves-light delete-confirm" style="color:white"><i
                                            class="mdi mdi-trash-can-outline color "></i>Xóa</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @foreach($roles as $value) 
                        <tr style="font-size: 90%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td class="tool">
                                 <a href="{{ route('roles-res',['id' => $value->id])}}"
                                    class="btn btn-success waves-effect waves-light "><i class=" la la-history"></i>
                                    Phục hồi</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                
                @if($hienThi == 2)
                <a href="{{route('roles-list')}}" class="btn btn-info waves-effect waves-light"><i
                        class="mdi mdi-keyboard-return" style="padding-right:10px"></i>Quay lại</a>
                @endif

			</div>
		</div>
	</div>
</div>
@endif
@endsection
@include('layouts.js')
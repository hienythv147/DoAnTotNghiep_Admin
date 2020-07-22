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
				<table id="basic-datatable" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th style="color:white; width: 5%;">ID</th>
                            <th style="color:white">Tên loại nhân viên</th>
                            <th class="h-tool" style="color: white;">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($hienThi == 1)
                        @foreach($roles as $value) 
                        <tr style="font-size: 120%; font-weight: bold;">
                            <td class="tool">{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td class="tool">
                                
                                @if($value->id != 1)
                                <a href="{{ route('roles-edit',['id' => $value->id]) }}"
                                    class="btn btn-success waves-effect waves-light "><i class="mdi mdi-pencil color  "
                                        style="padding-right:5px"></i>Sửa</a>
                                    {{-- {{ route('roles-del',['id' => $value->id]) }} --}}
                                <button style="color:white;padding-right:5px" type="button"
                                    class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#exampleModal"><i class="mdi mdi-trash-can-outline color "></i>Tạm khóa </button>
                                    
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @foreach($roles as $value) 
                        <tr style="font-size: 120%; font-weight: bold;">
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: 'Poppins', sans-serif;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Bạn có chắc muốn xóa?</strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Dữ liệu sẽ được xóa tạm thời!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn hvr-hover" data-dismiss="modal"
                            style="color: #ffffff; font-size: 14px; font-weight: 600; background: grey">Hủy bỏ</button>
                            <a href="{{ route('roles-del',['id' => $value->id]) }}" type="button" class="btn hvr-hover"
                            style="color: #ffffff; font-size: 14px; font-weight: 600">Đồng ý</a>
                        </div>
                        </div>
                    </div>
                </div>
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

@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm loại sản phẩm </h1>
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('categories-add-process') }}" method="POST" >
                 @csrf
                    
                    {{-- Tên loại sản phẩm --}}
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Loại sản phẩm</span>
                        </div>
                        <input value="{{old('name') }}" name="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập loại sản phẩm">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('name')}}</p>
                        </small>
                    @endif
                    
                    {{-- Loại sản phẩm --}}
                    <div class="input-group" style="margin-top:25px">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại</label>
                        </div>
                        <select name="category_type" class="custom-select" id="inputGroupSelect01">
                            {{-- <option selected>Choose...</option> --}}
                            <option value="1">Thức uống</option>
                            <option value="2">Đồ ăn</option>
                        </select>
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('category_type'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('category_type')}}</p>
                        </small>
                    @endif
                    <div style="margin-top: 25px" class="input-group">
                        <label class="input-group-text" for="category_image">Chọn ảnh minh họa</label>
                        <input hidden accept="image/*" type="file" id="category_image" name="category_image" onchange="loadFile(event)">
                        
                    </div>
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('category_image'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('category_image')}}</p>
                        </small>
                    @endif
                    <div style="margin-top: 25px" class="input-group">
                    <img style="width:250px; height:250px;" id="output" >
                    </div>
                    <div style="margin-top:25px" class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >Thêm 
                            </button>
                            <a href="{{ route('categories-list') }}" class="btn btn-danger waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
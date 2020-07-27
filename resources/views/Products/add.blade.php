
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm sản phẩm </h1>
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('products-add-process') }}" method="POST" >
                 @csrf
                    {{-- Tên sản phẩm --}}
                    
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tên sản phẩm</span>
                        </div>
                        <input name="product_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập tên sản phẩm" value="{{ old('product_name') }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('product_name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('product_name')}}</p>
                        </small>
                    @endif
                    {{-- Thông báo lỗi --}}
                    @if(session('error_name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ session('error_name') }}</p>
                        </small>
                    @endif
                    {{-- Loại sản phẩm --}}
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại sản phẩm</label>
                        </div>
                        <select name="category_id" class="custom-select" id="inputGroupSelect01">
                            {{-- <option selected>Choose...</option> --}}

                            @foreach($categories as $value)
                            <option value="{{ $value->id }}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="product_price">Giá tiền</label>
                        </div>
                        <input id="product_price" name="product_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" 
                        value="{{ old('product_price') }}">
                        <div class="input-group-prepend">
                            <span class="input-group-text">VNĐ</span>
                        </div>
                    </div>
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('product_price'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('product_price')}}</p>
                        </small>
                    @endif
                    
                    <div style="margin-top: 25px" class="input-group">
                        <label class="input-group-text" for="product_image">Chọn ảnh minh họa</label>
                        <input hidden accept="image/*" type="file" id="product_image" name="product_image" onchange="loadFile(event)">
                        
                    </div>
                    <div style="margin-top: 25px" class="input-group">
                    <img style="width:250px; height:250px;" id="output" >
                    </div>
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('product_image'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('product_image')}}</p>
                        </small>
                    @endif
                    {{-- Thông báo lỗi --}}
                    @if(session('error_image'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ session('error_image') }}</p>
                        </small>
                    @endif
                    <div style="margin-top: 25px" class="form-group justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >Thêm 
                            </button>
                            <a href="{{ route('products-list') }}" class="btn btn-danger  waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
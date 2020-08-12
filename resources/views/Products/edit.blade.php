
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Sửa sản phẩm </h1>
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('products-edit-process',['id' => $product->id]) }}" method="POST" >
                 @csrf
                    {{-- Tên sản phẩm --}}
                    
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tên sản phẩm</span>
                        </div>
                        <input name="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('name')}}</p>
                        </small>
                    @endif
                    {{-- Loại sản phẩm --}}
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại sản phẩm</label>
                        </div>
                        <select name="category_id" class="custom-select" id="inputGroupSelect01">
                            {{-- Loại sp của sp --}}
                            <option value="{{ $product->category_id }}" selected> {{$product->Categories->name}}</option>
                            @foreach($categories as $value)
                                @if(!($value->id == $product->category_id))
                                <option value="{{ $value->id }}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Trạng thái</label>
                        </div>
                        <select name="in_stock" class="custom-select" id="inputGroupSelect01">
                            {{-- Loại sp của sp --}}
                            <option value="{{ $product->in_stock }}" selected>
                            @if($product->in_stock == 0)
                                Hết hàng
                            @else 
                                Còn hàng
                            @endif
                            </option>
                            @if($product->in_stock == 1))
                                <option value="0">Hết hàng</option>
                            @elseif($product->in_stock == 0)
                                <option value="1">Còn hàng</option>
                            @endif
                        </select>
                    </div>
                    <div style="margin-top: 25px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="product_price">Đơn giá</label>
                        </div>
                        <input id="product_price" name="product_price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" 
                        value="{{ $product->price }}">
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
                    <div style="margin-top: 25px" class="input-group">

                    <img style="width:250px; height:250px;" id="output" src={{ asset('assets/images/products_image/'.$product->image)}}>

                    </div>
                    <div style="margin-top: 25px" class="form-group justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >Sửa 
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
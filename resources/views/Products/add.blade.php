
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm sản phẩm </h1>
                <form class="form-horizontal" action="{{ route('products-add-process') }}" method="POST" >
                 @csrf
                    {{-- @if($errors->any()) --}}
                        {{-- <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert"> --}}
                                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul> --}}
                            {{-- </div> --}}
                    {{-- @endif --}}
                    
                    {{-- Tên sản phẩm --}}
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tên sản phẩm</span>
                        </div>
                        <input name="product_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập tên sản phẩm" value="{{ old('product_name') }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('product_name'))
                    <small class="form-text text-muted mb-3">
                        <p style="color: red;">{{ $errors->first('product_name')}}</p>
                        </small>
                    @endif
                    {{-- Loại sản phẩm --}}
                    <div class="input-group mb-3">
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
                    <div class="input-group">
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
                    <small class="form-text text-muted mb-3" >
                        <p style="color: red;">{{ $errors->first('product_price')}}</p>
                        </small>
                    @endif
                    
                    <div class="form-group">
                        <label for="product_image">Hình đại diện</label><br />
                        <input type="file" id="product_image" name="product_image">
                    </div>
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('product_image'))
                    <small class="form-text text-muted mb-3" >
                        <p style="color: red;">{{ $errors->first('product_image')}}</p>
                        </small>
                    @endif
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" >Thêm 
                            </button>
                            <a href="{{ route('products-list') }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
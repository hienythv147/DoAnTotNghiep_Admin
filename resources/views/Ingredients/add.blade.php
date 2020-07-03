
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm nguyên liệu </h1>
                <form class="form-horizontal" action="{{ route('ingredients-add-process') }}" method="POST" >
                 @csrf
                    <div class="input-group" style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tên nguyên liệu</span>
                        </div>
                        <input name="ingredient_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập tên nguyên liệu" value="{{ old('ingredient_name') }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('ingredient_name'))
                    <small class="form-text text-muted" style="margin-top: 25px">
                        <p style="color: red;">{{ $errors->first('ingredient_name')}}</p>
                        </small>
                    @endif
                    {{-- Loại nguyên liệu --}}
                    <div class="input-group" style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Đơn vị</label>
                        </div>
                        <select name="ingredient_unit" class="custom-select" id="inputGroupSelect01">
                            <option value="g" selected>Gam</option>
                            <option value="Gói">Gói</option>
                            <option value="Chai">Chai</option>
                            <option value="ml">Ml</option>
                        </select>
                    </div>
                    <div class="input-group" style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Số lượng</span>
                        </div>
                        <input name="amount_stock" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số lượng" value="{{ old('amount_stock') }}">
                    </div>
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('amount_stock'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('amount_stock')}}</p>
                        </small>
                    @endif
                    
                    <div class="form-group justify-content-end row" style="margin-top: 25px">
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
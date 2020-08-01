
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm nguyên liệu </h1>
                <form class="form-horizontal" action="{{ route('ingredients-add-process') }}" method="POST" >
                 @csrf
                    {{-- Tên nguyên liệu --}}
                    <div style="margin-top: 25px" class="input-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Tên nguyên liệu</span>
                        </div>
                        <input name="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập tên nguyên liệu" value="{{ old('name') }}">
                    </div>
                    {{-- End --}}
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('name')}}</p>
                        </small>
                    @endif
                    {{-- Đơn vị tính --}}
                    <div style="margin-top: 25px" class="input-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Đơn vị tính</span>
                        </div>
                        <input name="ingredient_unit" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập đơn vị" value="{{ old('ingredient_unit') }}">
                    </div>
                    {{-- End --}}
                    {{-- Thông báo lỗi --}}
                     @if($errors->has('ingredient_unit'))
                     <small class="form-text text-muted">
                         <p style="color: red;">{{ $errors->first('ingredient_unit')}}</p>
                         </small>
                     @endif
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
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >Thêm 
                            </button>
                            <a href="{{ route('ingredients-list') }}" class="btn btn-danger waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
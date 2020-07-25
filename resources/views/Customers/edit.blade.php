
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm khách hàng thân thiết </h1>
                <form class="form-horizontal" action="{{ route('customers-edit-process',['id' => $customer->id]) }}" method="POST" >
                 @csrf
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Họ</span>
                        </div>
                        <input id="last_name" class="form-control" name="last_name" 
                        type="text" placeholder="Nhập họ" value="{{ $customer->last_name }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('last_name') )
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('last_name') }}</p>
                        </small>
                    @endif
                    <div class="input-group " style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Tên</span>
                        </div>
                        <input id="first_name" class="form-control" name="first_name" 
                        type="text" placeholder="Nhập tên" value="{{ $customer->first_name }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('first_name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('first_name') }}</p>
                        </small>
                    @endif
                    {{-- Nhập số điện thoại --}}
                    <div class="input-group "style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Số điện thoại</span>
                        </div>
                        <input id="phone_number" class="form-control" name="phone_number" 
                        type="text" placeholder="Nhập số điện thoại" value="{{ $customer->phone_number }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('phone_number'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('phone_number')}}</p>
                        </small>
                    @endif
                    @if(session('error'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ session('error')}}</p>
                        </small>
                    @endif
                    <div class="form-group mb-0 justify-content-end row" style="margin-top: 25px">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >Sửa 
                            </button>
                            <a href="{{ route('customers-list') }}" class="btn btn-danger waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
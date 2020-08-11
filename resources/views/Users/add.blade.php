
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm nhân viên </h1>
                <form class="form-horizontal" action="{{ route('users-add-process') }}" method="POST" >
                 @csrf
                    {{-- Chọn loại nhân viên --}}
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại nhân viên</label>
                        </div>
                        <select name="role_id" class="custom-select" id="inputGroupSelect01">
                            {{-- <option selected>Choose...</option> --}}

                            @foreach($roles as $value)
                            @if($value->id != 1)
                            <option value="{{ $value->id }}">{{$value->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    {{-- end --}}
                    {{-- Họ và tên --}}
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Họ và tên</span>
                        </div>
                        <input value="{{ old('last_name') }}" id="last_name" 
                        class="form-control" name="last_name" type="text" placeholder="Họ">
                        <input value="{{ old('first_name') }}"   id="first_name" class="form-control" name="first_name" type="text" placeholder="Tên">
                    </div>
                    {{-- end --}}
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('last_name'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('last_name')}}</p>
                    </small>
                    @elseif($errors->has('first_name'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('first_name')}}</p>
                    </small>
                    @elseif($errors->has('last_name') && $errors->has('first_name'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">Họ và tên không hợp lệ!</p>
                    </small>
                    @endif
                    {{-- end --}}
                    {{-- Email --}}
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        </div>
                        <input value="{{ old('email') }}" name="email" type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập email">
                    </div>
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('email'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('email')}}</p>
                    </small>
                    @endif
                    {{-- end --}}
                    {{-- Mật khẩu --}}
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Mật khẩu</span>
                        </div>
                        <input name="password" type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập mật khẩu">
                    </div>
                    {{-- end --}}
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('password'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('password')}}</p>
                    </small>
                    @endif
                    {{-- end --}}
                    {{-- Số điện thoại --}}
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                        </div>
                        <input value="{{ old('phone_number') }}" name="phone_number" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số điện thoại">
                    </div>
                    {{-- end --}}
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('phone_number'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('phone_number')}}</p>
                    </small>
                    @endif
                    {{-- end --}}
                    {{-- Địa chỉ --}}
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ</span>
                        </div>
                        <input value="{{ old('address') }}"  name="address" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập địa chỉ">
                    </div>
                    {{-- end --}}
                    {{-- Thông báo lỗi  --}}
                    @if($errors->has('address'))
                    <small class="form-text text-muted" >
                        <p style="color: red;">{{ $errors->first('address')}}</p>
                    </small>
                    @endif
                    {{-- end --}}
                    <div style="margin-top:25px" class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm </button>
                            <a href="{{ route('users-list') }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
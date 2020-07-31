@extends('layout_user')

@section('body')
<div class="container ">
            
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card-body "style="background: #f4f4f4; margin-top:20px" >
                    <h1 style=" text-align: center"> ĐĂNG KÝ </h1>
                    <form class="form-horizontal" action="{{ route('register') }}" method="POST">              
                        @csrf    
                        {{-- Nhập họ và tên --}}
                        <div style="margin-top:15px" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Họ và tên</span>
                            </div>
                            <input value="{{ old('first_name') }}" id="last_name" class="form-control" name="first_name" type="text" placeholder="Họ" required autofocus>
                            <input value="{{ old('last_name') }}" id="first_name" class="form-control" name="last_name" type="text" placeholder="Tên" required>
                        </div>
                        {{-- Thông báo lỗi --}}
                        @if($errors->has('last_name'))
                        <small class="form-text margin-top:5px" >
                            <p style="color: red;">{{ $errors->first('last_name')}}</p>
                        </small>
                        @elseif($errors->has('first_name'))
                        <small class="form-text margin-top:5px" >
                            <p style="color: red;">{{ $errors->first('first_name')}}</p>
                        </small>
                        @elseif($errors->has('last_name') && $errors->has('first_name'))
                        <small class="form-text margin-top:5px" >
                            <p style="color: red;">Họ và tên không hợp lệ!</p>
                        </small>
                        @endif
                        {{-- Email --}}
                        <div style="margin-top:15px" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                            </div>
                            <input value="{{ old('email') }}" name="email" type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập email" required>
                        </div>
                         {{-- Thông báo lỗi  --}}
                        @if($errors->has('email'))
                        <small class="form-text margin-top:5px" >
                            <p style="color: red;">{{ $errors->first('email')}}</p>
                        </small>
                        @endif
                        <div style="margin-top:15px" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Mật khẩu</span>
                            </div>
                            <input name="password" type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập mật khẩu" required>
                        </div>
                        {{-- Thông báo lỗi  --}}
                        @if($errors->has('password'))
                        <small class="form-text margin-top:5px" >
                            <p style="color: red;">{{ $errors->first('password')}}</p>
                        </small>
                        @endif
                        <div style="margin-top:15px" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Nhập lại mật khẩu</span>
                            </div>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        {{-- Số điện thoại --}}
                        <div style="margin-top:15px" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                            </div>
                            <input value="{{ old('phone_number') }}" name="phone_number" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số điện thoại" required>
                        </div>
                        {{-- Thông báo lỗi  --}}
                        @if($errors->has('phone_number'))
                        <small class="form-text margin-top:5px" >
                            <p style="color: red;">{{ $errors->first('phone_number')}}</p>
                        </small>
                        @endif
                        {{-- Địa chỉ --}}
                        <div style="margin-top:15px" class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ</span>
                            </div>
                            <input value="{{ old('address') }}" name="address" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập địa chỉ" required>
                        </div>
                         {{-- Thông báo lỗi  --}}
                         @if($errors->has('address'))
                         <small class="form-text margin-top:5px" >
                             <p style="color: red;">{{ $errors->first('address')}}</p>
                         </small>
                         @endif
                        <div style="margin-top:15px"  class="form-group mb-0 text-center">
                            <button class="btn btn-danger" type="submit" style="font-weight: 700;"> Đăng ký </button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            <div class="row mt-3">
                <div class="col-12 text-center">
                    @if (Route::has('password.request'))
                        <a class="text-muted ml-1" href="{{ route('password.request') }}">
                            <b>Quên mật khẩu?</b>
                        </a>
                    @endif
                    <p class="text-muted">Tôi đã có tài khoản! <a href="{{ route('login') }}" class="text-muted ml-1"><b class="font-weight-semibold">{{ __('Đăng nhập') }}</b></a></p>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    
            </div>
@endsection

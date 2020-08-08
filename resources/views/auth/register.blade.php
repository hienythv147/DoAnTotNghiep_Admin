@extends('layout_user')

@section('body')
<div class="container ">
            
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card-body p-4" style="background: #f4f4f4; margin-top:20px">

                <div class="card-body ">
                    <h1 style=" text-align: center"> ĐĂNG KÝ </h1>
                    <form class="form-horizontal" action="{{ route('register') }}" method="POST">              
                        @csrf    
                        <div class="row">
                             {{-- Email --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label"><b>Email</b></label>
                                    <input id="field-1" value="{{ old('email') }}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập email" >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label"><b>Mật khẩu</b></label>
                                    <input id="field-2" name="password" type="password" class="form-control @error('password') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập mật khẩu" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="control-label"><b>Nhập lại mật khẩu</b></label>
                                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập lại mật khẩu" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-3" class="control-label"><b>Họ</b></label>
                                    <input id="field-3" value="{{ old('first_name') }}" id="last_name" class="form-control @error('last_name') is-invalid @enderror @error('first_name') is-invalid @enderror" name="first_name" type="text" placeholder="Họ"  autofocus>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label"><b>Tên</b></label>
                                    <input id="field-4" value="{{ old('last_name') }}" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="last_name" type="text" placeholder="Tên" >
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-5" class="control-label"><b>Số điện thoại</b></label>
                                    <input id="field-5" value="{{ old('phone_number') }}" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số điện thoại" >
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-6" class="control-label"><b>Địa chỉ</b></label>
                                    <input id="field-6" value="{{ old('address') }}" name="address" type="text" class="form-control @error('address') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập địa chỉ" >
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 10px" class="form-group mb-0 text-center">
                            <button class="btn btn-danger btn-block" type="submit" style="font-weight: 700;"> Đăng ký </button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div>
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

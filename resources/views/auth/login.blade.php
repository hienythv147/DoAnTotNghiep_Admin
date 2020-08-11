@extends('layout_user')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card-body p-4" style="background: #f4f4f4; margin-top:20px">

                <div class="card-body">
                    <h1 style=" text-align: center"> ĐĂNG NHẬP </h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="emailaddress"><b>Tài Khoản</b></label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}" autocomplete="email" placeholder="Nhập tài khoản" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password"><b>Mật Khẩu</b></label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Nhập mật khẩu" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="checkbox-signin">Lưu mật khẩu</label>
                            </div>
                        </div> --}}

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-danger btn-block" type="submit" style="font-weight: 700;"> Đăng Nhập </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    @if (Route::has('password.request'))
                        <a class="text-muted ml-1" href="{{ route('password.request') }}">
                            <b>Quên mật khẩu?</b>
                        </a>
                    @endif
                    @if (Route::has('register'))
                    <p class="text-muted">Bạn chưa có tài khoản? <a href="{{ route('register') }}" class="text-muted ml-1"><b class="font-weight-semibold">{{ __('Đăng ký') }}</b></a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

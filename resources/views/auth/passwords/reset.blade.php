@extends('layout_user')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card-body p-4" style="background: #f4f4f4; margin-top:20px">

                <div class="card-body">
                    <h1 style=" text-align: center">ĐỔI MẬT KHẨU </h1>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email"><b>Tài Khoản</b></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Mật khẩu</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="emailaddress">Nhập lại mật khẩu</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div style="margin-top: 10px" class="form-group mb-0 text-center">
                            <button class="btn btn-danger btn-block" type="submit" style="font-weight: 700;"> Đổi mật khẩu </button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

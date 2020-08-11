@extends('layout_user')

@section('body')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card-body p-4" style="background: #f4f4f4; margin-top:20px">
                        <div class="card-body ">
                        @if($flash = session('status'))
                        <div style="margin-top: 30px;" id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
                            {{$flash }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <h1 style=" text-align: center"> QUÊN MẬT KHẨU </h1>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="emailaddress">Email</label>
                                <input value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" type="email" id="email" required="" placeholder="Nhập địa chỉ email" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div style="margin-top: 10px" class="form-group mb-0 text-center">
                                <button class="btn btn-danger btn-block" type="submit" style="font-weight: 700;"> Lấy lại mật khẩu </button>
                            </div>

                        </form>    
                        </div>
                    </div> <!-- end card-body -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Tôi đã có tài khoản! <a href="{{ route('login') }}" class="text-muted ml-1"><b class="font-weight-semibold">{{ __('Đăng nhập') }}</b></a></p>
                        </div>
                    </div>
                <!-- end row -->    

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
@endsection

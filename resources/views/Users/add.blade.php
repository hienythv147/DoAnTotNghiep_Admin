
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm nhân viên </h1>
                <form class="form-horizontal" action="{{ route('users-add-process') }}" method="POST" >
                 @csrf
                    @if($errors->any())
                        {{-- <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert"> --}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            {{-- </div> --}}
                    @endif

                    <div class="input-group mb-3">
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
                    {{-- Họ và tên --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Họ và tên</span>
                        </div>
                        <input id="last_name" class="form-control" name="first_name" type="text" placeholder="Họ">
                        <input id="first_name" class="form-control" name="last_name" type="text" placeholder="Tên">
                    </div>
                    {{-- Email --}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        </div>
                        <input name="email" type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập email">
                    </div>
                    <small id="emailHelp" class="form-text text-muted mb-3">We'll never share your email with anyone else.</small>
                    {{-- Mật khẩu --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Mật khẩu</span>
                        </div>
                        <input name="password" type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập mật khẩu">
                    </div>
                    {{-- Số điện thoại --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                        </div>
                        <input name="phone_number" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số điện thoại">
                    </div>
                    {{-- Địa chỉ --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ</span>
                        </div>
                        <input name="address" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập địa chỉ">
                    </div>

                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" >Thêm 
                            </button>
                            <a href="{{ route('users-list') }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
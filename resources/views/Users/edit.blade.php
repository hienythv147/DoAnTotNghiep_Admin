
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Sửa thông tin </h1>
                <form class="form-horizontal" action="{{ route('users-edit-process',['id' => $user->id]) }}" method="POST" >
                 @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại nhân viên</label>
                        </div>
                        <select name="role_id" class="custom-select" id="inputGroupSelect01">

                            <option value="{{ $user->role_id }}" selected>{{$user->Roles->name }}</option>
                            @foreach($roles as $value)
                            @if($value->id != 1 && !($user->role_id == $value->id))
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
                        <input class="form-control" type="text" placeholder="Họ" value="{{$user->last_name ." ". $user->first_name}}" disabled="true">
                    </div>
                    {{-- Email --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        </div>
                        <input  type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập email"value="{{$user->email}}" disabled="true">
                    </div>
                    {{-- Mật khẩu
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Mật khẩu</span>
                        </div>
                        <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập mật khẩu" value="{{$user->password}}" disabled="true">
                    </div> --}}
                    {{-- Số điện thoại --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số điện thoại" value="{{$user->phone_number}}" disabled="true">
                    </div>
                    {{-- Địa chỉ --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập địa chỉ" value="{{$user->address}}" disabled="true">
                    </div>

                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >Sửa
                            </button>
                            <a href="{{ route('users-list') }}" class="btn btn-danger waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
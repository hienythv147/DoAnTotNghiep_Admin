
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Đổi Mới Vai Trò </h1>
                <form class="form-horizontal" action="{{ route('roles-edit-process',['id' => $role->id]) }}" method="POST" >
                 @csrf
                    {{-- @if($errors->any())
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif --}}
                    <div class="input-group" style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Vai trò</span>
                        </div>
                        <input name="roles_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập tên nguyên liệu" value="{{ $role->name }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('roles_name'))
                    <small class="form-text text-muted" style="margin-top: 25px">
                        <p style="color: red;">{{ $errors->first('roles_name')}}</p>
                        </small>
                    @endif

                    <div class="form-group justify-content-end row" style="margin-top: 25px">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" value="add">Sửa </button>
                            <a href="{{ route('roles-list') }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
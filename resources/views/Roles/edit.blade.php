
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Sửa loại nhân viên </h1>
                <form class="form-horizontal" action="{{ route('roles-edit-process',['id' => $role->id]) }}" method="POST" >
                 @csrf
                    <div class="input-group" style="margin-top: 25px">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Loại nhân viên</span>
                        </div>
                        <input name="role_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập loại nhân viên" value="{{ $role->name }}">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('role_name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('role_name')}}</p>
                        </small>
                    @endif
                    {{-- Thông báo lỗi --}}
                    @if(session('error'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ session('error') }}</p>
                        </small>
                    @endif

                    <div class="form-group justify-content-end row" style="margin-top: 25px">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" value="add">Sửa </button>
                            <a href="{{ route('roles-list') }}" class="btn btn-danger waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
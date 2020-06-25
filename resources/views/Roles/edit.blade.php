
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Đổi Mới Vai Trò </h1>
                <form class="form-horizontal" action="{{ route('roles-edit-process',['id' => $roles->id]) }}" method="POST" >
                 @csrf
                    @if($errors->any())
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
                    @endif
                    <div class="form-group row mb-3">
                        <div class="col-12">
                            <input type="text" class="form-control" name="roles_name" value="{{ $roles->name }}" placeholder="Nhập vai trò mới">
                        </div>
                    </div>

                    <div class="form-group mb-0 justify-content-end row">
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
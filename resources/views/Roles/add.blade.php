
@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm loại người dùng </h1>
                <form class="form-horizontal" action="{{ route('roles-add-process') }}" method="POST" >
                 @csrf
                    <div style="margin-top:25px" class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Loại người dùng</span>
                        </div>
                        <input value="{{ old('name') }}" name="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập loại người dùng">
                    </div>
                    {{-- Thông báo lỗi --}}
                    @if($errors->has('name'))
                    <small class="form-text text-muted">
                        <p style="color: red;">{{ $errors->first('name')}}</p>
                        </small>
                    @endif

                    <div style="margin-top:25px" class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm </button>
                            <a href="{{ route('roles-list') }}" class="btn btn-danger waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection

@extends('master-page')

@section('page-content')

<div class="row">
    <div style="margin-top: 50px;" class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h1 style=" text-align: center"> Thêm loại sản phẩm </h1>
                <form class="form-horizontal" action="{{ route('categories-add-process') }}" method="POST" >
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
                            <span class="input-group-text" id="inputGroup-sizing-default">Loại sản phẩm</span>
                        </div>
                        <input name="category_name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập loại sản phẩm">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Loại</label>
                        </div>
                        <select name="category_type" class="custom-select" id="inputGroupSelect01">
                            {{-- <option selected>Choose...</option> --}}
                            <option value="1">Thức uống</option>
                            <option value="2">Đồ ăn</option>
                        </select>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light" >Thêm 
                            </button>
                            <a href="{{ route('categories-list') }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hủy</a>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>

@endsection
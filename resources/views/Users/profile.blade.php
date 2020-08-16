@extends('layout_user')

@section('body')
<div class="wrapper">
    <div class="container">
        <div class="row" style="font-family: 'Poppins', sans-serif;">
            <div class="col-lg-4 col-xl-4" style="background: #f4f4f4; margin-top:50px;" >
                <div class="card-box text-center" >
                    {{-- <img src="assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image"> --}}

                    <h1 class="mb-0">Thông tin tài khoản</h1>
                    <div class="text-left mt-3" >
                    <p class="text-muted mb-2"><strong>Họ và tên:</strong> <span class="ml-2">{{ Auth::user()->last_name .' ' . Auth::user()->first_name }}</span></p>

                    <p class="text-muted mb-2 "><strong>Email:</strong> <span class="ml-2 ">{{  Auth::user()->email  }}</span></p>
                    <p class="text-muted mb-2 "><strong>Số điện thoại:</strong><span class="ml-2">{{ Auth::user()->phone_number }}</span></p>
                    {{-- <p class="text-muted mb-1 "><strong>Địa chỉ:</strong> <span class="ml-2">{{  Auth::user()->address }}</span></p> --}}
                    </div>
                </div> <!-- end card-box -->

            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8" style="background: #f4f4f4; margin-top:50px">
                <div class="card-box">
                    <h1 style=" text-align: center"> Chỉnh sửa </h1>
                    <form class="form-horizontal" action="{{ route('profile-edit-process',['id' => Auth::user()->id]) }}" method="POST" >
                        @csrf
                        <div class="row">
                            
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-3" class="control-label"><b>Họ</b></label>
                                <input id="field-3" value="{{ Auth::user()->last_name }}" id="last_name" class="form-control @error('last_name') is-invalid @enderror " name="last_name" type="text" placeholder="Họ"  autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label"><b>Tên</b></label>
                                <input id="field-4" value="{{ Auth::user()->first_name }}" id="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" placeholder="Tên" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                               <div class="form-group">
                                   <label for="field-5" class="control-label"><b>Số điện thoại</b></label>
                                   <input id="field-5" value="{{  Auth::user()->phone_number }}" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập số điện thoại" >
                                   @error('phone_number')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                               </div>
                            </div>
                            {{-- <div class="col-md-12">
                               <div class="form-group">
                                   <label for="field-6" class="control-label"><b>Địa chỉ</b></label>
                                   <input id="field-6" value="{{  Auth::user()->address }}" name="address" type="text" class="form-control @error('address') is-invalid @enderror" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nhập địa chỉ" >
                                   @error('address')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror
                               </div>
                            </div> --}}
                            </div>
                            <div style="margin-top: 25px" class="form-group mb-0 text-center">
                                <button type="button" class="ml-auto btn hvr-hover" style="color: #ffffff; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 600"
                                data-toggle="modal" data-target="#exampleModal">Cập nhật</a> 
                                </button>
                            </div>
                        </div>
                        
                        <div id="exampleModal" class="modal fade bs-example-modal-center show" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myCenterModalLabel">Xác nhận chỉnh sửa</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body" style="text-align:center;">
                                            <button type="button" class="btn hvr-hover" data-dismiss="modal"
                                            style="color: #ffffff; font-size: 14px; font-weight: 600; background: grey">Hủy bỏ</button>
                                            <button type="submit" id="button-accept" class="btn hvr-hover"
                                            style="color: #ffffff; font-size: 14px; font-weight: 600">Đồng ý</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                       </form>
                </div> <!-- end card-box-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->
    </div> <!-- end container -->
</div>
@endsection
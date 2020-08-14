
@extends('layout_user')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endsection

@section('body')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Giỏ hàng</h2>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table" id="cart-table">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th style="text-align: center">Số lượng</th>
                                <th>Tổng tiền</th>
                                <th style="text-align: center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($cart))
                            @foreach($cart as $item)
                            <tr style="font-weight: 1000">
                                <td class="thumbnail-img">
                                    <a href="#">
                                @if(!empty($item['image']))
                                <a href="{{ Route('product_detail', $item['id']) }}"><img class="img-fluid" src="{{ asset('assets/images/products_image/'.$item['image']) }}" style="width: 60px; height: 60px" alt=""/></a>
                                @else
                                <img class="img-fluid" style="width: 60px; height: 60px" src="{{ asset('assets/images/not_found.png') }}" alt=""/> 
                                @endif
                            </a>
                                </td>
                                <td class="name-pr">
                                    <a href="{{ Route('product_detail', $item['id']) }}">
                                        {{ $item['name'] }}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{ number_format($item['price'], "0", ".", ".") }} VNĐ</p>
                                </td>
                                <td style="text-align: center">
                                    {{ $item['amount'] }}
                                </td>
                                <td class="total-pr">
                                    <p>{{ number_format($item['price'] * $item['amount'], "0", ".", ".") }} VNĐ</p>
                                </td>
                                <td style="text-align: center">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="deleteRow(this, {{ $item['id'] }})" style="float: none;">
                                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @else 
                            <tr>
                                <td>
                                </td> 
                                <td>
                                </td> 
                                <td>
                                <td class="name-pr" style="font-weight: 1000">
                                    <p>Không có sản phẩm</p>
                                </td>  
                                </td> 
                                <td>
                                </td> 
                                <td>
                                </td>  
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Tổng Tiền Đơn Hàng</h3>
                    <div class="d-flex">
                        <h4>Tổng tiền</h4>
                        <div class="ml-auto font-weight-bold">{{ isset($subTotal) ? number_format($subTotal, "0", ".", ".") : 0 }} VNĐ</div>
                    </div>
                    <!-- <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 40 </div>
                    </div> -->
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Mã giảm giá</h4>
                        <div class="ml-auto font-weight-bold"> {{ number_format("0", "0", ".", ".") }} VNĐ</div>
                    </div>
                    
                    <div class="d-flex">
                        <h4>Phí vận chuyển</h4>
                        @if(isset($cart))
                        <div class="ml-auto font-weight-bold"> {{ number_format("15000", "0", ".", ".") }} VNĐ</div>
                        @else
                        <div class="ml-auto font-weight-bold"> 0 VNĐ</div>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Thành tiền</h5>
                        @if(isset($cart))
                        <div class="ml-auto h5 font-weight-bold"> {{ isset($subTotal) ? number_format($subTotal+15000, "0", ".", ".") : 0 }} VNĐ </div>
                        @else
                        <div class="ml-auto font-weight-bold"> 0 VNĐ</div>
                        @endif
                        
                    </div>
                    <hr> </div>
            </div>
            <div style="width: 100%">
                <button type="button" class="ml-auto btn hvr-hover" style="color: #ffffff; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 600"
                     data-toggle="modal" data-target="#exampleModal">Thanh toán</a> 
                </button>
                <a href="{{ Route('cart') }}">
                    <button type="button" class="ml-auto btn hvr-hover" style="color: #ffffff; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 600; margin-right: 20px">
                        Cập nhật
                    </button>
                </a>
            </div>
        </div>
        <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; font-family: 'Poppins', sans-serif;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background: #b0b435;">
                        <h3 class="modal-title">Xác Nhận Thanh Toán</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="{{ Route('process_payment') }}" method="post" enctype="application/x-www-form-urlencoded">
                        @csrf
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Họ</label>
                                        <input type="text" class="form-control" id="field-1" placeholder="Nhập họ của bạn" disabled name="last_name" value="{{ Auth::user()->last_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Tên</label>
                                        <input type="text" class="form-control" id="field-2" placeholder="Nhập tên của bạn" disabled name="first_name" value="{{ Auth::user()->first_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-4" class="control-label">Email</label>
                                        <input type="text" class="form-control" id="field-4" placeholder="Nhập email" disabled name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-5" class="control-label">Số Điện Thoại</label>
                                        <input type="text" class="form-control" id="field-5" placeholder="Nhập số điện thoại" disabled name="phone_number" value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-3" class="control-label">Địa Chỉ</label>
                                        <input type="text" class="form-control" id="field-3" placeholder="Nhập địa chỉ" disabled name="address" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group no-margin">
                                        <label for="field-7" class="control-label">Thanh Toán Online</label>
                                        <div>
                                            <input type="checkbox" class="control-label" name="momo" id="field-7" style="cursor: pointer;">
                                            <label for="field-7" class="control-label" style="cursor: pointer;"> Ví Momo</label>
                                        </div>
                                        <img src="{{ asset('assets/images/momo.png') }}" style="width: 100px; height:100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background">
                            <button type="button" class="btn hvr-hover" data-dismiss="modal"
                            style="color: #ffffff; font-size: 14px; font-weight: 600; background: grey">Hủy bỏ</button>
                            <button type="submit" id="button-accept" class="btn hvr-hover"
                            style="color: #ffffff; font-size: 14px; font-weight: 600">Đồng ý</a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal -->
    </div>
</div>
<!-- End Cart -->
@endsection
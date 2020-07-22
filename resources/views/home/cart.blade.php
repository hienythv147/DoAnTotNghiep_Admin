@extends('layout_user')

@section('body')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Giỏ hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Giỏ hàng</li>
                </ul>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th style="text-align: center">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($cart))
                            @foreach($cart as $item)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                @if(!empty($item['image']))
                                <img class="img-fluid" src="{{ asset('assets/images/'.$item['image']) }}" alt=""/> 
                                @else
                                <img class="img-fluid" src="{{ asset('assets/images/not_found.png') }}" alt=""/> 
                                @endif
                            </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                {{ $item['name'] }}
                            </a>
                                </td>
                                <td class="price-pr">
                                    <p>$ {{ $item['price'] }}</p>
                                </td>
                                <td class="quantity-box"><input type="number" size="4" value="{{ $item['amount'] }}" min="0" step="1" class="c-input-text qty text"></td>
                                <td class="total-pr">
                                    <p>$ {{ $item['price'] * $item['amount'] }}</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="#">
                                <i class="fas fa-times"></i>
                            </a>
                                </td>
                            </tr>
                            @endforeach
                            @else 
                            <tr>
                                <td class="name-pr">
                                    <p>Không có sản phẩm</p>
                                </td>   
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
                        <input class="form-control" placeholder="Nhập mã giảm giá" aria-label="Coupon code" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-theme" type="button">Chọn mã</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="update-box">
                    <input value="Cập nhật" type="submit">
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
                        <div class="ml-auto font-weight-bold">{{ isset($subTotal) ? $subTotal : 0 }} vnd</div>
                    </div>
                    <!-- <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 40 </div>
                    </div> -->
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Mã giảm giá</h4>
                        <div class="ml-auto font-weight-bold"> 0 vnd</div>
                    </div>
                    <div class="d-flex">
                        <h4>Phí vận chuyển</h4>
                        <div class="ml-auto font-weight-bold"> Miễn phí </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Thành tiền</h5>
                        <div class="ml-auto h5"> {{ isset($subTotal) ? $subTotal : 0 }} vnd </div>
                    </div>
                    <hr> </div>
            </div>
            <div class="col-12 d-flex shopping-box">
                <button type="button" class="ml-auto btn hvr-hover" style="color: #ffffff; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 600"
                     data-toggle="modal" data-target="#exampleModal">Thanh toán</a> 
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-family: 'Poppins', sans-serif;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Xác nhận thanh toán</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có đồng ý thanh toán hóa đơn này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn hvr-hover" data-dismiss="modal"
                    style="color: #ffffff; font-size: 14px; font-weight: 600; background: grey">Hủy bỏ</button>
                    <a href="{{ Route('create_order') }}" type="button" class="btn hvr-hover"
                    style="color: #ffffff; font-size: 14px; font-weight: 600">Đồng ý</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
@endsection
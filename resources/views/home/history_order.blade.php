@extends('layout_user')

@section('body')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Lịch sử mua hàng</h2>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th style='text-align: center'>Mã đơn hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày lập</th>
                                <th>Xem chi tiết</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($orders) && count($orders) > 0)
                            @foreach($orders as $item)
                            <tr style="font-weight: 1000">
                                <td style='text-align: center'>
                                    {{$item->id}}
                                </td>
                                <td>
                                    {{ number_format($item->total, "0", ".", ".")}}
                                </td>
                                @if($item->status == 0)
                                <td><span class="badge badge-pill badge-danger" style="width: 100px">Chờ xác nhận</span></td>
                                @endif
                                @if($item->status == 1)
                                <td><span class="badge badge-pill badge-warning" style="width: 100px">Đang xử lý</span></td>
                                @endif
                                @if($item->status == 2)
                                <td><span class="badge badge-pill badge-primary" style="width: 100px">Giao hàng</span></td>
                                @endif
                                @if($item->status == 3)
                                <td><span class="badge badge-pill badge-success" style="width: 100px">Đã hoàn tất</span></td>
                                @endif
                                <td>
                                    {{date_format($item->created_at,"d-m-Y")}}
                                </td>
                                <td>
                                    <button type="button" class="ml-auto btn hvr-hover" onclick="historyOrderDetail({{$item->id}})"
                                        style="color: #ffffff; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 600"
                                        data-toggle="modal" data-target="#exampleModal">chi tiết</a> 
                                    </button>
                                </td>
                                <td >
                                    
                                </td>
                            </tr>
                            @endforeach
                            @else 
                            <tr>
                                <td>
                                </td> 
                                <td>
                                <td class="name-pr" style="font-weight: 1000">
                                    <p>Không có đơn hàng</p>
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
                    <!-- start paginate products -->
                    {{ $orders->links() }}
                    <!-- end paginate products -->
                    <div id="exampleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalCenter" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myLargeModalLabel">Chi Tiết Hóa Đơn</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style='text-align: center; width:10%'>Stt</th>
                                                <th style='width:50%'>Tên sản phẩm</th>
                                                <th style='width:20%'>Giá tiền</th>
                                                <th style='text-align: center; width:10%'>Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-content">
                                            <!-- Content table -->
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
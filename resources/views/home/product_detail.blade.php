@extends('layout_user')

@section('body')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sản phẩm</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sản phẩm </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> 
                            @if(!empty($productDetail->image))
                            <img src="{{ asset('assets/images/products_image/'. $productDetail->image) }}" class="d-block w-100" alt="Image" style="height: 393px">
                            @else
                            <img src="{{ asset('assets/images/not_found.png') }}" class="d-block w-100" alt="Image" style="height: 393px">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <form action="{{ Route('addCartPD') }}" type="submit"> 
                        @csrf
                        <h2>{{ $productDetail->name }}</h2>
                        <h5>{{ $productDetail->price }} VNĐ</h5>
                        @if($productDetail->in_stock != 1)
                        <p class="available-stock"><span><h4 style="color: red">Hết hàng!!</h4></span><p>
                        @endif
                        <p class="available-stock"><span style="color: red"></span><p>
                        <h4>Short Description:</h4>
                        <p>Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at,
                            tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu. </p>
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Số lượng</label>
                                    <input class="form-control" name="amount" value="1" min="0" max="20" type="number">
                                    <input type="hidden" value="{{ $productDetail->id }}" name="id">
                                </div>
                            </li>
                        </ul>
                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <button class="btn hvr-hover" id="btn-submit" style="color: #ffffff; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 600"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Sản phẩm bán chạy</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">  
                    @foreach($products as $product)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    @if($product->in_stock == 1)
                                    <p class="sale">Giảm giá</p>
                                    @else
                                    <p class="new">Hết hàng</p>
                                    @endif
                                </div>
                                <div class="type-lb-price">
                                    <p class="price"> {{ $product->price }} VNĐ</p>
                                </div>
                                @if(!empty($product->image))
                                <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/products_image/'. $product->image) }}" class="img-fluid" alt="Image" style="width: 105%"></a>
                                @else
                                <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/not_found.png') }}" class="img-fluid" alt="Image" style="width: 105%"></a>
                                @endif
                            </div>
                            <div class="why-text">
                                <h4>{{ $product->name }}</h4>
                                <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}" onclick="toastr({{$product->id}})"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
@endsection
@extends('layout_user')

@section('body')
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="{{ asset('assets/images/slider_image/1.jpg') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20">Chào mừng đến với <br> Cà phê SP</h1>
                        <p  class="m-b-40">Đồ ăn và thức uống <br> chúng tôi có tất cả.  </p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('assets/images/slider_image/2.jpg') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20">Chào mừng đến với <br> Cà phê SP</h1>
                        <p  class="m-b-40">Và bạn là tất cả <br>với chúng tôi! </p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('assets/images/slider_image/3.jpg') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"> Hãy đến với chúng tôi<br> mỗi khi bạn cần</h1>
                        <p  class="m-b-40"> Sự hiện diện của bạn <br> là niềm hạnh phúc của chúng tôi ♥</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
{{-- <div class="categories-shop"> --}}
<div>    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Thực Đơn</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
            @if(!empty($category->image))
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img  style="height:300px" class="img-fluid" src="{{ asset('assets/images/categories_image/' . $category->image) }}" alt="" />
                    <a class="btn hvr-hover" href="{{ Route('category_detail', $category->id ) }}">{{$category->name}}</a>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img  style="height:300px" class="img-fluid" src="{{ asset('assets/images/not_found.png') }}" alt="" />
                    <a class="btn hvr-hover" href="{{ Route('category_detail', $category->id ) }}">{{$category->name}}</a>
                </div>
            </div>
            @endif
                {{-- @if($category->category_type == 0)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/food.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="{{ Route('category_detail', $category->id ) }}">{{$category->name}}</a>
                    </div>
                </div>
                @else
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('assets/images/drink.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="{{ Route('category_detail', $category->id ) }}">{{$category->name}}</a>
                    </div>
                </div>
                @endif --}}
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->

{{-- <div class="box-add-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Thông Tin Khuyến Mãi</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="{{ asset('assets/images/add-img-01.jpg') }}" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="{{ asset('assets/images/add-img-02.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Start Products  -->
{{-- <div class="products-box"> --}}
<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Thức ăn & Đồ uống</h1>
                    <p>Những sản phẩm mới nhất và bán chạy nhất</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button data-filter=".best-seller">Bán chạy</button>
                        <button data-filter=".top-featured">Mới nhất</button>
                        <button hidden class="active" data-filter="*">Tất cả</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            @foreach($productsNew as $product)
            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            @if($product->in_stock == 1)
                            <p class="sale">Mới</p>
                            @else
                            <p class="new">Hết hàng</p>
                            @endif
                        </div>
                        <div class="type-lb-price">
                            <p class="price">{{ number_format($product->price, "0", ".", ".") }} VNĐ</p>
                        </div>
                        @if(!empty($product->image))
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/products_image/'.$product->image) }}" class="img-fluid" alt=""></a>
                        @else
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/'. 'not_found.png') }}" class="img-fluid" alt=""></a>
                        @endif
                    </div>
                    <div class="why-text">
                        <h4>{{ $product->name }}</h4>
                        @auth
                            @if($product->in_stock == 1)
                                <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}" onclick="toastr({{$product->id}})"><i class="fas fa-cart-plus"></i>  Thêm giỏ</button>
                            @else
                                <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}"><i class="fas fa-cart-plus"></i>  Thêm giỏ</button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($productsBest as $product)
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            @if($product->in_stock == 1)
                            <p class="sale">Bán chạy</p>
                            @else
                            <p class="new">Hết hàng</p>
                            @endif
                        </div>
                        <div class="type-lb-price">
                            <p class="price">{{ number_format($product->price, "0", ".", ".") }} VNĐ</p>
                        </div>
                        @if(!empty($product->image))
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/products_image/'.$product->image) }}" class="img-fluid" alt=""></a>
                        @else
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/not_found.png') }}" class="img-fluid" alt=""></a>
                        @endif
                    </div>
                    <div class="why-text">
                        <h4>{{ $product->name }}</h4>
                        @auth
                            @if($product->in_stock == 1)
                                <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}" onclick="toastr({{$product->id}})"><i class="fas fa-cart-plus"></i>  Thêm giỏ</button>
                            @else
                                <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}"><i class="fas fa-cart-plus"></i>  Thêm giỏ</button>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        {{-- <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-01.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div> --}}
        @foreach($products as $product)
        @if(!empty($product->image))
        <div class="item">
            <div class="ins-inner-box">
                <img style="height: 150px" src="{{ asset('assets/images/products_image/'.$product->image) }}" alt=""></a>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        @else
        <div class="item">
            <div class="ins-inner-box">
                <img style="height: 150px" src="{{ asset('assets/images/not_found.png') }}" alt=""></a>
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<!-- End Instagram Feed  -->
@endsection

@extends('layout_user')

@section('body')
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="{{ asset('assets/images/banner-01.jpg') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('assets/images/banner-02.jpg') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="{{ asset('assets/images/banner-03.jpg') }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Freshshop</strong></h1>
                        <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
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
<div class="categories-shop">
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
            @if($category->category_type == 0)
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
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->

<div class="box-add-products">
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
</div>

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Food & Drink</h1>
                    <p>Những sản phẩm mới nhất và bán chạy nhất</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">Tất cả</button>
                        <button data-filter=".top-featured">Mới nhất</button>
                        <button data-filter=".best-seller">Bán chạy</button>
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
                            <p class="sale">New</p>
                            @else
                            <p class="new">Hết hàng</p>
                            @endif
                        </div>
                        <div class="type-lb-price">
                            <p class="price"> ${{ $product->price }}</p>
                        </div>
                        @if(!empty($product->image))
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/'.$product->image) }}" class="img-fluid" alt="Image"></a>
                        @else
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/'. 'not_found.png') }}" class="img-fluid" alt="Image"></a>
                        @endif
                    </div>
                    <div class="why-text">
                        <h4>{{ $product->name }}</h4>
                        @auth
                        <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}" onclick="toastr({{$product->id}})">Thêm giỏ hàng</button>
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
                            <p class="sale">Best Seller</p>
                            @else
                            <p class="new">Hết hàng</p>
                            @endif
                        </div>
                        <div class="type-lb-price">
                            <p class="price"> ${{ $product->price }}</p>
                        </div>
                        @if(!empty($product->image))
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/'.$product->image) }}" class="img-fluid" alt="Image"></a>
                        @else
                        <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/not_found.png') }}" class="img-fluid" alt="Image"></a>
                        @endif
                    </div>
                    <div class="why-text">
                        <h4>{{ $product->name }}</h4>
                        @auth
                        <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}" onclick="toastr({{$product->id}})">Thêm giỏ hàng</button>
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
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-01.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-02.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-03.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-04.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-05.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-06.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-07.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-08.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-09.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{ asset('assets/images/instagram-img-05.jpg') }}" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Instagram Feed  -->
@endsection

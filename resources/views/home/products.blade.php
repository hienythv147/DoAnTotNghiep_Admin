@extends('layout_user')

@section('body')
<!-- Start All Title Box -->
{{-- <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Đặt hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đặt hàng</li>
                </ul>
            </div>
        </div>
    </div> --}}
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span style="font-size: 20px"><strong>Danh Sách Sản Phẩm </strong></span>
                                <!-- <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                    <option data-display="Select"><strong>Mặc định</option>
                                    <option value="1"><a href="{{ Route('products') }}">Mới nhất</a></option>
                                    <option value="2">Cao nhất → Thấp nhất</option>
                                    <option value="3">Thấp nhất → Cao nhất</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @foreach($products as $product)
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <div class="type-lb">
                                                    @if($product->in_stock == 1)
                                                    <p class="sale">Bán</p>
                                                    @else
                                                    <p class="new">Hết hàng</p>
                                                    @endif
                                                </div>
                                                <div class="type-lb-price">
                                                    <p class="price"> {{ number_format($product->price, "0", ".", ".") }} VNĐ</p>
                                                </div>
                                                @if(!empty($product->image))
                                                <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/products_image/'. $product->image) }}" class="img-fluid" alt=""></a>
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
                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                @foreach($products as $product)
                                <div class="list-view-box">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        @if($product->in_stock == 1)
                                                        <p class="sale">Bán</p>
                                                        @else
                                                        <p class="new">Hết hàng</p>
                                                        @endif
                                                    </div>
                                                    @if(!empty($product->image))
                                                    <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/products_image/'.$product->image) }}" class="img-fluid" alt=""></a>
                                                    @else
                                                    <a href="{{ Route('product_detail', $product->id) }}"><img src="{{ asset('assets/images/not_found.png') }}" class="img-fluid" alt=""></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                            <div class="why-text full-width">
                                                <h4>{{ $product->name }}</h4>
                                                <h5>{{ number_format($product->price, "0", ".", ".")  }} VNĐ</h5>
                                                <p>Là sự kết hợp hoàn hảo giữa vị ngọt đặc trưng của siro đường hổ quyện với vị ngậy béo của sữa tươi cùng trân châu dẻo dai uống rồi lại muốn thêm ly nữa.</p>
                                                 @auth
                                                 <button type="button" class="btn hvr-hover" id="btn-add-to-cart-{{$product->id}}" onclick="toastr({{$product->id}})"><i class="fas fa-cart-plus"></i>  Thêm giỏ</button>
                                                 @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- start paginate products -->
                        {{ $products->links() }}
                        <!-- end paginate products -->
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    {{-- <div class="search-product">
                        <form action="#">
                            <input class="form-control" type="text" disabled>
                            <!-- <button type="submit"> <i class="fa fa-search"></i> </button> -->
                        </form>
                    </div> --}}
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Thực đơn</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1"><b> Thức Ăn </b> <small class="text-muted"></small>
                            </a>
                                <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                    <div class="list-group">
                                        @foreach($categories as $category)
                                        @if($category->category_type == 2)
                                        <a href="{{ Route('category_detail', $category->id ) }}" class="list-group-item list-group-item-action {{ 'category/'.$category->id == Request::path() ? 'active' : '' }}"><strong>{{$category->name}}</strong> <small class="text-muted"></small></a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2"><b> Đồ Uống </b> 
                            <small class="text-muted"></small>
                            </a>
                                <div class="collapse show" id="sub-men2" data-parent="#list-group-men">
                                    <div class="list-group">
                                        @foreach($categories as $category)
                                        @if($category->category_type == 1)
                                        <a href="{{ Route('category_detail', $category->id ) }}" class="list-group-item list-group-item-action {{ 'category/'.$category->id == Request::path() ? 'active' : '' }}"><strong>{{$category->name}}</strong> <small class="text-muted"></small></a>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
@endsection
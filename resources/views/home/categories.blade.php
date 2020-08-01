@extends('layout_user')

@section('body')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Thực đơn</h2>
                {{-- <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Thực đơn</li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Gallery  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Thực Đơn</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">Tất cả</button>
                        <button data-filter=".food">Thức ăn</button>
                        <button data-filter=".drink">Giải khát</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row special-list">
            {{-- @foreach($categories as $value)
            <div class="col-lg-3 col-md-6 special-grid *">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb" style="width: 100%">
                            <p class="sale">{{$value->name}}</p>
                        </div>  
                        <a href="{{ Route('category_detail', $value->id ) }}"><img src="{{ asset('assets/images/categories_image/'. $value->image) }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
            @endforeach --}}
            @foreach($categories_food as $value)
            @if(!empty($value->image))
            <div class="col-lg-3 col-md-6 special-grid food">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb" style="width: 100%">
                            <p class="sale">{{$value->name}}</p>
                        </div>  
                        <a href="{{ Route('category_detail', $value->id ) }}"><img src="{{ asset('assets/images/categories_image/'. $value->image) }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6 special-grid food">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb" style="width: 100%">
                            <p class="sale">{{$value->name}}</p>
                        </div>  
                        <a href="{{ Route('category_detail', $value->id ) }}"><img src="{{ asset('assets/images/not_found.png') }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            
            @foreach($categories_drink as $value)
            @if(!empty($value->image))
            <div class="col-lg-3 col-md-6 special-grid drink">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb" style="width: 100%">
                            <p class="sale">{{$value->name}}</p>
                        </div>  
                        <a href="{{ Route('category_detail', $value->id ) }}"><img src="{{ asset('assets/images/categories_image/'. $value->image) }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6 special-grid drink">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb" style="width: 100%">
                            <p class="sale">{{$value->name}}</p>
                        </div>  
                        <a href="{{ Route('category_detail', $value->id ) }}"><img src="{{ asset('assets/images/not_found.png') }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- End Gallery  -->
@endsection
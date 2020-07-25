<header id="topnav">

    <!-- Topbar Start -->
    @include('layouts.topbar')
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li style="margin: 10px 0px 10px 0px" class="has-submenu">
                        <a href="{{ route('products-list') }}"><i class="fas fa-utensils" ></i>SẢN PHẨM
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px; " class="has-submenu">
                        <a href="{{ route('categories-list') }}"><i class="fas fa-tags" ></i>LOẠI SẢN PHẨM
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px; " class="has-submenu">
                        <a href="{{ route('customers-list') }}"> <i class="fas fa-users" ></i>
                            KHÁCH HÀNG
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px; " class="has-submenu">
                        <a href="{{ route('users-list') }}">
                            <i class="fas fa-users"></i>
                            NHÂN VIÊN<div class="arrow-down"></div></a>
                            <ul class="submenu">
                                <li>
                                    <a href="{{ route('roles-list') }}">
                                        <i class="fas fa-chevron-right"></i>
                                       LOẠI NHÂN VIÊN
                                    </a>
                                </li>
                            </ul>
                        </a>
                    </li>
                    {{-- <li style="margin: 10px 0px 10px 0px;" class="has-submenu">
                        <a href="{{ route('roles-list') }}"> <i class="fas fa-user-tag" ></i>
                            LOẠI NHÂN VIÊN
                        </a>
                    </li> --}}
                    <li style="margin: 10px 0px 10px 0px;" class="has-submenu">
                        <a href="{{ route('ingredients-list') }}">
                            <i class="fe-package" ></i>NGUYÊN LIỆU </a>
                    </li>   
                    <li style="margin: 10px 0px 10px 0px;" class="has-submenu">
                        <a href="#">
                            <i class="fas fa-file-invoice" ></i>HÓA ĐƠN <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('orders-out-list') }}">
                                    <i class="fas fa-chevron-right"></i>
                                    HÓA ĐƠN BÁN
                                </a>
                                <a href="{{ route('orders-in-list') }}">
                                    <i class="fas fa-chevron-right"></i>
                                    HÓA ĐƠN NHẬP
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->
</header>
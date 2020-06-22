<header id="topnav">

    <!-- Topbar Start -->
    @include('Body.topbar-Body')
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li style="margin: 10px 0px 10px 0px; border-right: 1px solid white;" class="has-submenu">
                        <a href="{{ route('products-list') }}"><i class="fas fa-utensils" style="color: red"></i>Sản Phẩm
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px; " class="has-submenu">
                        <a href="{{ route('categories-list') }}"><i class="fas fa-tags" style="color:GreenYellow"></i>Loại SP
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px;border-right: 1px solid white; border-left: 1px solid white " class="has-submenu">
                        <a href="{{ route('customers-list') }}"> <i class="fas fa-users" 
                            style="color:PowderBlue"></i>
                            Khách Hàng
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px; " class="has-submenu">
                        <a href="{{ route('users-list') }}"> <i class="fas fa-users" 
                            style="color:DarkTurquoise"></i>
                            Nhân Viên
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px;border-right: 1px solid white; border-left: 1px solid white " class="has-submenu">
                        <a href="{{ route('roles-list') }}"> <i class="fas fa-user-tag" style="color: SpringGreen"></i>
                            Vai Trò
                        </a>
                    </li>
                    <li style="margin: 10px 0px 10px 0px;" class="has-submenu">
                        <a href="{{ route('ingredients-list') }}">
                            <i class="fe-package" style="color:LawnGreen"></i>Nguyên Liệu </a>
                    </li>   
                    <li style="margin: 10px 0px 10px 0px; border-left: 1px solid white" class="has-submenu">
                        <a href="#">
                            <i class="fas fa-file-invoice" style="color:MediumSlateBlue"></i>Đơn Hàng <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('orders-out-list') }}">
                                    <i class="fas fa-chevron-right"></i>
                                    Đơn Bán
                                </a>
                                <a href="{{ route('orders-in-list') }}">
                                    <i class="fas fa-chevron-right"></i>
                                Đơn Nhập
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
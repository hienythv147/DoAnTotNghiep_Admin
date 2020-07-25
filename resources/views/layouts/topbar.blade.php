<div class="navbar-custom">
    <div class="container-fluid">
        
        <!- LOGO -->
        <div class="logo-box">
            <a href="{{ route('admin-home') }}" class="logo text-center">
                <span class="logo-lg">
                    <img src = "{{asset('assets/images/logo.png')}}" alt="" height="65" width="70">
                    <!-- <span class="logo-lg-text-dark">Upvex</span> -->
                </span>
            </a>
        </div>
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src = "{{asset('assets/images/nyan.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{ Auth::user()->last_name . " " . Auth::user()->first_name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            Thao tác
                        </h5>
                    </div>
                    <!-- item-->
                    <a href="{{ route('home') }}" class="dropdown-item notify-item">
                        <i class="fas fa-backward"></i>
                        <span>Bán hàng</span>
                    </a>
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>  
                        {{ __('Đăng xuất') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- end Topbar -->
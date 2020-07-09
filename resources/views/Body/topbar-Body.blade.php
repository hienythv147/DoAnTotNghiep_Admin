<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src = "{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        Marcia J. <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            Welcome !
                        </h5>
                    </div>
                    <!-- item-->
                {{--     <a href="{{route('profile')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a> --}}

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>

                    <!-- item-->
                   {{--  <a href="{{ route('dang-xuat') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a> --}}
                </div>
            </li>
        </ul>
        <!- LOGO -->
            <div class="logo-box">
                <a href="#" class="logo text-center">
                    <span class="logo-lg">
                        <img src = "{{asset('assets/images/logo-dark.png')}}" alt="" height="26">
                        <!-- <span class="logo-lg-text-dark">Upvex</span> -->
                    </span>
                </a>
            </div>
    </div>
</div>
<!-- end Topbar -->
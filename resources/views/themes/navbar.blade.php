<div class="container-scroller">
       <!-- partie navbar  -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo text-white" href="?sunucode=home"><i class="mdi mdi-home ml-1"></i>Page</a>
            <!-- <a class="navbar-brand brand-logo-mini" href="?sunucode=home">
                    Home</a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-xl-block">
                <h3 class="d-flex align-items-center mt-3">Bienvenue !</h3>
                <!-- <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">
                    </div>
                </form> -->
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <!-- <div class="nav-profile-img">
                            <img src="themes/images/faces/face28.png" alt="image">
                        </div> -->
                        <h5 class="mb-1 text-secondary">
                            {{ Auth::user()->name }} 
                        </h5>
                        <div class="nav-profile-text">
                            
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                        aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                        <!-- <div class="p-3 text-center bg-primary">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="themes/images/faces/face28.png"
                                alt="">
                        </div> -->
                        <div class="p-2">
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="{{route('profile.edit')}}">
                                <span>Profile</span>
                                <span class="p-0">
                                    <span class="badge badge-success"></span>
                                    <i class="mdi mdi-account-outline ml-1"></i>
                                </span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Deconnexion') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
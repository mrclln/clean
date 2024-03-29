<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('assets/images/LOGOEDIT.svg')}}" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/LOGOEDIT.svg')}}" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{asset('assets/images/faces/download.png')}}" alt="profile" />
                    <span class="nav-profile-name">{{!auth()->guest() ? auth()->user()->name : 'Guest'}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="typcn typcn-cog-outline text-primary"></i>
                        Settings
                    </a>
                    <form method="POST" class="p-0 m-0" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="dropdown-item" >
                            <i class="typcn typcn-eject text-primary"></i>
                            Logout
                        </button>
                    </form>

                </div>
            </li>
            {{-- <li class="nav-item nav-user-status dropdown">
                <p class="mb-0">Last login was 23 hours ago.</p>
            </li> --}}
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                    <h6 class="date mb-0">Today : Feb 24</h6>
                    <i class="typcn typcn-calendar"></i>
                </a>
            </li>

            <li class="nav-item dropdown mr-0">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                    id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="typcn typcn-bell mx-0"></i>
                    <span class="count"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>


                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>

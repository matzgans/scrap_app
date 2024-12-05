<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start my-2 ms-2 bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times text-dark position-absolute d-none d-xl-none end-0 top-0 cursor-pointer p-3 opacity-5"
            id="iconSidenav" aria-hidden="true"></i>
        <a class="navbar-brand m-0 px-4 py-3" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img class="navbar-brand-img" src="{{ asset('assets/img/logo-ct-dark.png') }}" alt="main_logo" width="26"
                height="26">
            <span class="text-dark ms-1 text-sm">Creative Tim</span>
        </a>
    </div>
    <hr class="horizontal dark mb-2 mt-0">
    <div class="navbar-collapse collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ request()->routeIs('admin.scraping.index') ? 'active' : '' }}"
                    href="{{ route('admin.scraping.index') }}">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Scaraping</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="text-uppercase text-dark font-weight-bolder ms-2 ps-4 text-xs opacity-5">Account pages
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/profile.html">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('auth.logout') }}" method="post">
                    @csrf
                    <button class="nav-link text-dark" type="submit" href="../pages/sign-in.html">
                        <i class="material-symbols-rounded opacity-5">login</i>
                        <span class="nav-link-text ms-1">Logout</span>
                    </button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/sign-up.html">
                    <i class="material-symbols-rounded opacity-5">assignment</i>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
            <a class="btn btn-outline-dark w-100 mt-4" type="button"
                href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree">Documentation</a>
            <a class="btn bg-gradient-dark w-100" type="button"
                href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree">Upgrade to
                pro</a>
        </div>
    </div>
</aside>

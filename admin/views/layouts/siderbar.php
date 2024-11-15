<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.php" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Quản lý</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=/">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=danh-mucs">
                        <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Danh mục sản phẩm</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=san-phams">
                        <i class="bi bi-box"></i> <span data-key="t-advance-ui">Sản phẩm</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=don-hangs">
                        <i class="bi bi-receipt"></i> <span data-key="t-advance-ui">Đơn hàng</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="?act=tin-tucs">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Tin Tức</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link " href="?act=lien-hes">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Liên hệ</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link " href="?act=nguoi-dungs">
                        <i class="ri-account-circle-line"></i> <span data-key="t-forms">Người dùng</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link " href="?act=banners">
                        <i class="las la-images"></i> <span data-key="t-forms">Banner</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link " href="?act=trang-thai-don-hangs">
                        <i class="ri-honour-line"></i> <span data-key="t-forms">Trạng thái đơn hàng</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link " href="?act=ma-khuyen-mais">
                        <i class=" lab la-hotjar"></i> <span data-key="t-forms">Mã khuyến mãi</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link " href="?act=thong-ke">
                        <i class="las la-chart-pie"></i> <span data-key="thong-ke">Thống kê</span>
                    </a>

                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Bán hàng</span></li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
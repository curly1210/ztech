<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập Nhật Mã Khuyến Mãi | TechZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";

    ?>


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý mã khuyến mãi</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="?act=/">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Quản lý mã khuyến mãi</li>
                                    </ol>
                                </div>

                            </div>

                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật mã khuyến mãi</h4>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    <div class="live-preview">
                                        <form action="?act=sua-ma-khuyen-mai" method="POST">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div>
                                                        <label for="ten_ma" class="form-label">Tên khuyến mãi:</label>
                                                        <input type="text" class="form-control" placeholder="Nhập tên khuyến mãi" id="ten_ma" name="ten_ma" value="<?= $maKhuyenMai['ten'] ?>">
                                                        <input type="hidden" name="id" value="<?= $maKhuyenMai['id'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['ten_ma']) ? $_SESSION['errors']['ten_ma'] : '' ?>
                                                        </span>
                                                    </div>

                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div>
                                                        <label for="gia_giam" class="form-label">Giá giảm:</label>
                                                        <input type="number" class="form-control" min="0" placeholder="Nhập tên giá giảm" id="gia_giam" name="gia_ma" value="<?= $maKhuyenMai['gia'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['gia_ma']) ? $_SESSION['errors']['gia_ma'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <div>
                                                        <label for="so_luong" class="form-label">Số lượng:</label>
                                                        <input type="number" class="form-control" min="0" placeholder="Nhập số lượng mã" name="so_luong" id="so_luong" value="<?= $maKhuyenMai['so_luong'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputdate" class="form-label">Ngày bắt đầu :<?= date("d-m-Y", strtotime($maKhuyenMai['ngay_bat_dau'])) ?></label>

                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleInputdate" class="form-label">Ngày kết thúc : <?= date("d-m-Y", strtotime($maKhuyenMai['ngay_ket_thuc'])) ?></label>

                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div><!-- end col -->

                            </div>
                        </div><!-- end col -->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <div class="customizer-setting d-none d-md-block">
            <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div>

        <!-- JAVASCRIPT -->

        <?php
        require_once "views/layouts/libs_js.php";
        ?>

</body>


</html>
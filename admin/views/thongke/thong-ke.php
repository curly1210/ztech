<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Thống Kê | TechZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
                                <h4 class="mb-sm-0">Dashboards</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="?act=/">Dashboards</a></li>

                                    </ol>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">

                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <p class="text-uppercase fw-medium text-muted mb-0">Doanh thu</p>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $doanhThu['TongDoanhThu']   ?>"></span> đ</h4>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3 material-shadow">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->



                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <p class="text-uppercase fw-medium text-muted mb-0">Khách hàng</p>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $khachHang['SoLuongKhachHang'] ?>">0</span></h4>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3 material-shadow">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <p class="text-uppercase fw-medium text-muted mb-0">Đơn hàng</p>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?= $donHang['SoLuongDonHang'] ?>">0</span></h4>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3 material-shadow">
                                                            <i class=" las la-newspaper text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div> <!-- end row-->
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card crm-widget">
                                            <div class="cart-header ">
                                                <h4 class="card-title mb-3 ms-3 mt-2 flex-grow-1">Thống kê đơn hàng</h4>
                                            </div>
                                            <div class="card-body p-0 ">
                                                <div class="row row-cols-md-3 row-cols-1">
                                                    <div class="col col-lg-6 border-end">
                                                        <div class="py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">Đang chờ xác nhận
                                                            </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="las la-box display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donDangCho['SoLuongDonHangDangCho'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col col-lg-6 border-end">
                                                        <div class="mt-3 mt-md-0 py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">Giao hàng thành công </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class=" las la-clipboard-check display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donThanhCong['SoLuongDonHangGiaoThanhCong'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->


                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card crm-widget">
                                            <div class="card-body p-0">
                                                <div class="row row-cols-md-3 row-cols-1">
                                                    <div class="col col-lg border-end">
                                                        <div class="py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">Đã xác nhận
                                                            </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="las la-check-double display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donDaXacNhan['SoLuongDonHangDaXacNhan'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col col-lg border-end">
                                                        <div class="mt-3 mt-md-0 py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">Đang giao </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="las la-shipping-fast display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donDangGiao['SoLuongDonHangDangGiao'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col col-lg border-end">
                                                        <div class="mt-3 mt-md-0 py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">
                                                                Đã giao
                                                            </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="las la-clone display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donDaGiao['SoLuongDonHangDaGiao'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col col-lg border-end">
                                                        <div class="mt-3 mt-lg-0 py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">
                                                                Giao hàng thất bại
                                                            </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="las la-truck-loading display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donThatBai['SoLuongDonHangGiaoThatBai'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                    <div class="col col-lg">
                                                        <div class="mt-3 mt-lg-0 py-4 px-3">
                                                            <h5 class="text-muted text-uppercase fs-13">
                                                                Đã hủy
                                                            </h5>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="las la-trash-alt display-6 text-muted"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h2 class="mb-0"><span class="counter-value" data-target="<?= $donDaHuy['SoLuongDonHangDaHuy'] ?>">0</span></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div><!-- end row -->


                            </div>
                            <div class="card mt-2 p-3">

                                <h4 class="card-title mb-3 ms-2 mt-2 flex-grow-1">Biểu đồ doanh thu</h4>

                                <div class="card-body">
                                    <div id="myfirstchart" style="height: 250px;"></div>
                                </div>

                            </div><!-- end row -->

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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script>
            console.log('sdsdasdas');
            let data = <?php echo $json; ?>;
            console.log(data);

            new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: data,
                // The name of the data record attribute that contains x-values.
                xkey: 'ngay_dat',
                // A list of names of data record attributes that contain y-values.
                ykeys: ["so_don_hang", "tong_tien"],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: ["Đơn Hàng", "Doanh Thu"]
            });
        </script>

        <?php
        require_once "views/layouts/libs_js.php";
        ?>

</body>

</html>
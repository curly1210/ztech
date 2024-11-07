<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Quản lý Tin Tức | TechZ</title>
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
                                <h4 class="mb-sm-0">Quản lý Tin Tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="?act=/">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Quản lý Tin Tức</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách tin tức</h4>
                                    <div class="col-auto">
                                        <a href="?act=form-them-tin-tuc" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Thêm mới</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-nowrap align-middle mb-0">
                                            <thead class="table-light">
                                                <tr class="text-muted">
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tiêu đề</th>
                                                    <th scope="col">Ngày tạo</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Lượt xem</th>
                                                    <th scope="col">Hành động</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>01</td>
                                                    <td>
                                                        <img src="assets/images/blog/img-2.jpg" alt="" class="me-2 rounded" height="40">
                                                        <a href="#!" class="text-body fw-medium">The Evolution of Minimalism in Design</a>
                                                    </td>
                                                    <td>20 Sep, 2024</td>
                                                    <td><span class="badge bg-success-subtle text-success p-2">MinimalDesign</span></td>
                                                    <td>23</td>
                                                    <td>157</td>

                                                </tr>
                                                <tr>
                                                    <td>02</td>
                                                    <td>
                                                        <img src="assets/images/blog/img-3.jpg" alt="" class="me-2 rounded" height="40">
                                                        <a href="#!" class="text-body fw-medium">Mastering User Experience Through Storytelling</a>
                                                    </td>
                                                    <td>11 Feb, 2024</td>
                                                    <td><span class="badge bg-success-subtle text-success p-2">UXDesign</span></td>
                                                    <td>547</td>
                                                    <td>1458</td>

                                                </tr>
                                                <tr>
                                                    <td>03</td>
                                                    <td>
                                                        <img src="assets/images/blog/img-4.jpg" alt="" class="me-2 rounded" height="40">
                                                        <a href="#!" class="text-body fw-medium">Designing for Purpose: A Mindful Approach</a>
                                                    </td>
                                                    <td>15 Sep, 2024</td>
                                                    <td><span class="badge bg-success-subtle text-success p-2">CreativeProcess</span></td>
                                                    <td>88</td>
                                                    <td>649</td>

                                                </tr>
                                                <tr>
                                                    <td>04</td>
                                                    <td>
                                                        <img src="assets/images/blog/img-5.jpg" alt="" class="me-2 rounded" height="40">
                                                        <a href="#!" class="text-body fw-medium">How to Overcome Creative Block</a>
                                                    </td>
                                                    <td>09 July, 2024</td>
                                                    <td><span class="badge bg-success-subtle text-success p-2">CreativeBlock</span></td>
                                                    <td>67</td>
                                                    <td>1114</td>

                                                </tr>
                                                <tr>
                                                    <td>05</td>
                                                    <td>
                                                        <img src="assets/images/blog/img-6.jpg" alt="" class="me-2 rounded" height="40">
                                                        <a href="#!" class="text-body fw-medium">Building Brand Identity through Design</a>
                                                    </td>
                                                    <td>19 Nov, 2024</td>
                                                    <td><span class="badge bg-success-subtle text-success p-2">BrandDesign</span></td>
                                                    <td>8</td>
                                                    <td>10</td>

                                                </tr>
                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                    <div class="align-items-center mt-3 row g-3 text-center text-sm-start">
                                        <div class="col-sm">
                                            <div class="text-muted">Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">14</span> Results
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                <li class="page-item disabled">
                                                    <a href="#!" class="page-link">←</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#!" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#!" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#!" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#!" class="page-link">→</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
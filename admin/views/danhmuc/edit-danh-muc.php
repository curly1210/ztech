<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập nhật danh mục | TechZ</title>
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
                                <h4 class="mb-sm-0">Quản lý danh mục</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="?act=/">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Quản lý danh mục</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật danh mục</h4>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    <div class="live-preview">
                                        <form action="?act=sua-danh-muc" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $danhMuc['id'] ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                                                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="ten_danh_muc" name="ten_danh_muc" value="<?= $danhMuc['ten'] ?? '' ?>">
                                                        <span class="text-danger">
                                                            <?= isset($_SESSION['errors']['ten_danh_muc']) ? $_SESSION['errors']['ten_danh_muc'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="trang_thai" class="form-label">Trạng thái</label>
                                                        <select name="trang_thai" class="form-select">
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value="1" <?= $danhMuc['trang_thai'] == 1 ? 'selected' : '' ?>>Ẩn</option>
                                                            <option value="2" <?= $danhMuc['trang_thai'] == 2 ? 'selected' : '' ?>>Hiển thị</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class=" mb-3">
                                                    <label for="hinh_anh" class="form-label d-block">Icon danh mục</label>
                                                    <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                                    <input type="hidden" name="hinh-anh-truoc" value="<?= $danhMuc['hinh_anh'] ?? '' ?>">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea5" class="form-label">Mô tả</label>
                                                    <textarea class="form-control" name="mo_ta" id="exampleFormControlTextarea5" rows="4" maxlength="249"><?= $danhMuc['mo_ta'] ?></textarea>
                                                    <span class="text-danger">
                                                        <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                                                    </span>
                                                </div>



                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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
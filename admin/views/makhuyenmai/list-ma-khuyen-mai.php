<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Quản lý mã khuyến mãi | TechZ</title>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách mã khuyến mãi</h4>
                                    <!-- <div class="col-auto">
                                        <a href="?act=form-them-ma-khuyen-mai" class="btn btn-soft-success material-shadow-none"><i class="ri-add-circle-line align-middle me-1"></i> Thêm mới</a>
                                    </div> -->

                                </div>
                                <div class="row g-4 m-1">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="?act=form-them-ma-khuyen-mai" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm</a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <form class="row g-2 " style="margin-bottom: 0;" action="?act=ma-khuyen-mais" method="post">
                                            <div class="col-auto">
                                                <label for="inputPassword2" class="visually-hidden"></label>
                                                <input type="text" name="ten_ma" class="form-control" <?php if ($search == "") { ?> placeholder="Tên mã khuyến mãi ..." <?php } else { ?> value="<?= $search ?>" <?php } ?>>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-nowrap align-middle mb-0">
                                            <thead class="table-light">
                                                <tr class="text-muted">
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Tên mã</th>
                                                    <th scope="col">Giá giảm</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Trạng thái</th>
                                                    <th scope="col">Hành động</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php if (!empty($maKhuyenMais)) {
                                                    foreach ($maKhuyenMais as $index => $maKhuyenMai): ?>
                                                        <tr>
                                                            <td><?= $index + 1 ?></td>
                                                            <td>
                                                                <a href="#!" class="text-body fw-medium"><?= $maKhuyenMai['ten'] ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="#!" class="text-body fw-medium"><?= $maKhuyenMai['gia'] ?></a>
                                                            </td>
                                                            <td>
                                                                <a href="#!" class="text-body fw-medium"><?= $maKhuyenMai['so_luong'] ?></a>
                                                            </td>
                                                            <td>
                                                                <?php if ($maKhuyenMai['trang_thai'] == 3) { ?>
                                                                    <span class="badge bg-success-subtle text-success p-2">Có hiệu lực</span>
                                                                <?php } else if ($maKhuyenMai['trang_thai'] == 2) { ?>
                                                                    <span class="badge bg-warning-subtle text-danger-emphasis p-2">Chưa có hiệu lực</span>

                                                                <?php } else { ?>
                                                                    <span class="badge bg-danger-subtle text-danger p-2">Hết hạn</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <div class="hstack gap-3 fs-15">
                                                                    <a href="?act=form-sua-ma-khuyen-mai&id=<?= $maKhuyenMai['id'] ?>" class="link-primary"><i class="ri-settings-4-line"></i></a>
                                                                    <a href="?act=xem-chi-tiet-ma-khuyen-mai&id=<?= $maKhuyenMai['id'] ?>" class="link-primary"><i class="ri-file-list-line"></i></a>
                                                                    <form action="?act=xoa-ma-khuyen-mai" method="POST" onsubmit='return confirm("Bạn có chắc muốn xóa dữ liệu này ?")'>
                                                                        <input type="hidden" name="ma_khuyen_mai_id" value="<?= $maKhuyenMai['id'] ?>">
                                                                        <button type="submit" class="link-danger" style="border: none; background:none"><i class="ri-delete-bin-5-line"></i></button>
                                                                    </form>
                                                                </div>

                                                            </td>

                                                        </tr>
                                                <?php endforeach;
                                                } else {
                                                    echo '<tr><td class="text-center p-3" colspan="6">Không có dữ liệu</td></tr>';
                                                } ?>


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
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập Nhật Tin Tức | TechZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";

    ?>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />

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
                                <h4 class="mb-sm-0">Quản lý tin tức</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="?act=/">Dashboards</a></li>
                                        <li class="breadcrumb-item active">Quản lý tin tức</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Cập nhật tin tức</h4>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    <div class="live-preview">
                                        <form action="?act=sua-tin-tuc" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div>
                                                        <label for="tieu_de" class="form-label">Tiêu đề</label>
                                                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="tieu_de" name="tieu_de" value="<?= $tinTuc['tieu_de'] ?>">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['tieu_de']) ? $_SESSION['errors']['tieu_de'] : '' ?>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="trang_thai" class="form-label">Trạng thái</label>
                                                        <select name="trang_thai" class="form-select">
                                                            <option selected disabled>Chọn trạng thái</option>
                                                            <option value="1" <?= $tinTuc['trang_thai'] == 1 ? 'selected' : '' ?>>Ẩn</option>
                                                            <option value="2" <?= $tinTuc['trang_thai'] == 2 ? 'selected' : '' ?>>Hiển thị</option>
                                                        </select>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class=" mb-3">
                                                        <label for="hinh_anh" class="form-label d-block">Hình ảnh bìa</label>
                                                        <input type="hidden" name="hinh_anh_truoc" value="<?= $tinTuc['hinh_anh'] ?>">
                                                        <input type="hidden" name="id" value="<?= $tinTuc['id'] ?>">
                                                        <input type="file" name="hinh_anh" class="form-control">
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['hinh_anh']) ? $_SESSION['errors']['hinh_anh'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div>
                                                        <label for="exampleFormControlTextarea5" class="form-label">Mô tả ngắn</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea5" name="mo_ta" rows="3" maxlength="249"><?= $tinTuc['mo_ta_ngan'] ?></textarea>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div>
                                                        <label for="exampleFormControlTextarea5" class="form-label">Nội dung </label>
                                                        <textarea class="form-control ckeditor" id="ckeditor" name="noi_dung" rows="20"> <?= $tinTuc['noi_dung'] ?></textarea>
                                                        <span class="text-danger">
                                                            <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <!--end col-->
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
        <script type="importmap">
            {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
                }
            }
        </script>

        <script type="module">
            import {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph
            } from 'ckeditor5';

            ClassicEditor
                .create(document.querySelector('#ckeditor'), {
                    plugins: [Essentials, Bold, Italic, Font, Paragraph],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'link', 'uploadImage'
                    ]
                })
                .then( /* ... */ )
                .catch( /* ... */ );
        </script>
        <?php
        require_once "views/layouts/libs_js.php";
        ?>

</body>


</html>
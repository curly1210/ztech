<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Chi Tiết Liên Hệ | TechZ</title>
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
                <h4 class="mb-sm-0">Quản lý liên hệ</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Chi tiết liên hệ</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Chi tiết liên hệ</h4>

                </div><!-- end card header -->



                <div class="card-body">

                  <div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Họ và tên</label>
                          <input value="<?= $lienHe["ho_ten"] ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Số điện thoại</label>
                          <input value="<?= $lienHe["so_dien_thoai"] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>
                    <div class=" row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Email</label>
                          <input value="<?= $lienHe["email"] ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Ngày tạo</label>
                          <input value="<?php echo date("H:i:s d/m/Y", strtotime($lienHe['ngay_tao'])) ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>
                    <div>
                      <label class="form-label" for="des-info-description-input">Nội dung</label>
                      <textarea readonly class="form-control" id="des-info-description-input" rows="3"><?= $lienHe["noi_dung"] ?></textarea>
                    </div>

                  </div>

                </div><!-- end card-body -->
                <!-- end card -->
              </div><!-- end col -->

            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row mt-3">
                    <form action="?act=sua-trang-thai-lien-he" method="post">
                      <div class="col-md-3 mb-3">
                        <input type="hidden" name="id" value="<?= $lienHe['id'] ?>">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select name="trang_thai" class="form-select">
                          <option selected disabled>Chọn trạng thái</option>
                          <option value="1" <?= $lienHe['trang_thai'] == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                          <option value="2" <?= $lienHe['trang_thai'] == 2 ? 'selected' : '' ?>>Đã xử lý</option>
                        </select>

                      </div>
                      <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-primary" style="margin-top: 4px;">Cập nhật trạng thái</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- container-fluid -->
          </div>
          <!-- End Page-content -->

          <footer class=" footer">
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
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Sửa Trạng Thái Đơn Hàng | TechZ</title>
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
                <h4 class="mb-sm-0">Quản lý trạng thái đơn hàng</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Dashboards</a></li>
                    <li class="breadcrumb-item active">Sửa trạng thái đơn hàng</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Sửa trạng thái đơn hàng</h4>

                </div><!-- end card header -->



                <div class="card-body">

                  <form action="?act=sua-trang-thai-don-hang" method="post">
                    <div class="mb-3 w-25">
                      <label class="form-label" for="gen-info-email-input">ID</label>
                      <input readonly name="id" value="<?= $trangThaiDonHang["id"] ?>" type="text" class="form-control" id="gen-info-email-input">
                    </div>
                    <div class="mb-3 w-25">
                      <label class="form-label" for="gen-info-email-input">Tên trạng thái đơn hàng</label>
                      <input name="ten" value="<?= $trangThaiDonHang["ten"] ?>" type="text" class="form-control" id="gen-info-email-input">
                      <div class="invalid-feedback" style="display: block;"><?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?></div>
                    </div>
                    <div class="mb-3 w-25">
                      <label for="colorPicker" class="form-label">Color Picker</label>
                      <input name="mau" type="color" class="form-control form-control-color w-100" id="colorPicker" value="<?= $trangThaiDonHang['ma_mau'] ?>">
                      <div class="invalid-feedback" style="display: block;"><?= !empty($_SESSION['errors']['mau']) ? $_SESSION['errors']['mau'] : '' ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Cập nhật</button>
                  </form>

                </div><!-- end card-body -->
              </div><!-- end card -->
            </div><!-- end col -->

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
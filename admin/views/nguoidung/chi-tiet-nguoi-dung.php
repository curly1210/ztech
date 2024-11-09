<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Dashboard | NN Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />


  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


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
                          <input value="<?= $nguoiDung["ho_ten"] ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Email</label>
                          <input value="<?= $nguoiDung["email"] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>
                    <div class=" row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Năm sinh</label>
                          <input value="<?php echo date("d/m/Y", strtotime($nguoiDung['nam_sinh'])) ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Giới Tính</label>
                          <input value="<?php if ($nguoiDung['gioi_tinh'] == 1) { ?>Nam <?php } else { ?>Nữ <?php } ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>
                    <div class=" row align-items-center">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Số điện thoại</label>
                          <input value="<?= $nguoiDung["dien_thoai"] ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Trạng thái</label>
                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                            <input type="checkbox" class="form-check-input" id="userStatus" value="<?= $nguoiDung["id"] ?>" <?php if ($nguoiDung["trang_thai"] == 1) { ?>checked <?php } ?>>
                            <label class="form-check-label" for="customSwitchsizelg">Vô hiệu hóa/Hoạt động</label>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

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

  <script>
    // JavaScript (jQuery)


    $(document).ready(function() {
      $('#userStatus').click(function() {
        const id = $(this).val();
        $.ajax({
          url: '?act=trang-thai-nguoi-dung',
          method: 'post',
          data: {
            id: id
          },
          success: function(response) {
            if (response == 1) {
              setTimeout(() => {
                alert("Kích hoạt thành thành công");
              }, 200);
            } else {
              setTimeout(() => {
                alert("Vô hiệu hóa thành công");
              }, 200);
            }

          },
          error: function() {
            alert("Error");
          }
        });
        // if ($(this).is(":checked")) {

        //   alert($(this).val());
        // }
      });
    });
  </script>

</body>

</html>
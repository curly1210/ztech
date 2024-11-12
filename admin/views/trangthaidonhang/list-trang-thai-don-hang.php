<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Quản Lý Trạng Thái Đơn Hàng | TechZ</title>
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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Quản lý trạng thái đơn hàng</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Trạng thái đơn hàng</h4>

                </div><!-- end card header -->



                <div class="card-body">


                  <div class="live-preview">
                    <div class="row g-4 ">
                      <div class="col-sm-auto">
                        <div>
                          <a href="?act=form-them-trang-thai-don-hang" class="btn btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm</a>
                        </div>
                      </div>
                      <div class="col-sm">
                        <form class="row g-2 " style="margin-bottom: 0;" action="?" method="get">
                          <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden"></label>
                            <input type="hidden" name="act" value="trang-thai-don-hangs" class="form-control" <?php if ($search == "") { ?> placeholder="Tên trạng thái..." <?php } else { ?> value="<?= $search ?>" <?php } ?>>
                            <input type="text" name="ten" class="form-control" <?php if ($search == "") { ?> placeholder="Tên trạng thái..." <?php } else { ?> value="<?= $search ?>" <?php } ?>>
                          </div>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- <form action="">
                        <label>Search:<input type="search" class="" placeholder=""></label>
                      </form> -->

                      <?php if (count($trangThaiDonHangs) != 0) { ?>
                        <table class="table  align-middle table-bordered   mb-0">
                          <thead>
                            <tr>
                              <th class="col-1 text-center" scope="col">STT</th>
                              <th class="col-6 text-center" scope="col">Tên trạng thái</th>
                              <th class="col-6 text-center" scope="col">Hành động</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach ($trangThaiDonHangs as $index => $trangThaiDonHang): ?>
                              <tr>
                                <td class="text-center"><?= $index + 1 ?></td>
                                <td class="text-center"><?= $trangThaiDonHang['ten'] ?></td>
                                <td class="text-center align-middle">
                                  <div class="hstack justify-content-center align-items-center fs-20">

                                    <a href="?act=form-sua-trang-thai-don-hang&id=<?= $trangThaiDonHang['id'] ?>"><i style="color:#0ab39c" class="ri-edit-2-line"></i></a>
                                    <form action="?act=xoa-trang-thai-don-hang" method="POST" onsubmit='return confirm("Bạn có chắc muốn xóa dữ liệu này ?")'>
                                      <input type="hidden" name="id" value="<?= $trangThaiDonHang['id'] ?>">
                                      <button type="submit" class="link-danger" style="border: none; background:none"><i class="ri-delete-bin-5-line"></i></button>
                                    </form>


                                  </div>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      <?php } else { ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                          <p class="fs-2">Không tìm thấy trạng thái đơn hàng !</p>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div><!-- end card-body -->
              </div><!-- end card -->
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
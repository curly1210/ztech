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
                <h4 class="mb-sm-0">Quản lý người dùng</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Quản lý người dùng</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Danh sách người dùng</h4>

                </div><!-- end card header -->



                <div class="card-body">


                  <div class="live-preview">
                    <div class="row g-4 ">
                      <div class="col-sm-auto">
                        <div>
                          <button class="btn btn-soft-danger" id="delete"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                      </div>
                      <div class="col-sm">
                        <form class="row g-2 " style="margin-bottom: 0;" action="?act=nguoi-dungs" method="post">
                          <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden"></label>
                            <input type="text" name="ho_ten" class="form-control" <?php if ($search == "") { ?> placeholder="Họ tên..." <?php } else { ?> value="<?= $search ?>" <?php } ?>>
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

                      <?php if (count($nguoiDungs) != 0) { ?>
                        <table class="table  align-middle table-bordered   mb-0">
                          <thead>
                            <tr>
                              <th class="col-1" scope="col" style="width: 50px;">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="0" id="select_all">
                                </div>
                              </th>
                              <th class="col-2 text-center" scope="col">Họ tên</th>
                              <th class="col-2 text-center" scope="col">Số điện thoại</th>
                              <th class="col-1 text-center" scope="col">Giới tính</th>
                              <th class="col-3 text-center" scope="col">Email</th>
                              <th class="col-2 text-center" scope="col">Admin</th>
                              <th class="col-2 text-center" scope="col">Trạng thái</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach ($nguoiDungs as $index => $nguoiDung): ?>
                              <tr>
                                <td class="col-1" scope="col" style="width: 50px;">
                                  <div class="form-check">
                                    <input class="form-check-input" id="<?= $nguoiDung["id"] ?>" value="<?= $nguoiDung["id"] ?>" type="checkbox">
                                  </div>
                                </td>
                                <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ10</a></td>
                                <td class="text-center"><?= $nguoiDung['ho_ten'] ?></td>
                                <td class="text-center"><?= $nguoiDung['dien_thoai'] ?></td>
                                <td class="text-center"><?php if ($nguoiDung['gioi_tinh'] == 1) { ?>Nam<?php } else { ?>Nữ<?php } ?></td>
                                <td class="text-center"><?= $nguoiDung['email'] ?></td>
                                <td class="text-center"><?php if ($nguoiDung['admin'] == 0) { ?>Khách hàng<?php } else { ?>Admin<?php } ?></td>
                                <td class="text-center"><?php if ($nguoiDung['trang_thai'] == 0) { ?>Vô hiệu hóa<?php } else { ?>Kích hoạt<?php } ?></td>

                                <!-- <td>
                                  <div class="d-flex justify-content-center align-items-center">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" checked="">
                                      <label class="form-check-label ms-2" for="SwitchCheck1">Yes/No</label>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <div class="d-flex justify-content-center align-items-center">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" checked="">
                                      <label class="form-check-label ms-2" for="SwitchCheck1">Disable/Active</label>
                                    </div>
                                  </div>
                                </td> -->
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      <?php } else { ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                          <p class="fs-2">Không tìm thấy người dùng !</p>
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

<script>
  $('#select_all').change(function() {
    if ($(this).is(":checked") && isNaN()) {
      $('input[type=checkbox]').each(function() {
        $('#' + this.id).prop('checked', true);
      });
    } else {
      $('input[type=checkbox]').each(function() {
        $('#' + this.id).prop('checked', false);
      });
    }
  });

  $("#delete").click(function() {
    let id = [];
    $(":checkbox:checked").each(function(key) {
      id[key] = $(this).val();
    });
    if (id.length == 0) {
      alert("Vui lòng chọn ít nhất 1 checkbox");
    } else {
      let text = "Bạn có chắn muốn xóa sản phẩm không?";
      if (confirm(text) == true) {
        $.ajax({
          url: '?act=xoa-nguoi-dung',
          method: 'post',
          data: {
            list_id: id
          },
          success: function(response) {
            // alert(response);
            window.location.reload();
          },
          error: function() {
            alert("Error");
          }
        })
      }
    }

  });
</script>

</html>
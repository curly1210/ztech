<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Quản Lý Người Dùng | TechZ</title>
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
                          <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>Thêm</button>
                          <button class="btn btn-soft-danger" id="delete"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                      </div>
                      <div class="col-sm">
                        <form class="row g-2 " style="margin-bottom: 0;" action="?" method="get">
                          <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden"></label>
                            <input type="hidden" name="act" value="nguoi-dungs" class="form-control" <?php if ($search == "") { ?> placeholder="Họ tên..." <?php } else { ?> value="<?= $search ?>" <?php } ?>>
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
                              <th class="col-3 text-center" scope="col">Họ tên</th>
                              <!-- <th class="col-1 text-center" scope="col">Giới tính</th> -->
                              <th class="col-3 text-center" scope="col">Email</th>
                              <th class="col-3 text-center" scope="col">Vai trò</th>
                              <th class="col-3 text-center" scope="col">Hành động</th>
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
                                <td class="text-center"><?= $nguoiDung['email'] ?></td>
                                <td class="text-center"><?php if ($nguoiDung['admin'] == 0) { ?>Khách hàng<?php } else { ?>Admin<?php } ?></td>
                                <td>
                                  <div class="d-flex justify-content-center align-items-center hstack gap-3 flex-wrap">
                                    <a href="?act=chi-tiet-nguoi-dung&id=<?= $nguoiDung["id"] ?>" class="btn btn-sm btn-light">Chi tiết</a>
                                  </div>
                                </td>

                                <!-- <td>
                                  <div class="d-flex justify-content-center align-items-center">
                                    <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" role="switch" checked="">
                                      <label class="form-check-label ms-2" for="SwitchCheck1">Yes/No</label>
                                    </div>
                                  </div>
                                </td> -->
                                <!-- <td>
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

  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-light p-3">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form class="tablelist-form" id="addUserForm" autocomplete="off">
          <div class="modal-body">

            <div class="mb-3">
              <label for="customername-field" class="form-label">Họ và tsên</label>
              <input name="ho_ten" type="text" id="customername-field" class="form-control" placeholder="Điền họ và tên" />
              <div id="err_hoTen" class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="email-field" class="form-label">Địa chỉ Email</label>
              <input name="email" type="email" id="email-field" class="form-control" placeholder="Điền email" />
              <div id="err_email" class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="email-field" class="form-label">Mật khẩu</label>
              <input name="mat_khau" type="password" id="email-field" class="form-control" placeholder="Điền mật khẩu" />
              <div id="err_matKhau" class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="email-field" class="form-label">Xác nhận mật khẩu</label>
              <input name="re_mat_khau" type="password" id="email-field" class="form-control" placeholder="Điền xác nhận mật khẩu" />
              <div id="err_reMatKhau" class="invalid-feedback"></div>
            </div>

            <div class="mb-3">
              <label for="phone-field" class="form-label">Số điện thoại</label>
              <input name="dien_thoai" type="text" id="phone-field" class="form-control" placeholder="Điền số điện thoại" />
              <div id="err_dienThoai" class="invalid-feedback"></div>
            </div>


            <div class="mb-3">
              <label for="phone-field" class="form-label">Giới tính</label>
              <div class="d-flex gap-3">
                <div class="d-flex align-items-center gap-1">
                  <label for="phone-field" class="form-label mb-0">Nam</label>
                  <input class="form-check-input mt-0" type="radio" name="gioi_tinh" value="1">

                </div>
                <div class="d-flex align-items-center gap-1">
                  <label for=" phone-field" class="form-label mb-0">Nữ</label>
                  <input class="form-check-input mt-0" type="radio" name="gioi_tinh" value="2">

                </div>
              </div>
              <div id="err_gioiTinh" class="invalid-feedback"></div>

            </div>

            <div class="mb-3">
              <label for="date-field" class="form-label">Năm sinh</label>
              <input name="nam_sinh" type="date" class="form-control" id="exampleInputdate">
              <div id="err_namSinh" class="invalid-feedback"></div>
            </div>

            <!-- <div class="row">
              <div class="col">
                <label for="status-field" class="form-label">Status</label>
                <select class="form-control" data-trigger name="status-field" id="status-field">
                  <option value="">Vai trò</option>
                  <option value="0">Người dùng</option>
                  <option value="1">Admin</option>
                </select>
              </div>

              <div class="col">
                <label for="status-field" class="form-label">Status</label>
                <select class="form-control" data-trigger name="status-field" id="status-field">
                  <option value="">Status</option>
                  <option value="Active">Active</option>
                  <option value="Block">Block</option>
                </select>
              </div>
            </div> -->

          </div>
          <div class="modal-footer">
            <div class="hstack gap-2 justify-content-end">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-success" id="add-btn">Thêm người dùng</button>
              <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>

</body>

<!-- Thêm người dùng -->
<script>
  $(document).ready(function() {
    $("#addUserForm").submit(function(event) {
      event.preventDefault(); // Ngăn chặn form nạp lại trang

      $.ajax({
        url: "?act=them-nguoi-dung",
        type: "POST",
        data: $(this).serialize(), // Lấy dữ liệu form
        success: function(response) {
          response = JSON.parse(response);

          const err_hoTen = document.getElementById("err_hoTen");
          const err_email = document.getElementById("err_email");
          const err_matKhau = document.getElementById("err_matKhau")
          const err_reMatKhau = document.getElementById("err_reMatKhau");
          const err_dienThoai = document.getElementById("err_dienThoai");
          const err_gioiTinh = document.getElementById("err_gioiTinh");
          const err_namSinh = document.getElementById("err_namSinh");

          err_hoTen.innerHTML = "";
          err_email.innerHTML = "";
          err_matKhau.innerHTML = "";
          err_reMatKhau.innerHTML = "";
          err_dienThoai.innerHTML = "";
          err_gioiTinh.innerHTML = "";
          err_namSinh.innerHTML = "";



          if (response['check'] == 1) {
            if ("ho_ten" in response) {
              err_hoTen.innerHTML = response["ho_ten"];
              err_hoTen.style = "display:block";
            }

            if ("email" in response) {
              err_email.innerHTML = response["email"];
              err_email.style = "display:block";
            }
            if ("mat_khau" in response) {
              err_matKhau.innerHTML = response["mat_khau"];
              err_matKhau.style = "display:block";
            }

            if ("re_mat_khau" in response) {
              err_reMatKhau.innerHTML = response["re_mat_khau"];
              err_reMatKhau.style = "display:block";
            }

            if ("dien_thoai" in response) {
              err_dienThoai.innerHTML = response["dien_thoai"];
              err_dienThoai.style = "display:block";
            }

            if ("gioi_tinh" in response) {
              err_gioiTinh.innerHTML = response["gioi_tinh"];
              err_gioiTinh.style = "display:block";
            }

            if ("nam_sinh" in response) {
              err_namSinh.innerHTML = response["nam_sinh"];
              err_namSinh.style = "display:block";
            }
          } else {
            setTimeout(() => {
              alert("Chúc mừng bạn đã đăng ký thành công!");
              window.location.reload();
            }, 100);
          }


        },
        error: function(xhr, status, error) {
          console.error("Error:", error);
        }
      });
    });
  });
</script>

<!-- Xóa người dùng -->
<script>
  $('#select_all').change(function() {
    if ($(this).is(":checked")) {
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
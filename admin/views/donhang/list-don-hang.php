<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Quản Lý Đơn Hàng | TechZ</title>
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
                <h4 class="mb-sm-0">Quản lý đơn hàng</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Danh sách đơn hàng</h4>

                </div><!-- end card header -->



                <div class="card-body">


                  <div class="live-preview">
                    <div class="row g-4 ">

                      <div class="col-sm">
                        <form class="row g-2 " style="margin-bottom: 0;" action="?" method="get">
                          <div class="col-auto">
                            <label for="inputPassword2" class="visually-hidden"></label>
                            <input type="hidden" name="act" class="form-control" value="don-hangs">
                            <input type="text" name="search" class="form-control" <?php if ($search == "") { ?> placeholder="Từ khóa..." <?php } else { ?> value="<?= $search ?>" <?php } ?>>
                          </div>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Tìm kiếm</button>
                          </div>
                        </form>
                      </div>
                    </div>


                    <div class="table-responsive">


                      <?php if (count($donhangs) != 0) { ?>
                        <table class="table  align-middle table-bordered  mb-0">
                          <thead>
                            <tr>
                              <th class="col-1 text-center" scope="col">ID đơn hàng</th>
                              <th class="col-2 text-center" scope="col">Tên tài khoản</th>
                              <th class="col-2 text-center" scope="col">Hình thức thanh toán</th>
                              <th class="col-2 text-center" scope="col">Trạng thái thanh toán</th>
                              <th class="col-2 text-center" scope="col">Trạng thái đơn hàng</th>
                              <th class="col-1 text-center" scope="col">Hành động</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php foreach ($donhangs as $index => $donHang): ?>
                              <tr>
                                <td class="text-center"><?= $donHang['id_don_hang'] ?></td>
                                <td class="text-center"><?= $donHang['ho_ten'] ?></td>
                                <td class="text-center"><?= $donHang['phuong_thuc_thanh_toan'] ?></td>
                                <td class="text-center">
                                  <div class="d-flex justify-content-center align-items-center">
                                    <div class="form-check form-switch form-switch-md " dir="ltr">
                                      <input type="checkbox" onchange="changeStatusPayment(<?= $donHang['id_don_hang'] ?>,this)" class="form-check-input" <?= $donHang['trang_thai_thanh_toan'] == 'Chưa thanh toán' ? '' : 'checked disabled'  ?>>
                                    </div>
                                    <label id="orderPayment<?= $donHang['id_don_hang'] ?>" class="form-check-label"><?= $donHang['trang_thai_thanh_toan'] == 'Chưa thanh toán' ? 'Chưa thanh toán' : 'Đã thanh toán' ?></label>
                                  </div>
                                </td>
                                <td class="text-center">
                                  <select onchange="changeStatusOrder(<?= $donHang['id_don_hang'] ?>,this)" data-current-status="<?= $donHang['id_trang_thai_don_hang'] ?>" style="color: <?= $donHang['ma_mau'] ?>" class="form-select">
                                    <?php foreach ($trangThaiDonHangs as $row) { ?>
                                      <option style="color: <?= $row['ma_mau'] ?>;" value="<?= $row['id'] ?>" <?= $donHang['id_trang_thai_don_hang'] == $row['id'] ? 'selected' : '' ?>><?= $row['ten'] ?></option>
                                    <?php } ?>
                                  </select>
                                </td>
                                <td>
                                  <div class="d-flex justify-content-center align-items-center hstack gap-3 flex-wrap">
                                    <a href="?act=chi-tiet-don-hang&id=<?= $donHang["id_don_hang"] ?>" class="btn btn-sm btn-light">Chi tiết</a>
                                  </div>
                                </td>


                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      <?php } else { ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                          <p class="fs-2">Không tìm thấy đơn hàng !</p>
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

  <script>
    function changeStatusOrder(orderId, selectElement) {
      let trangThaiDonHangs = <?php echo $json_trangThaiDonHangs; ?>;
      let idsStatus = trangThaiDonHangs.map(trangThaiDonHang => trangThaiDonHang.id)
      console.log(idsStatus);

      // Lấy trạng thái hiện tại và trạng thái mới
      // alert(1);
      const newStatus = Number(selectElement.value);
      const selectedOption = $(selectElement).find(':selected');
      const newColor = selectedOption.css('color');
      const currentStatus = Number($(selectElement).data('current-status'));
      // const color = String(newColor);

      // console.log(newStatus);
      // console.log(currentStatus);
      // console.log(idsStatus.indexOf(currentStatus));
      // console.log(idsStatus.indexOf(Number(newStatus)));

      if (idsStatus.indexOf(currentStatus) < idsStatus.indexOf(newStatus)) {
        $.ajax({
          url: '?act=thay-doi-trang-thai-don-hang',
          type: 'POST',
          data: {
            order_id: orderId,
            status: newStatus
          },
          success: function(response) {
            // Cập nhật trạng thái hiện tại trong select
            $(selectElement).data('current-status', newStatus);
            $(selectElement).css('color', newColor);
            // $(selectElement).attr('style', `color: ${newColor};`);
            alert(response); // Thông báo thành công
          },
          error: function(error) {
            console.error("Error:", error);
            alert("Lỗi trong quá trình trình xử lý");
          }
        });
      } else {
        alert("Không thể quay lại trạng thái trước đó.");
        $(selectElement).val(currentStatus);
      }
    }

    function changeStatusPayment(orderId, checkbox) {
      // Kiểm tra trạng thái
      const newStatus = checkbox.checked ? 'Đã thanh toán' : 'Chưa thanh toán';

      //Kiểm tra nếu chưa thanh toán, thì thanh toán
      if (newStatus == 'Đã thanh toán') {
        $.ajax({
          url: '?act=cap-nhat-trang-thai-thanh-toan',
          type: 'POST',
          data: {
            order_id: orderId,
            payment_status: newStatus
          },
          success: function(response) {
            // Cập nhật trạng thái trong giao diện
            alert(response);
            $('#orderPayment' + orderId).text('Đã thanh toán');
            $(checkbox).prop('disabled', true); // Vô hiệu hóa toggle switch sau khi cập nhật
          },
          error: function(error) {
            console.error("Error:", error);
            // checkbox.checked = false; // Reset lại toggle nếu có lỗi
          }
        });
      } else {
        alert('Không thể thay đổi trạng thái khi đã thanh toán');
        checkbox.checked = true;
      }
    }
  </script>

</body>


</html>
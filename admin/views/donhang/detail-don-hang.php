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
                            <div class="card" id="demo">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-header border-bottom-dashed p-4">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h3>Chi tiết đơn hàng</h3>
                                                    <div class="mt-sm-5 mt-4">
                                                        <h6 class="text-muted text-uppercase fw-semibold">Thông tin đơn hàng</h6>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end card-header-->
                                    </div><!--end col-->
                                    <div class="col-lg-12 ">
                                        <div class="card-body p-4">
                                            <div class="row g-3">
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Mã đơn hàng</p>
                                                    <h5 class="fs-14 mb-0"><span id="invoice-no"><?= $donHang['id'] ?></span></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Ngày đặt</p>
                                                    <h5 class="fs-14 mb-0"><span id="invoice-date"><?= date("d-m-Y", strtotime($donHang['ngay_dat_hang']))  ?></span> </h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Trạng thái thanh toán</p>
                                                    <?php if ($donHang['trang_thai_thanh_toan'] == "Đã thanh toán") { ?>
                                                        <span class="badge bg-success-subtle text-success fs-11" id="payment-status"><?= $donHang['trang_thai_thanh_toan'] ?></span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-warning-subtle text-danger fs-11" id="payment-status"><?= $donHang['trang_thai_thanh_toan'] ?></span>
                                                    <?php } ?>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Trạng thái đơn hàng</p>
                                                    <h5 class="fs-14 mb-0"><span id="total-amount" style="color: <?= $donHang['ma_mau'] ?>;"><?= $donHang['ten_trang_thai_don_hang'] ?></span></h5>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-body-->
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="card-body p-4 border-top border-top-dashed">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Người đặt hàng</h6>
                                                    <p class="fw-medium mb-2" id="billing-name"><?= $donHang['ho_ten'] ?></p>
                                                    <p class="text-muted mb-1" id="billing-address-line-1">Email: <?= $donHang['email'] ?></p>
                                                    <p class="text-muted mb-1"><span>Số điện thoại: </span><span id="billing-phone-no"><?= $donHang['dien_thoai'] ?></span></p>

                                                </div>
                                                <!--end col-->
                                                <div class="col-6">
                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Địa chỉ giao hàng</h6>
                                                    <p class="fw-medium mb-2" id="shipping-name"><?= $donHang['dia_chi'] ?></p>
                                                    <p class="text-muted mb-1" id="shipping-address-line-1">Người nhận: <?= $donHang['ten_nguoi_nhan'] ?></p>
                                                    <p class="text-muted mb-1"><span>Số điện thoại: </span><span id="shipping-phone-no"><?= $donHang['so_dien_thoai'] ?></span></p>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-body-->
                                        <div class="card-body p-4 border-top border-top-dashed border-bottom  ">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Ghi Chú</h6>
                                            <p class="text-muted mb-1" id="shipping-address-line-1"><?= $donHang['ghi_chu'] ?></p>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12 ">
                                        <div class="card-body p-4">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Sản phẩm đặt hàng</h6>
                                            <div class="table-responsive">
                                                <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr class="table-active">
                                                            <th scope="col" style="width: 50px;">STT</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Giá</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col" class="text-end">Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="products-list">

                                                        <?php foreach ($sanPhamDonHang as $index => $sanPham): ?>
                                                            <tr>
                                                                <th scope="row"><?= $index + 1 ?></th>
                                                                <td class="text-start d-flex">
                                                                    <img src="<?= $sanPham['image_url'] ?>" alt="" class="me-2 rounded" height="40">
                                                                    <span class="fw-medium"><?= $sanPham['ten'] ?></span>

                                                                </td>
                                                                <td><?= $sanPham['gia_ban'] ?></td>
                                                                <td><?= $sanPham['so_luong'] ?></td>
                                                                <td class="text-end"><?= $sanPham['gia']  ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>


                                                    </tbody>
                                                </table><!--end table-->
                                            </div>
                                            <div class="border-top border-top-dashed mt-2">
                                                <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                                    <tbody>
                                                        <tr>
                                                            <td>Tổng tiền</td>
                                                            <td class="text-end"><?= $donHang['tong_tien'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phí ship</td>
                                                            <td class="text-end"><?= $donHang['tien_ship'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mã giảm giá<small class="text-muted">(<?= $donHang['ten_ma_khuyen_mai'] ?>)</small></td>
                                                            <td class="text-end">- <?= $donHang['giam_gia'] ?></td>
                                                        </tr>

                                                        <tr class="border-top border-top-dashed fs-15">
                                                            <th scope="row">Thành tiền</th>
                                                            <th class="text-end"><?= $donHang['thanh_toan'] ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!--end table-->
                                            </div>
                                            <div class="mt-3">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Thanh toán</h6>
                                                <p class="text-muted mb-1">Phương thức thanh toán: <span class="fw-medium" id="payment-method"><?= $donHang['phuong_thuc_thanh_toan'] ?></span></p>
                                                <p class="text-muted">Số tiền thanh toán: <span class="fw-medium" id=""></span><span id="card-total-amount"><?= $donHang['thanh_toan'] ?></span></p>
                                            </div>

                                        </div>
                                        <!--end card-body-->
                                    </div><!--end col-->
                                </div><!--end row-->
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
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Thêm Mới Sản Phẩm | TechZ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />

  <!-- CSS -->
  <?php
  require_once "views/layouts/libs_css.php";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- tool edit mô tả chi tiết -->
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
                <h4 class="mb-sm-0">Quản lý sản phẩm</h4>
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Thêm mới sản phẩm</h4>

                </div><!-- end card header -->



                <div class="card-body">

                  <form action="?act=them-san-pham" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Tên sản phẩm</label>
                          <input placeholder="Nhập tên sản phẩm" name="ten" value="" type="text" class="form-control" id="gen-info-email-input">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['ten']) ? $_SESSION['errors']['ten'] : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Mô tả</label>
                          <input placeholder="Nhập mô tả" name="mo_ta" value="" type="text" class="form-control" id="gen-info-username-input">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Danh mục</label>
                          <select name="danh_muc" class="form-select">
                            <option selected disabled>Chọn danh mục</option>
                            <?php foreach ($danhMucs as $row) { ?>
                              <option value="<?= $row['id'] ?>"><?= $row['ten'] ?></option>
                            <?php } ?>

                          </select>
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['danh_muc']) ? $_SESSION['errors']['danh_muc'] : '' ?>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Giá nhập</label>
                          <input placeholder="Nhập giá nhập" name="gia_nhap" value="" type="number" class="form-control" id="gen-info-email-input">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['gia_nhap']) ? $_SESSION['errors']['gia_nhap'] : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Giá bán</label>
                          <input placeholder="Nhập giá bán" name="gia_ban" value="" type="number" class="form-control" id="gen-info-email-input">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Giá khuyến mãi</label>
                          <input placeholder="Nhập giá khuyến mãi" name="gia_khuyen_mai" value="" type="number" class="form-control" id="gen-info-email-input">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['gia_khuyen_mai']) ? $_SESSION['errors']['gia_khuyen_mai'] : '' ?>
                          </span>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Ngày nhập hàng</label>
                          <input type="date" name="ngay_nhap" class="form-control" id="exampleInputdate">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['ngay_nhap']) ? $_SESSION['errors']['ngay_nhap'] : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Số lượng</label>
                          <input placeholder="Nhập số lượng" name="so_luong" value="" type="number" class="form-control" id="gen-info-email-input">
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Trạng thái</label>
                          <select name="trang_thai" class="form-select">
                            <option selected disabled>Chọn trạng thái</option>
                            <option value="1">Ẩn</option>
                            <option value="2">Hiển thị</option>
                          </select>
                          <span class="text-danger">
                            <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class=" mb-3">
                      <label for="hinh_anh" class="form-label d-block">Album ảnh</label>
                      <input type="file" name="hinh_anh[]" multiple class="form-control">
                      <span class="text-danger">
                        <?= !empty($_SESSION['errors']['hinh_anh_product']) ? $_SESSION['errors']['hinh_anh_product'] : '' ?>
                      </span>

                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlTextarea5" class="form-label">Mô tả chi tiết </label>
                      <textarea class="form-control ckeditor" id="ckeditor" name="mo_ta_chi_tiet"></textarea>
                      <span class="text-danger">
                        <?= !empty($_SESSION['errors']['mo_ta_chi_tiet']) ? $_SESSION['errors']['mo_ta_chi_tiet'] : '' ?>
                      </span>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">Thêm mới</button>
                  </form>
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

  <!-- JAVASCRIPT editer mô tả chi tiết -->
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


  <!-- JAVASCRIPT -->
  <?php
  require_once "views/layouts/libs_js.php";
  ?>

</body>


</html>
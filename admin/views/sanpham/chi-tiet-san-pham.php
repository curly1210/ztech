<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Chi Tiết Sản Phẩm | TechZ</title>
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
                    <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                  </ol>
                </div>

              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Chi tiết sản phẩm (Trạng thái: <?= $sanPham['trang_thai'] == 1 ? 'ẩn' : 'hiển thị' ?>)</h4>

                </div><!-- end card header -->



                <div class="card-body">

                  <div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Tên sản phẩm</label>
                          <input value="<?= $sanPham["ten"] ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Mô tả</label>
                          <input value="<?= $sanPham["mo_ta"] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Danh mục</label>
                          <input value="<?= $danhMuc['ten'] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Giá nhập</label>
                          <input value="<?= $sanPham["gia_nhap"] ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Giá bán</label>
                          <input value="<?= $sanPham["gia_ban"] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Giá khuyến mãi</label>
                          <input value="<?= $sanPham['gia_khuyen_mai'] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-email-input">Ngày nhập</label>
                          <input value="<?php echo date("d/m/Y", strtotime($sanPham['ngay_nhap'])) ?>" readonly type="text" class="form-control" id="gen-info-email-input">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Hàng tồn kho</label>
                          <input value="<?= $sanPham["hang_ton_kho"] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="gen-info-username-input">Lượt xem</label>
                          <input value="<?= $sanPham['luot_xem'] ?>" readonly type="text" class="form-control" id="gen-info-username-input">
                        </div>
                      </div>
                    </div>


                    <div class="mb-3">
                      <label class="form-label" for="gen-info-username-input">Hình ảnh</label>
                      <div class="row row-cols-5 g-5 ">
                        <?php foreach ($hinh_anhs as $row) { ?>
                          <div style="max-height: 200px;" class="col overflow-hidden"><img style="width: 100%;" src="<?= $row['hinh_anh'] ?>" alt=""></div>
                        <?php } ?>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="gen-info-username-input">Mô tả chi tiết</label>
                      <div>
                        <textarea id="ckeditor" readonly style="width: 50%;height: 100px;"><?= $sanPham['mo_ta_chi_tiet'] ?></textarea>
                      </div>

                    </div>





                  </div>

                </div><!-- end card-body -->
              </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Bình luận sản phẩm</h4>

                </div><!-- end card header -->

                <div class="card-body">
                  <div class="table-responsive">
                    <?php if (count($binh_luans) != 0) { ?>
                      <table class="table  align-middle table-bordered   mb-0">
                        <thead>
                          <tr>
                            <th class="col-1 text-center" scope="col">STT</th>
                            <th class="col-3 text-center" scope="col">Nội dung</th>
                            <th class="col-3 text-center" scope="col">Người bình luận</th>
                            <th class="col-3 text-center" scope="col">Ngày bình luận</th>
                            <th class="col-3 text-center" scope="col">Hành động</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php foreach ($binh_luans as $index => $row): ?>
                            <tr>
                              <td class="text-center"><?= $index + 1 ?></td>
                              <td class="text-center"><?= $row['noi_dung'] ?>cuong</td>
                              <td class="text-center"><?= $row['ho_ten'] ?></td>
                              <td class="text-center"><?php echo date("H:i:s d/m/Y", strtotime($row['ngay_binh_luan'])) ?></td>
                              <td class="text-center align-middle">
                                <div class="hstack justify-content-center align-items-center fs-20">
                                  <form action="?act=xoa-binh-luan" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa bình luận này không?')">
                                    <input type="hidden" name="id_binh_luan" value="<?= $row['id_binh_luan'] ?>">
                                    <input type="hidden" name="id_san_pham" value="<?= $row['id_san_pham'] ?>">
                                    <button type="submit" class="link-danger" style="border: none; background:none"><i class="ri-delete-bin-5-line"></i></button>
                                  </form>
                                </div>
                              </td>


                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php } else { ?>
                      <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                        <p class="fs-2">Không có bình luận !</p>
                      </div>
                    <?php } ?>
                  </div>
                </div>

              </div><!-- end card-body -->
            </div><!-- end card -->
            <div class="col-12">
              <div class="card">
                <div class="card-header  ">
                  <h4 class="card-title mb-0 flex-grow-1">Đánh giá sản phẩm</h4>

                </div><!-- end card header -->

                <div class="card-body">
                  <div class="table-responsive">
                    <?php if (count($danhGias) != 0) { ?>
                      <table class="table  align-middle table-bordered   mb-0">
                        <thead>
                          <tr>
                            <th class="col-1 text-center" scope="col">STT</th>
                            <th class="col-3 text-center" scope="col">Nội dung</th>
                            <th class="col-3 text-center" scope="col">Người đánh giá</th>
                            <th class="col-3 text-center" scope="col">Ngày đánh giá</th>
                            <th class="col-1 text-center" scope="col">Hành động</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php foreach ($danhGias as $index => $row): ?>
                            <tr>
                              <td class="text-center"><?= $index + 1 ?></td>
                              <td class="text-center"><?= $row['noi_dung'] ?></td>
                              <td class="text-center"><?= $row['ho_ten'] ?></td>
                              <td class="text-center"><?php echo date("H:i:s d/m/Y", strtotime($row['ngay_danh_gia'])) ?></td>

                              <td class="text-center align-middle">
                                <div class="hstack justify-content-center align-items-center fs-20">
                                  <form action="?act=xoa-danh-gia" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa đánh giá này không?')">
                                    <input type="hidden" name="id_danh_gia" value="<?= $row['id_danh_gia'] ?>">
                                    <input type="hidden" name="id_san_pham" value="<?= $row['id_san_pham'] ?>">
                                    <button type="submit" class="link-danger" style="border: none; background:none"><i class="ri-delete-bin-5-line"></i></button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php } else { ?>
                      <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                        <p class="fs-2">Không có đánh giá !</p>
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
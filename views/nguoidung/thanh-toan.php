<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="images/favicon.png" rel="shortcut icon" />
  <title>Thanh toán | TechZ</title>

  <style>
    /* Modal overlay */
    .modal-load {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Màu nền mờ */
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      /* Hiển thị trên cùng */
      display: none;
      /* Ẩn mặc định */
    }

    /* Spinner */
    .spinner {
      width: 50px;
      height: 50px;
      border: 5px solid rgba(255, 255, 255, 0.2);
      border-top: 5px solid white;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    /* Animation */
    @keyframes spin {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }
  </style>

  <!--====== Google Font ======-->
  <?php require_once "views/layout/lib_css.php" ?>
</head>

<body class="config">
  <div class="preloader is-active">
    <div class="preloader__wrap">
      <img class="preloader__img" src="images/preloader.png" alt="" />
    </div>
  </div>

  <!--====== Main App ======-->
  <div id="app">
    <!--====== Main Header ======-->
    <?php require_once "views/layout/header.php" ?>
    <!--====== End - Main Header ======-->

    <!--====== App Content ======-->
    <div class="app-content">
      <!--====== Section 1 ======-->
      <div class="u-s-p-y-60">
        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="breadcrumb">
              <div class="breadcrumb__wrap">
                <ul class="breadcrumb__list">
                  <li class="has-separator">
                    <a href="?act=/">Trang chủ</a>
                  </li>
                  <li class="is-marked">
                    <a href="?act=form-thanh-toan">Thanh toán</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section 1 ======-->

      <!--====== Section 2 ======-->
      <div class="u-s-p-b-60">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div id="checkout-msg-group"></div>
            </div>
          </div>
        </div>
        <div class="section__text-wrap">
          <h1 class="section__heading u-c-secondary">THANH TOÁN</h1>
        </div>
      </div>

      <?php if (count($gioHangs) == 0) { ?>

        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 u-s-m-b-30">
              <div class="empty">
                <div class="empty__wrap">

                  <span class="empty__big-text"><img style="width: 200px;" src="https://cdn-icons-png.flaticon.com/512/11329/11329060.png" alt=""></span>

                  <!-- <span class="empty__text-1">Giỏ hàng trống</span> -->

                  <a class="empty__redirect-link btn--e-brand" href="?act=list-san-pham">TIẾP TỤC MUA SẮM</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      <?php } else {  ?>
        <!--====== End - Section 2 ======-->

        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">
          <!--====== Section Content ======-->
          <div class="section__content">
            <form id="formCheckOut" class="container">
              <div class="checkout-f">
                <div class="row">
                  <div class="col-lg-6">
                    <h1 class="checkout-f__h1">THÔNG TIN ĐỊA CHỈ</h1>
                    <div class="checkout-f__delivery">
                      <div class="u-s-m-b-30">


                        <!--====== First Name, Last Name ======-->
                        <div class="gl-inline">
                          <div class="u-s-m-b-15">
                            <div style="display: flex; align-items: center; gap:10px">
                              <label class="gl-label" for="billing-fname">HỌ VÀ TÊN *</label>
                              <span id="err_hoTen" style="margin-bottom: 8px; font-size: 14px; color: red;"></span>
                            </div>

                            <input name="ho_ten" value="<?= $nguoiDung['ho_ten'] ?>" class="input-text input-text--primary-style" type="text" placeholder="Nhập họ tên" id="billing-fname" data-bill="" />
                          </div>

                        </div>
                        <!--====== End - First Name, Last Name ======-->

                        <!--====== E-MAIL ======-->
                        <div class="u-s-m-b-15">
                          <div style="display: flex; align-items: center; gap:10px">
                            <label class="gl-label" for="billing-email">E-MAIL *</label>
                            <span id="err_email" style="margin-bottom: 8px; font-size: 14px; color: red;"></span>
                          </div>

                          <input name="email" value="<?= $nguoiDung['email'] ?>" class="input-text input-text--primary-style" type="text" id="billing-email" placeholder="Nhập email" data-bill="" />
                        </div>
                        <!--====== End - E-MAIL ======-->

                        <!--====== PHONE ======-->
                        <div class="u-s-m-b-15">
                          <div style="display: flex; align-items: center; gap:10px">
                            <label class="gl-label" for="billing-phone">SỐ ĐIỆN THOẠI *</label>
                            <span id="err_dienThoai" style="margin-bottom: 8px; font-size: 14px; color: red;"></span>
                          </div>

                          <input name="so_dien_thoai" value="<?= $nguoiDung['dien_thoai'] ?>" class="input-text input-text--primary-style" type="text" id="billing-phone" placeholder="Nhập số điện thoại" data-bill="" />
                        </div>
                        <!--====== End - PHONE ======-->

                        <!--====== Street Address ======-->
                        <div class="u-s-m-b-15">
                          <div style="display: flex; align-items: center; gap:10px">
                            <label class="gl-label" for="billing-street">ĐỊA CHỈ NHẬN HÀNG *</label>
                            <span id="err_diaChi" style="margin-bottom: 8px; font-size: 14px; color: red;"></span>
                          </div>

                          <input name="dia_chi" value="<?= $nguoiDung['dia_chi'] ?>" class="input-text input-text--primary-style" type="text" id="billing-street" placeholder="Nhập địa chỉ nhận hàng" data-bill="" />
                        </div>


                        <div class="u-s-m-b-10"><label class="gl-label" for="order-note">GHI CHÚ</label>
                          <textarea name="ghi_chu" class="text-area text-area--primary-style" placeholder="Nhập ghi chú" id="order-note"></textarea>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <h1 class="checkout-f__h1">THÔNG TIN ĐƠN HÀNG</h1>

                    <!--====== Order Summary ======-->
                    <div class="o-summary">
                      <div class="o-summary__section u-s-m-b-30">
                        <div class="o-summary__item-wrap gl-scroll">
                          <?php foreach ($gioHangs as $sanPham) { ?>
                            <div class="o-card">
                              <div class="o-card__flex">
                                <div class="o-card__img-wrap">
                                  <img class="u-img-fluid" src="<?= 'admin/' . $sanPham['url_anh'] ?>" alt="" />
                                </div>
                                <div class="o-card__info-wrap">
                                  <span class="o-card__name"> <a href="?act=chi-tiet-san-pham&id=<?= $sanPham['id_san_pham'] ?>"><?= $sanPham['ten_san_pham'] ?></a></span>

                                  <span class="o-card__quantity">Số lượng x <?= $sanPham['so_luong'] ?></span>

                                  <span class="o-card__price"><?= number_format($sanPham['gia']) . "đ" ?></span>
                                </div>
                              </div>

                              <a class="o-card__del far fa-trash-alt"></a>
                            </div>
                          <?php } ?>

                        </div>
                      </div>


                      <div class="o-summary__section u-s-m-b-30">
                        <div class="msg" style="box-shadow: none">
                          <span class="msg__text">Bạn có voucher? <a class="gl-link" href="#have-coupon" data-toggle="collapse" aria-expanded="true">Click vào đây để nhập code</a></span>
                          <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group" style="">
                            <div class="c-f u-s-m-b-16">
                              <span class="gl-text u-s-m-b-16">Nhập mã phiếu giảm giá nếu bạn có.</span>
                              <div class="c-f__form">
                                <div class="u-s-m-b-16" style="width: 250px;">
                                  <div class="u-s-m-b-15">
                                    <label for="coupon"></label>

                                    <input name="ma_khuyen_mai" class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Mã khuyến mãi">
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <a id="check-coupon" style="display: block;text-align: center; padding: 12px 18px;" class="btn btn--e-transparent-brand-b-2">ÁP DỤNG</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="o-summary__section u-s-m-b-30">
                        <div class="o-summary__box">
                          <table class="o-summary__table">
                            <tbody>
                              <tr>
                                <td>TỔNG TIỀN</td>
                                <td id="tong_tien"><?= number_format($tongTien) . "đ" ?></td>
                              </tr>
                              <tr>
                                <td>TIỀN SHIP</td>
                                <td>30,000đ</td>
                              </tr>
                              <tr>
                                <td>KHUYẾN MÃI</td>
                                <td id="tien_khuyen_mai">0đ</td>
                              </tr>

                              <tr>
                                <td>THANH TOÁN</td>
                                <td id="thanh_toan"><?= number_format($tongTien + 30000) . "đ" ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="o-summary__section u-s-m-b-30">
                        <div class="o-summary__box">
                          <h1 class="checkout-f__h1">PHƯƠNG THỨC THANH TOÁN</h1>
                          <div class="checkout-f__payment">
                            <div class="u-s-m-b-20">
                              <!--====== Radio Box ======-->
                              <div class="radio-box">
                                <input type="radio" id="cash-on-delivery" value="COD" name="phuong_thuc" />
                                <div class="radio-box__state radio-box__state--primary">
                                  <label class="radio-box__label" for="cash-on-delivery">COD (Thanh toán khi nhận hàng)</label>
                                </div>
                              </div>
                              <!--====== End - Radio Box ======-->

                              <!-- <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span> -->
                            </div>

                            <!-- <div class="u-s-m-b-10">
                            <div class="radio-box">
                              <input type="radio" id="pay-with-card" name="payment" />
                              <div class="radio-box__state radio-box__state--primary">
                                <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label>
                              </div>
                            </div>

                            <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                          </div> -->

                            <span id="err_phuongThuc" style="color: red; font-size: 14px;margin-bottom: 20px; display: block;"></span>
                            <div>
                              <button class="btn btn--e-brand-b-2" type="submit">THANH TOÁN</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--====== End - Order Summary ======-->
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!--====== End - Section Content ======-->
        </div>

      <?php } ?>
      <!--====== End - Section 3 ======-->
    </div>
    <!--====== End - App Content ======-->

    <!--====== Main Footer ======-->
    <?php require_once "views/layout/footer.php" ?>

    <!--====== Modal Section ======-->


    <!--====== End - Shipping Address Add Modal ======-->


    <!--====== End - Shipping Address Add Modal ======-->
    <!--====== End - Modal Section ======-->
  </div>

  <div id="loadingModal" class="modal-load">
    <div class="spinner"></div>
  </div>
  <!--====== End - Main App ======-->

  <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
  <script>
    window.ga = function() {
      ga.q.push(arguments);
    };
    ga.q = [];
    ga.l = +new Date();
    ga("create", "UA-XXXXX-Y", "auto");
    ga("send", "pageview");
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

  <!--====== Vendor Js ======-->
  <?php require_once "views/layout/lib_js.php" ?>



  <script>
    $(document).ready(function() {


      $('#check-coupon').click(function() {
        let idKhuyenMai = $('#coupon').val();

        $.ajax({
          url: "?act=check-coupon",
          type: "POST",
          data: {
            id: idKhuyenMai,
          }, // Lấy dữ liệu form
          success: function(response) {
            response = JSON.parse(response);
            let tongTien = parseInt(formatStringToNumber($('#tong_tien').text()));

            if (response.check == 1 || response.check == 0) {
              $('#coupon').val('');
              $('#tien_khuyen_mai').text('0đ');
              $('#thanh_toan').text((tongTien + 30000).toLocaleString('en-US') + 'đ');

            } else if (response.check == 2) {
              let khuyenMai = parseInt(response.gia);

              $('#tien_khuyen_mai').text('-' + khuyenMai.toLocaleString('en-US') + 'đ');
              if (tongTien + 30000 - khuyenMai < 0) {

                $('#thanh_toan').text('0đ');
              } else {
                $('#thanh_toan').text((tongTien + 30000 - khuyenMai).toLocaleString('en-US') + 'đ');
              }

            }
            setTimeout(() => {

              alert(response.message);
            }, 100);


          },
          error: function(error) {
            console.error("Error:", error);
          }
        });
      });

      $("#formCheckOut").submit(function(event) {
        event.preventDefault(); // Ngăn chặn form nạp lại trang
        const modal = document.getElementById("loadingModal");
        modal.style.display = "flex"; // Hiển thị modal
        document.body.style.overflow = "hidden"; // Ngăn cuộn trang

        $("#err_hoTen").text('');
        $("#err_email").text('');
        $("#err_dienThoai").text('');
        $("#err_diaChi").text('');
        $("#err_phuongThuc").text('');

        // alert("hello");
        $.ajax({
          url: "?act=thanh-toan",
          type: "POST",
          data: $(this).serialize(), // Lấy dữ liệu form
          success: function(response) {
            // alert(response);
            modal.style.display = "none";
            document.body.style.overflow = "auto";
            // alert(response);
            response = JSON.parse(response);

            if (response['check'] == 1) {
              if ("ho_ten" in response) {
                $("#err_hoTen").text(response['ho_ten']);
              }
              if ("email" in response) {
                $("#err_email").text(response['email']);
              }
              if ("so_dien_thoai" in response) {
                $("#err_dienThoai").text(response['so_dien_thoai']);
              }
              if ("dia_chi" in response) {
                $("#err_diaChi").text(response['dia_chi']);
              }
              if ("phuong_thuc" in response) {
                $("#err_phuongThuc").text(response['phuong_thuc']);
              }
            } else {
              if ("check_quantity" in response) {
                alert("Sản phẩm mua vượt quá số lượng trong kho");
              } else {

                window.location.href = "?act=dat-hang-thanh-cong";
              }
            }
          },
          error: function(error) {
            console.error("Error:", error);
          }
        });
      });

    });
  </script>
  <!--====== Noscript ======-->
  <noscript>
    <div class="app-setting">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="app-setting__wrap">
              <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

              <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </noscript>
</body>

</html>
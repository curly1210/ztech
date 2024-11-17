<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Đăng ký | TechZ</title>

  <!--====== Google Font ======-->
  <?php require_once "views/layout/lib_css.php" ?>
</head>

<body class="config">
  <div class="preloader is-active">
    <div class="preloader__wrap">

      <img class="preloader__img" src="images/preloader.png" alt="">
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

                    <a href="?act=form-dang-ky">Đăng ký</a>
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

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-30">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__text-wrap">
                  <h1 class="section__heading u-c-secondary">TẠO TÀI KHOẢN</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="row row--center">
              <div class="col-lg-6 col-md-8 u-s-m-b-30">
                <div class="l-f-o">
                  <div class="l-f-o__pad-box">
                    <h1 class="gl-h1">THÔNG TIN CÁ NHÂN</h1>
                    <form class="l-f-o__form" id="addUserForm">

                      <div class="gl-inline" style="align-items: stretch;">
                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="reg-fname">HỌ VÀ TÊN *</label>
                          <input name="ho_ten" class="input-text input-text--primary-style" type="text" placeholder="Nhập họ tên">
                          <div id="err_hoTen" style="color: red; font-size: small;"></div>
                        </div>

                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="reg-email">E-MAIL *</label>
                          <input name="email" class="input-text input-text--primary-style" type="text" placeholder="Nhập E-mail">
                          <div id="err_email" style="color: red; font-size: small;"></div>
                        </div>
                      </div>

                      <div class="gl-inline" style="align-items: stretch;">
                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="reg-fname">MẬT KHẨU *</label>
                          <input name="mat_khau" class="input-text input-text--primary-style" type="password" placeholder="Nhập mật khẩu">
                          <div id="err_matKhau" style="color: red; font-size: small;"></div>
                        </div>

                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="reg-email">XÁC NHẬN MẬT KHẨU *</label>
                          <input name="re_mat_khau" class="input-text input-text--primary-style" type="password" placeholder="Nhập lại mật khẩu">
                          <div id="err_reMatKhau" style="color: red; font-size: small;"></div>
                        </div>
                      </div>

                      <div class="gl-inline" style="align-items: stretch;">
                        <div class="u-s-m-b-30">
                          <!--====== Date of Birth Select-Box ======-->
                          <span class="gl-label">SINH NHẬT</span>
                          <div class="gl-dob">
                            <input name="nam_sinh" type="date" class="select-box select-box--primary-style">
                          </div>
                          <div id="err_namSinh" style="color: red; font-size: small;"></div>
                          <!--====== End - Date of Birth Select-Box ======-->
                        </div>

                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="gender">GIỚI TÍNH</label>
                          <select name="gioi_tinh" class="select-box select-box--primary-style u-w-100" id="gender">
                            <option disabled selected>Lựa chọn</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                          </select>
                          <div id="err_gioiTinh" style="color: red; font-size: small;"></div>
                        </div>
                      </div>

                      <div class="gl-inline" style="align-items: stretch;">
                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="reg-fname">ĐIỆN THOẠI *</label>
                          <input name="dien_thoai" class="input-text input-text--primary-style" type="text" placeholder="Nhập số điện thoại">
                          <div id="err_dienThoai" style="color: red; font-size: small;"></div>
                        </div>

                        <div class="u-s-m-b-30">
                          <label class="gl-label" for="reg-email">ĐỊA CHỈ *</label>
                          <input name="dia_chi" class="input-text input-text--primary-style" type="text" placeholder="Nhập địa chỉ">
                          <div id="err_diaChi" style="color: red; font-size: small;"></div>
                        </div>
                      </div>

                      <div class="u-s-m-b-15" style="display: flex; justify-content: center;">

                        <div style="display: flex; flex-direction: column; gap: 10px;">
                          <button class="btn btn--e-transparent-brand-b-2" type="submit">Đăng ký</button>
                          <a class="gl-link" href="#">Return to Store</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->


    <!--====== Main Footer ======-->
    <?php require_once "views/layout/footer.php" ?>
  </div>
  <!--====== End - Main App ======-->


  <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
  <script>
    window.ga = function() {
      ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>

  <!--====== Vendor Js ======-->
  <?php require_once "views/layout/lib_js.php" ?>

  <script>
    $(document).ready(function() {
      $("#addUserForm").submit(function(event) {
        event.preventDefault(); // Ngăn chặn form nạp lại trang

        $.ajax({
          url: "?act=dang-ky",
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
            const err_diaChi = document.getElementById("err_diaChi");

            err_hoTen.innerHTML = "";
            err_email.innerHTML = "";
            err_matKhau.innerHTML = "";
            err_reMatKhau.innerHTML = "";
            err_dienThoai.innerHTML = "";
            err_gioiTinh.innerHTML = "";
            err_namSinh.innerHTML = "";
            err_diaChi.innerHTML = "";

            if (response['check'] == 1) {
              if ("ho_ten" in response) {
                err_hoTen.innerHTML = response["ho_ten"];
                // err_hoTen.style = "display:block";
              }

              if ("email" in response) {
                err_email.innerHTML = response["email"];
                // err_email.style = "display:block";
              }
              if ("mat_khau" in response) {
                err_matKhau.innerHTML = response["mat_khau"];
                // err_matKhau.style = "display:block";
              }

              if ("re_mat_khau" in response) {
                err_reMatKhau.innerHTML = response["re_mat_khau"];
                // err_reMatKhau.style = "display:block";
              }

              if ("dien_thoai" in response) {
                err_dienThoai.innerHTML = response["dien_thoai"];
                // err_dienThoai.style = "display:block";
              }

              if ("gioi_tinh" in response) {
                err_gioiTinh.innerHTML = response["gioi_tinh"];
                // err_gioiTinh.style = "display:block";
              }

              if ("nam_sinh" in response) {
                err_namSinh.innerHTML = response["nam_sinh"];
                // err_namSinh.style = "display:block";
              }

              if ("dia_chi" in response) {
                err_diaChi.innerHTML = response["dia_chi"];
                // err.dia_chi.style = "display:block";
              }
            } else {
              setTimeout(() => {
                alert("Chúc mừng bạn đã đăng ký thành công!");
                window.location = "?act=/";
                // window.location.reload();
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
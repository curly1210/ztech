<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Quên mật khẩu | TechZ</title>

  <!--====== Google Font ======-->
  <?php require_once "views/layout/lib_css.php" ?>

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

                    <a href="?act=form-email-quen-mat-khau">Quên mật khẩu</a>
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
        <div class="section__intro u-s-m-b-60">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__text-wrap">
                  <h1 class="section__heading u-c-secondary">QUÊN MẬT KHẨU?</h1>
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
                    <h1 class="gl-h1">ĐẶT LẠI MẬT KHẨU</h1>

                    <span class="gl-text u-s-m-b-30">Điền email vào ô bên dưới, chúng tôi sẽ gửi mã xác nhận để đặt lại khẩu của bạn</span>
                    <form id="formForgetPassword" class="l-f-o__form">
                      <div class="u-s-m-b-30">

                        <label class="gl-label" for="reset-email">E-MAIL *</label>

                        <input class="input-text input-text--primary-style" type="text" name="email" id="reset-email" placeholder="Điền email">
                        <span id="err_email" style="color: red; margin-top: 5px; display: block;"></span>
                      </div>
                      <div class="u-s-m-b-30">

                        <button class="btn btn--e-transparent-brand-b-2" type="submit">GỬI</button>
                      </div>
                      <div class="u-s-m-b-30">

                        <a class="gl-link" href="?act=form-dang-nhap">Trang đăng nhập</a>
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

  <div id="loadingModal" class="modal-load">
    <div class="spinner"></div>
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

      // Thêm nhiều sản phẩm
      $("#formForgetPassword").submit(function(event) {
        event.preventDefault();
        const modal = document.getElementById("loadingModal");
        modal.style.display = "flex"; // Hiển thị modal
        document.body.style.overflow = "hidden"; // Ngăn cuộn trang
        $.ajax({
          url: '?act=kiem-tra-email',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            console.log(response);
            // alert(response);
            modal.style.display = "none";
            document.body.style.overflow = "auto";

            response = JSON.parse(response);
            if (!response['check']) {
              $("#err_email").text(response['error']);
            } else {
              window.location = "?act=form-verify-code"
            }

            // alert(response['check_login']);
            // if (!response['check_login']) {
            //   openModalCheckLogin();
            // } else {
            //   alert(response['message']);
            // }
          },
          error: function() {
            alert("Lỗi");
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
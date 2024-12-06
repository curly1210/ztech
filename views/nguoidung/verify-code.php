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
                  <h1 class="section__heading u-c-secondary">XÁC THỰC MÃ</h1>
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

                    <span class="gl-text u-s-m-b-30">Code đã được gửi tới <?= $_SESSION['forget_password']['email'] ?>. Vui lòng nhập mã xác thực. Mã có hiệu lực trong vòng 5 phút.</span>
                    <form id="formVerifyCode" class="l-f-o__form">
                      <div class="u-s-m-b-30">

                        <label class="gl-label" for="reset-email">Mã xác thực *</label>

                        <input class="input-text input-text--primary-style" type="text" name="code" id="verifyCode" placeholder="Nhập mã xác thực">
                        <span id="err_code" style="color: red; margin-top: 5px; display: block;"></span>
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
      $("#formVerifyCode").submit(function(event) {
        event.preventDefault();

        $.ajax({
          url: '?act=kiem-tra-code',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {

            // alert(response);

            response = JSON.parse(response);
            if (!response['check']) {
              $("#err_code").text(response['error']);
            } else {
              // console.log("mã hợp lệ");
              window.location = "?act=form-doi-mat-khau"
            }


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
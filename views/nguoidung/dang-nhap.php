<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Đăng nhập | TechZ</title>

  <!--====== Google Font ======-->
  <?php require_once "views/layout/lib_css.php"  ?>
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

                    <a href="signin.html">Đăng nhập</a>
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
        <div class="section__intro u-s-m-b-40">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__text-wrap">
                  <h1 class="section__heading u-c-secondary">ĐĂNG NHẬP</h1>
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
                    <h1 class="gl-h1">BẠN LÀ KHÁCH HÀNG MỚI</h1>

                    <div class="u-s-m-b-15">

                      <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="?act=form-dang-ky">TẠO TÀI KHOẢN</a>
                    </div>
                    <h1 class="gl-h1">Đăng nhập</h1>

                    <form class="l-f-o__form" action="?act=dang-nhap" method="post">

                      <div class="u-s-m-b-30">
                        <div style="display: flex; align-items: center;gap: 10px; color: red; font-size: small;">
                          <label class="gl-label" for="login-email">E-MAIL *</label>
                          <span style="margin-bottom: 8px;"><?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?></span>
                        </div>

                        <input class="input-text input-text--primary-style" type="text" name="email" id="login-email" placeholder="Nhập mật khẩu">
                      </div>
                      <div class="u-s-m-b-30">
                        <div style="display: flex; align-items: center;gap: 10px; color: red; font-size: small;">
                          <label class="gl-label" for="login-password">MẬT KHẨU *</label>
                          <span style="margin-bottom: 8px;"><?= !empty($_SESSION['errors']['matKhau']) ? $_SESSION['errors']['matKhau'] : '' ?></span>
                        </div>

                        <input class="input-text input-text--primary-style" name="mat_khau" type="password" id="login-password" placeholder="Nhập mật khẩu">
                      </div>
                      <div class="gl-inline">
                        <div class="u-s-m-b-30">

                          <button class="btn btn--e-transparent-brand-b-2" type="submit">Đăng Nhập</button>
                        </div>
                        <div class="u-s-m-b-30">

                          <a class="gl-link" href="lost-password.html">Quên mật khẩu</a>
                        </div>
                      </div>
                      <div class="u-s-m-b-30">

                        <!--====== Check Box ======-->
                        <!-- <div class="check-box">

                          <input type="checkbox" id="remember-me">
                          <div class="check-box__state check-box__state--primary">

                            <label class="check-box__label" for="remember-me">Remember Me</label>
                          </div>
                        </div> -->
                        <!--====== End - Check Box ======-->
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

  <?php unset($_SESSION['errors']); ?>

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
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Giỏ hàng | TechZ</title>

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

                    <a href="?act=gio-hangs">Giỏ hàng </a>
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
                  <h1 class="section__heading u-c-secondary">ĐẶT HÀNG THÀNH CÔNG</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->


        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 u-s-m-b-30">
              <div class="empty">
                <div class="empty__wrap">

                  <span class="empty__big-text"><img style="width: 200px;" src="https://cdn-icons-png.flaticon.com/512/14090/14090371.png" alt=""></span>

                  <!-- <span class="empty__text-1">Giỏ hàng trống</span> -->

                  <a class="empty__redirect-link btn--e-brand" href="?act=list-san-pham">TIẾP TỤC MUA SẮM</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 2 ======-->


      <!--====== Section 3 ======-->

      <!--====== End - Section 3 ======-->
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
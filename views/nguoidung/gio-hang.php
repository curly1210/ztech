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
                  <h1 class="section__heading u-c-secondary">GIỎ HÀNG</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->

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


          <!--====== Section Content ======-->
          <div class="section__content" style="margin-bottom: 60px;">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                  <div style="height: 485px" class="table-responsive">
                    <table class="table-p">
                      <tbody>
                        <?php foreach ($gioHangs as $product) { ?>
                          <tr>
                            <td>
                              <div class="table-p__box">
                                <div class="table-p__img-wrap">

                                  <img class="u-img-fluid" src="<?= 'admin/' . $product['url_anh'] ?>" alt="">
                                </div>
                                <div class="table-p__info">

                                  <span class="table-p__name">

                                    <a href="product-detail.html"><?= $product['ten_san_pham'] ?></a></span>

                                  <span class="table-p__category">

                                    <a href="shop-side-version-2.html"><?= $product['ten_danh_muc'] ?></a></span>
                                  <!-- <ul class="table-p__variant-list">
                                    <li>

                                      <span>Size: 22</span>
                                    </li>
                                    <li>

                                      <span>Color: Red</span>
                                    </li>
                                  </ul> -->
                                </div>
                              </div>
                            </td>
                            <td>

                              <span class="table-p__price"><?= number_format($product['gia']) . "đ" ?></span>
                            </td>
                            <td>
                              <div class="table-p__input-counter-wrap">

                                <!--====== Input Counter ======-->
                                <div class="input-counter">

                                  <span style="display: inline-block;line-height: 50px;" class="input-counter__minus fas fa-minus"></span>

                                  <input class="input-counter__text input-counter--text-primary-style" type="text" value="<?= $product['so_luong'] ?>" data-min="1" data-max="1000">

                                  <span style="display: inline-block;line-height: 50px;" class="input-counter__plus fas fa-plus"></span>
                                </div>
                                <!--====== End - Input Counter ======-->
                              </div>
                            </td>
                            <td>

                              <span class="table-p__price"><?= number_format($product['gia'] * $product['so_luong']) . "đ" ?></span>
                            </td>
                            <td>
                              <div class="table-p__del-wrap">

                                <a class="far fa-trash-alt table-p__delete-link" onclick="return confirm('Xác nhận xóa sản phẩm trong giỏ hàng.')" href="?act=xoa-gio-hang&id=<?= $product['id_san_pham'] ?>"></a>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="route-box">
                    <div class="route-box__g1">

                      <a class="route-box__link" href="?act=list-san-pham"><i class="fas fa-long-arrow-alt-left"></i>

                        <span>Tiếp tục mua sắm</span></a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                    <form class="f-cart">
                      <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">

                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                          <div class="f-cart__pad-box">
                            <div class="u-s-m-b-30">
                              <table class="f-cart__table">
                                <tbody>
                                  <tr>
                                    <td>SHIPPING</td>
                                    <td>$4.00</td>
                                  </tr>
                                  <tr>
                                    <td>TAX</td>
                                    <td>$0.00</td>
                                  </tr>
                                  <tr>
                                    <td>SUBTOTAL</td>
                                    <td>$379.00</td>
                                  </tr>
                                  <tr>
                                    <td>GRAND TOTAL</td>
                                    <td>$379.00</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div>

                              <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--====== End - Section Content ======-->
          </div>

        <?php } ?>
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
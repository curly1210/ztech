<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Yêu thích | Ztech</title>

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

                    <a href="?act=list-yeu-thich">Yêu thích</a>
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
                  <h1 class="section__heading u-c-secondary">Danh sách yêu thích</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->


        <?php if (count($listLikeProduct) == 0) { ?>
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 u-s-m-b-30">
                <div class="empty">
                  <div class="empty__wrap">

                    <span class="empty__big-text"><img style="width: 200px;" src="https://cdn-icons-png.flaticon.com/512/1376/1376786.png" alt=""></span>

                    <!-- <span class="empty__text-1">Giỏ hàng trống</span> -->

                    <a class="empty__redirect-link btn--e-brand" href="?act=list-san-pham">TIẾP TỤC MUA SẮM</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        <?php } else { ?>
          <!--====== Section Content ======-->
          <div class="section__content">
            <div class="container">
              <div class="row">
                <div style="max-height: 576px; overflow-x: auto;" class="col-lg-12 col-md-12 col-sm-12">

                  <?php foreach ($listLikeProduct as $product) {  ?>
                    <div class="w-r u-s-m-b-30">
                      <div class="w-r__container">
                        <div class="w-r__wrap-1">
                          <div class="w-r__img-wrap">

                            <img style="object-fit: contain;" class="u-img-fluid" src="<?= 'admin/' . $product['url'] ?>" alt="">
                          </div>
                          <div class="w-r__info">

                            <span class="w-r__name">

                              <a href="product-detail.html"><?= $product['ten_san_pham'] ?></a></span>

                            <span class="w-r__category">

                              <a href="shop-side-version-2.html"><?= $product['ten_danh_muc'] ?></a></span>

                            <span class="w-r__price"><?= number_format($product['gia_khuyen_mai']) . " đ" ?>

                              <span class="w-r__discount"><?= number_format($product['gia_ban']) . " đ" ?></span></span>
                          </div>
                        </div>
                        <div class="w-r__wrap-2">

                          <a class="w-r__link btn--e-brand-b-2 add-one-to-cart" data-id="<?= $product['id'] ?>">THÊM VÀO GIỎ HÀNG</a>

                          <a class="w-r__link btn--e-transparent-platinum-b-2" href="?act=chi-tiet-san-pham&id=<?= $product['id'] ?>">XEM CHI TIẾT</a>

                          <a class="w-r__link btn--e-transparent-platinum-b-2" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" href="?act=xoa-yeu-thich&id=<?= $product['id'] ?>">XÓA</a>
                        </div>
                      </div>
                    </div>
                  <?php } ?>




                  <!--====== End - Wishlist Product ======-->
                </div>
                <div class="col-lg-12">
                  <div class="route-box">
                    <div class="route-box__g">

                      <a class="route-box__link" href="?act=list-san-pham"><i class="fas fa-long-arrow-alt-left"></i>

                        <span>TIẾP TỤC MUA SẮM</span></a>
                    </div>
                    <div class="route-box__g">

                      <a class="route-box__link" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" href="?act=xoa-list-yeu-thich"><i class="fas fa-trash"></i>

                        <span>XÓA DANH SÁCH YÊU THÍCH</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->


    <!--====== Main Footer ======-->
    <?php require_once "views/layout/footer.php" ?>

    <!--====== Modal Section ======-->



    <!--====== End - Add to Cart Modal ======-->
    <!--====== End - Modal Section ======-->
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

  <?php require_once "views/layout/lib_js.php" ?>

  <script>
    $(document).ready(function() {

      // Thêm 1 sản phẩm vào giỏ hàng
      $('.add-one-to-cart').on('click', function(e) {
        // e.preventDefault();

        const IdProduct = $(this).data('id'); // Lấy ID sản phẩm từ thuộc tính data-id

        $.ajax({
          url: '?act=them-gio-hang',
          type: 'POST',
          data: {
            id: IdProduct
          },
          success: function(response) {
            response = JSON.parse(response);

            // alert(response['check_login']);
            if (!response['check_login']) {
              openModalCheckLogin();
            } else {
              alert(response['message']);
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
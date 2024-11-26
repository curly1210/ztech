<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="images/favicon.png" rel="shortcut icon" />
  <title><?= $sanPham['ten'] ?> | Ztech</title>

  <style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .like-product {
      cursor: pointer;
      transition: all 0.2s;
    }

    .like-product:hover {
      color: red;
    }
  </style>

  <!--====== Google Font ======-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" />

  <!--====== Vendor Css ======-->
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
      <div class="u-s-p-t-90">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <!--====== Product Breadcrumb ======-->
              <div class="pd-breadcrumb u-s-m-b-30">
                <ul class="pd-breadcrumb__list">
                  <li class="has-separator">
                    <a href="?act=/">Trang chủ</a>
                  </li>
                  <li class="has-separator">
                    <a href="?act=list-san-pham&category=<?= $idDanhMuc ?>"><?= $tenDanhMuc ?></a>
                  </li>

                  <li class="is-marked">
                    <a href="?act=chi-tiet-san-pham&id=<?= $idSanPham ?>"><?= $sanPham['ten'] ?></a>
                  </li>
                </ul>
              </div>
              <!--====== End - Product Breadcrumb ======-->

              <!--====== Product Detail Zoom ======-->
              <div class="pd u-s-m-b-30">
                <div class="slider-fouc pd-wrap">
                  <div id="pd-o-initiate">
                    <?php foreach ($hinhAnhs as $row) { ?>
                      <div class="pd-o-img-wrap" data-src="<?= 'admin/' . $row['hinh_anh'] ?>">
                        <img style="width: 445px; height: 445px; object-fit: contain; " class="u-img-fluid" src="<?= 'admin/' . $row['hinh_anh'] ?>" data-zoom-image="<?= 'admin/' . $row['hinh_anh'] ?>" alt="" />
                      </div>
                    <?php } ?>

                  </div>

                  <span class="pd-text">Click for larger zoom</span>
                </div>
                <div class="u-s-m-t-15">
                  <div class="slider-fouc">
                    <div id="pd-o-thumbnail">
                      <?php foreach ($hinhAnhs as $row) { ?>
                        <div>
                          <img style="width: 112px; height: 112px; object-fit: contain" class="u-img-fluid" src="<?= 'admin/' . $row['hinh_anh'] ?>" alt="" />
                        </div>
                      <?php } ?>

                    </div>
                  </div>
                </div>
              </div>
              <!--====== End - Product Detail Zoom ======-->
            </div>
            <div class="col-lg-7">
              <!--====== Product Right Side Details ======-->
              <div class="pd-detail">
                <div>
                  <span class="pd-detail__name"><?= $sanPham['ten'] ?></span>
                </div>
                <div>
                  <div class="pd-detail__inline">
                    <span class="pd-detail__price"><?= number_format($sanPham['gia_khuyen_mai']) . " đ" ?></span>

                    <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del"><?= number_format($sanPham['gia_ban']) . " đ" ?></del>
                  </div>
                </div>
                <div class="u-s-m-b-15">
                  <div class="pd-detail__rating gl-rating-style">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                    <span class="pd-detail__review u-s-m-l-4"> <a data-click-scroll="#view-review">23 Reviews</a></span>
                  </div>
                </div>
                <div class="u-s-m-b-15">
                  <div class="pd-detail__inline">
                    <span class="pd-detail__stock">Số lượng: <?= $sanPham['hang_ton_kho'] ?></span>

                    <!-- <span class="pd-detail__left">Only 2 left</span> -->
                  </div>
                </div>
                <div class="u-s-m-b-15">
                  <span class="pd-detail__preview-desc"><?= $sanPham['mo_ta'] ?></span>
                </div>
                <div class="u-s-m-b-15">
                  <div class="pd-detail__inline">
                    <span class="pd-detail__click-wrap">
                      <i data-id="<?= $sanPham['id'] ?>" <?php if (isset($_SESSION['user']) && $checkLike) echo 'style="color:red"' ?> class="fa-solid fa-heart like-product u-s-m-r-6"></i>


                      <!-- <i class="far fa-heart u-s-m-r-6"></i> -->

                      <a href="#">Yêu thích sản phẩm</a>

                      <span class="pd-detail__click-count">(222)</span></span>
                  </div>
                </div>
                <div class="u-s-m-b-15">
                  <div class="pd-detail__inline">
                    <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                      <a href="signin.html">Email cho bạn khi khuyến mãi</a>

                      <span class="pd-detail__click-count">(20)</span></span>
                  </div>
                </div>
                <div class="u-s-m-b-15">
                  <ul class="pd-social-list">
                    <li>
                      <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                      <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                    </li>
                    <li>
                      <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                  </ul>
                </div>
                <div class="u-s-m-b-15">
                  <form id="formAddToCart" class="pd-detail__form">
                    <div class="pd-detail-inline-2">
                      <div class="u-s-m-b-15">
                        <!--====== Input Counter ======-->
                        <div class="input-counter">
                          <span style="display: inline-block;line-height: 50px;" class="input-counter__minus fas fa-minus"></span>

                          <input name="quantity" class="input-counter__text input-counter--text-primary-style" type="number" value="1" data-min="1" data-max="1000" />

                          <span style="display: inline-block;line-height: 50px;" class="input-counter__plus fas fa-plus"></span>
                        </div>
                        <input name="id" value="<?= $sanPham['id'] ?>" type="hidden">
                        <!--====== End - Input Counter ======-->
                      </div>
                      <div class="u-s-m-b-15">
                        <button class="btn btn--e-brand-b-2" type="submit">Thêm vào giỏ hàng</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="u-s-m-b-15">
                  <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                  <ul class="pd-detail__policy-list">
                    <li>
                      <i class="fas fa-check-circle u-s-m-r-8"></i>

                      <span>Buyer Protection.</span>
                    </li>
                    <li>
                      <i class="fas fa-check-circle u-s-m-r-8"></i>

                      <span>Full Refund if you don't receive your order.</span>
                    </li>
                    <li>
                      <i class="fas fa-check-circle u-s-m-r-8"></i>

                      <span>Returns accepted if product not as described.</span>
                    </li>
                  </ul>
                </div>
              </div>
              <!--====== End - Product Right Side Details ======-->
            </div>
          </div>
        </div>
      </div>

      <!--====== Product Detail Tab ======-->
      <div class="u-s-p-y-90">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pd-tab">
                <div class="u-s-m-b-30">
                  <ul class="nav pd-tab__list">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#pd-desc">Mô tả chi tiết</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#pd-tag">Đánh giá <span>(<?= count($danhGias) ?>)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="view-review" data-toggle="tab" href="#pd-rev">Bình luận

                        <span>(<?= count($binhLuans) ?>)</span></a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content">
                  <!--====== Tab 1 ======-->
                  <div class="tab-pane fade show active" id="pd-desc">
                    <div class="pd-tab__desc">
                      <div>
                        <?= $sanPham['mo_ta_chi_tiet'] ?>
                      </div>
                    </div>
                  </div>
                  <!--====== End - Tab 1 ======-->

                  <!--====== Tab 2 ======-->
                  <div class="tab-pane" id="pd-tag">
                    <div class="pd-tab__tag">
                      <div class="u-s-m-b-30">
                        <form class="pd-tab__rev-f1">
                          <div class="rev-f1__group">
                            <div class="u-s-m-b-15">
                              <h2><?= count($danhGias) ?> đánh giá cho "<?= $sanPham['ten'] ?>"</h2>
                            </div>
                          </div>
                          <div style="display: flex; gap: 30px;">
                            <div class="rev-f1__review" style="overflow: auto; max-height: 290px; width: 100%;">
                              <?php foreach ($danhGias as $row) { ?>
                                <div class="review-o u-s-m-b-15">
                                  <div class="review-o__info u-s-m-b-8">
                                    <span class="review-o__name"><?= $row['ho_ten'] ?></span>

                                    <span class="review-o__date"><?= $row['ngay_danh_gia'] ?></span>
                                  </div>

                                  <p class="review-o__text">
                                    <?php for ($x = 0; $x < $row['sao']; $x++) { ?>
                                      <i style="color: #ff9600;" class="fas fa-star"></i>
                                    <?php } ?>
                                    <?php for ($x = 0; $x < 5 - $row['sao']; $x++) { ?>
                                      <i style="color: #ff9600;" class="far fa-star"></i>
                                    <?php } ?>
                                  </p>
                                </div>
                              <?php } ?>




                            </div>

                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                  <!--====== End - Tab 2 ======-->

                  <!--====== Tab 3 ======-->
                  <div class="tab-pane" id="pd-rev">
                    <div class="pd-tab__rev">

                      <div class="u-s-m-b-30">
                        <div class="pd-tab__rev-f1">
                          <div class="rev-f1__group">
                            <div class="u-s-m-b-15">
                              <h2><?= count($binhLuans) ?> bình luận cho "<?= $sanPham['ten'] ?>"</h2>
                            </div>
                          </div>
                          <div style="display: flex; gap: 30px;">
                            <div class="rev-f1__review" style="overflow: auto; max-height: 290px; width: 50%;">
                              <?php foreach ($binhLuans as $row) { ?>
                                <div class="review-o u-s-m-b-15">
                                  <div class="review-o__info u-s-m-b-8">
                                    <span class="review-o__name"><?= $row['ho_ten'] ?></span>

                                    <span class="review-o__date"><?= $row['ngay_binh_luan'] ?></span>
                                  </div>

                                  <p class="review-o__text"><?= $row['noi_dung'] ?></p>
                                </div>
                              <?php } ?>


                            </div>
                            <div style="width: 50%; align-self: stretch;">
                              <form id="formComment" action="?act=gui-binh-luan" method="post" onsubmit="return checkLoginComment(<?= isset($_SESSION['user']) ? '1' : '0' ?>)" class="pd-tab__rev-f2">


                                <div class="u-s-m-b-15">
                                  <label class="gl-label" for="reviewer-text">Bình luận *</label>
                                  <textarea name="binh_luan" style="width: 100%;height: 120px;" class="text-area text-area--primary-style" id="comment-text"></textarea>
                                  <span id="err_binh_luan" style="margin-bottom: 8px;color: red;"><?= !empty($_SESSION['errors']['binh_luan']) ? $_SESSION['errors']['binh_luan'] : '' ?></span>
                                </div>

                                <input name="id_nguoi_dung" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : '' ?>" type="hidden">
                                <input name="id_san_pham" value="<?= $sanPham['id'] ?>" type="hidden">

                                <div>
                                  <button id="sendComment" style="font-weight: 600; padding: 16px 46px;display: block;" class="btn btn--e-brand-shadow" type="submit">Gửi</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <!--====== End - Tab 3 ======-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Product Detail Tab ======-->
      <div class="u-s-p-b-90">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__text-wrap">
                  <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM LIÊN QUAN</h1>

                  <!-- <span class="section__span u-c-grey">SẢN PHẨM KHÁCH HÀNG QUAN TÂM</span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="slider-fouc">
              <div class="owl-carousel product-slider" data-item="4">

                <?php foreach ($listSanPham as $row) { ?>
                  <div class="u-s-m-b-30">
                    <div class="product-o product-o--hover-on">
                      <div class="product-o__wrap">
                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html"> <img style="object-fit: contain;" class="aspect__img" src="<?= "admin/" . $row['url']  ?>" alt="" /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">
                            <li>
                              <a href="?act=chi-tiet-san-pham&id=<?= $row['id'] ?>" data-tooltip="tooltip" sdata-placement="top" title="Xem chi tiết"><i class="fas fa-search-plus"></i></a>
                            </li>
                            <li>
                              <a class="add-one-to-cart" data-id="<?= $row['id'] ?>" data-tooltip="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fas fa-plus-circle"></i></a>
                            </li>


                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category"> <a href="shop-side-version-2.html"><?= $tenDanhMuc ?></a></span>

                      <span class="product-o__name"> <a href="?act=chi-tiet-san-pham&id=<?= $row['id'] ?>"><?= $row['ten'] ?></a></span>
                      <div class="product-o__rating gl-rating-style">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                        <span class="product-o__review">(20)</span>
                      </div>

                      <span class="product-o__price">
                        <?= number_format($row['gia_khuyen_mai']) . " đ" ?>
                        <span class="product-o__discount"><?= number_format($row['gia_ban']) . " đ" ?></span>
                      </span>
                    </div>
                  </div>
                <?php } ?>


              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->

    <!--====== Main Footer ======-->
    <?php require_once "views/layout/footer.php" ?>

    <!--====== Modal Section ======-->


    <!--====== End - Add to Cart Modal ======-->
    <!--====== End - Modal Section ======-->
  </div>

  <!-- <div id="myselfModal"></div> -->
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
  <!-- <?php require_once "views/layout/lib_js.php" ?> -->

  <!-- Xử lý comment -->
  <script>
    const sendCommentEle = document.getElementById('sendComment');
    const commentText = document.getElementById('comment-text');
    const errBinhLuan = document.getElementById('err_binh_luan');

    const formCommentEle = document.getElementById("formComment")

    function checkLoginComment(login) {
      if (login == 1) {
        // return true;
        if (commentText.value.trim() == "") {
          errBinhLuan.innerHTML = "Vui lòng điền bình luận";
          return false;
        } else {
          return true;
        }
      } else {
        openModalCheckLogin();

        return false;
      }

    }
  </script>

  <!-- Thêm sản phẩm vào giỏ hàng -->
  <script>
    $(document).ready(function() {
      // Thêm 1 sản phẩm ở danh sách sản phẩm ở mục liên quan
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

      // Thêm nhiều sản phẩm
      $("#formAddToCart").submit(function(event) {
        event.preventDefault();
        $.ajax({
          url: '?act=them-gio-hang',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            // alert(response);

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

      // Yêu thích sản phẩm
      $('.like-product').on('click', function(e) {
        // event.preventDefault();
        const idProduct = $(this).data('id');
        let heart = this;
        $.ajax({
          url: '?act=yeu-thich-san-pham',
          type: 'POST',
          data: {
            idProduct: idProduct
          },
          success: function(response) {

            response = JSON.parse(response);

            if (!response['check_login']) {
              openModalCheckLogin();
            } else {
              if (response['status_like']) {
                // console.log($(this));
                // alert($(this));

                // $(this).attr("style", "color: red; ");
                heart.style.color = "red";
                alert("Yêu thích sản phẩm thành công.");
              } else {
                // console.log($(this));
                // $(this).attr("style", "color: green; ");
                heart.style.color = "";
                alert("Bỏ yêu thích sản phẩm thành công.");

              }
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
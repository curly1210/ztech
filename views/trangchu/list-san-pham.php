<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Danh sách sản phẩm | Ztech</title>

  <!--====== Google Font ======-->
  <?php require_once "views/layout/lib_css.php" ?>

  <style>
    .like-product {
      cursor: pointer;
      transition: all 0.2s;
    }

    .like-product:hover {
      color: red;
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
      <div class="u-s-p-y-90">
        <div class="container">
          <div class="row">
            <form action="?" method="get" class="col-lg-3 col-md-12">
              <div class="shop-w-master">
                <div class="u-s-m-b-30" style="display: flex; justify-content: space-between; align-items: center;">

                  <h1 class="shop-w-master__heading "><i class="fas fa-filter u-s-m-r-8"></i>

                    <span>BỘ LỌC</span>
                  </h1>
                  <a href="?act=list-san-pham" style=" padding: 10px 10px; border-radius: 6px;" class="btn btn--e-transparent-brand-b-2" type="submit">Xóa bộ lọc</a>
                </div>
                <div class="shop-w-master__sidebar sidebar--bg-snow">
                  <div class="u-s-m-b-30">
                    <div class="shop-w">
                      <div class="shop-w__intro-wrap">
                        <h1 class="shop-w__h">DANH MỤC</h1>

                      </div>
                      <div class="shop-w__wrap">
                        <ul sty class="shop-w__category-list gl-scroll category-list" id="category-list">

                          <?php foreach ($danhMucs as $row) { ?>
                            <?php if ($category == $row['id']) { ?>
                              <li data-value="<?= $row['id'] ?>" class="active" style="display: flex; align-items: center; gap:10px;margin-bottom: 10px;" class="">
                                <img style="width: 50px;height: 40px;" src="<?= 'admin/' . $row['hinh_anh'] ?>" alt="">
                                <?= $row['ten'] ?>
                              </li>
                            <?php } else { ?>
                              <li data-value="<?= $row['id'] ?>" style="display: flex; align-items: center; gap:10px;margin-bottom: 10px;" class="">
                                <img style="width: 50px;height: 40px;" src="<?= 'admin/' . $row['hinh_anh'] ?>" alt="">
                                <?= $row['ten'] ?>
                              </li>

                            <?php } ?>
                          <?php } ?>

                        </ul>
                      </div>
                    </div>
                  </div>

                  <input type="hidden" name="act" value="list-san-pham" />
                  <input type="hidden" name="category" id="selected-category" value="<?= $category ?>" />
                  <input type="hidden" name="search" id="selected-category" value="<?= $search ?>" />

                  <div class="">
                    <div class="shop-w">
                      <div class="shop-w__intro-wrap">
                        <h1 class="shop-w__h">GIÁ SẢN PHẨM</h1>
                      </div>
                      <div class="shop-w__wrap collapse show" id="s-price">
                        <div class="shop-w__form-p">
                          <div class="shop-w__form-p-wrap">
                            <div class="">
                              <div style="font-size: 14px; margin-bottom: 0;font-weight: 600;">TỪ</div>

                              <label for="price-min"></label>
                              <input min="0" style="width: 100px;" value=<?= $min ?> name="min" class="input-text input-text--primary-style" type="number" id="price-min" placeholder="Min">
                            </div>
                            <div>
                              <div style="font-size: 14px; margin-bottom: 0;font-weight: 600;">ĐẾN</div>

                              <label for="price-max"></label>
                              <input min="0" style="width: 100px;" value=<?= $max ?> name="max" class="input-text input-text--primary-style" type="number" id="price-max" placeholder="Max">
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="">
                    <div class="shop-w">
                      <div class="shop-w__intro-wrap">
                        <h1 class="shop-w__h">SẮP XẾP THEO</h1>

                      </div>
                      <div class="shop-w__wrap collapse show" id="s-shipping">
                        <ul class="shop-w__list gl-scroll">
                          <li style="display: flex; flex-direction: column; gap: 20px;">
                            <!--====== Check Box ======-->
                            <div style="display: flex; align-items: center; " class="check-box">
                              <input type="radio" name="arrange" id="increase" <?= $arrange == 1 ? 'checked' : '' ?> value="1" />
                              <div class="check-box__state check-box__state--primary">
                                <label class="check-box__label" for="increase">Giá tăng dần</label>
                              </div>
                            </div>

                            <div style="display: flex; align-items: center; " class="check-box">
                              <input type="radio" name="arrange" id="reduce" <?= $arrange == 2 ? 'checked' : '' ?> value="2" />
                              <div class="check-box__state check-box__state--primary">
                                <label class="check-box__label" for="reduce">Giá giảm dần</label>
                              </div>
                            </div>
                            <!--====== End - Check Box ======-->
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="shop-w__wrap" style="padding-top: 0;">
                    <!-- <a href="?act=form-dang-ky" style="width: 100%;display: flex; justify-content: center; padding: 10px 0; border-radius: 6px;" class="btn btn--e-transparent-brand-b-2" type="submit">Đăng ký</a> -->
                    <button style="padding: 10px 10px; border-radius: 6px; background-color: #ff4500; color:white;" class="btn btn--e-transparent-brand-b-2 " type="submit">Lọc sản phẩm</button>
                  </div>

                </div>
              </div>
            </form>


            <div class="col-lg-9 col-md-12">
              <div class="shop-p">
                <div class="shop-p__toolbar u-s-m-b-30">

                  <div class="shop-p__tool-style">
                    <div class=" u-s-m-b-8">

                      <p>Từ khóa tìm kiếm: <span style="color: #ff4500;">"<?= $search ?>"</span></p>
                    </div>


                  </div>


                </div>

                <?php if (count($products) == 0) { ?>
                  <h2>Không tìm thấy sản phẩm phù hợp</h2>

                <?php } else { ?>

                  <div class="shop-p__collection">
                    <div class="row is-grid-active">
                      <?php foreach ($products as $index => $product) { ?>
                        <div href="?act=chi-tiet-san-pham" class="col-lg-4 col-md-6 col-sm-6">
                          <div class="product-m">
                            <div class="product-m__thumb">

                              <a style="background-color: transparent;" class="aspect aspect--bg-grey aspect--square u-d-block" href="?act=chi-tiet-san-pham&id=<?= $product['id'] ?>">

                                <img class="aspect__img" style="padding: 10px 15px;object-fit: contain;" src="<?= 'admin/' . $product['url'] ?>" alt=""></a>
                              <!-- <div class="product-m__quick-look">

                                  <a class="fas fa-search" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick Look"></a>
                                </div> -->
                              <div class="product-m__add-cart">

                                <a class="btn--e-brand add-one-to-cart" data-id="<?= $product['id'] ?>">Thêm vào giỏ hàng</a>
                              </div>
                            </div>
                            <div class="product-m__content">
                              <div style="display: flex; justify-content: space-between;align-items: center;" class="product-m__category">

                                <a href="#"><?= $product['ten_danh_muc'] ?></a>
                                <?php if (!$product['hang_ton_kho']) { ?>
                                  <span style="font-size: 12px; color: red; padding: 3px 5px; border: 1px solid red; border-radius: 5px;">Hết hàng</span>
                                <?php } ?>
                              </div>
                              <div style="display: flex; justify-content: space-between; align-items: center;" class="product-m__name">
                                <a href="?act=chi-tiet-san-pham&id=<?= $product['id'] ?>"><?= $product['ten'] ?></a>

                              </div>
                              <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="product-m__rating gl-rating-style">
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <span class="product-o__review">(0)</span>
                                </div>
                                <?php if ($product['is_favorite']) { ?>
                                  <i data-id="<?= $product['id'] ?>" style="color: red;" class="fa-solid fa-heart like-product u-s-m-r-6"></i>

                                <?php } else { ?>
                                  <i data-id="<?= $product['id'] ?>" class="fa-solid fa-heart like-product u-s-m-r-6"></i>
                                <?php } ?>
                              </div>


                              <div class="product-m__price"><?= number_format($product['gia_khuyen_mai']) . "đ" ?>
                                <span class="product-m__discount"><?= number_format($product['gia_ban']) . "đ" ?></span>
                              </div>

                            </div>
                          </div>
                        </div>
                      <?php } ?>

                    </div>
                  </div>

                  <div class="u-s-p-y-60" style="display: flex; justify-content: center;">
                    <div class="shop-p__pagination" style="display: flex;">
                      <?php if (ceil($totalProduct / $num_results_on_page) > 0) { ?>
                        <?php if ($page > 1) { ?>
                          <li>
                            <a class="fas fa-angle-left" href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page - 1  ?>"></a>
                          </li>
                        <?php } ?>

                        <?php if ($page > 3) { ?>
                          <li>
                            <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . 1 ?>">1</a>
                          </li>
                          <li>
                            <a class="w-9 h-9 flex items-center justify-center border-2 rounded-lg bg-white border-gray-300  text-gray-600" href="#">...</a>
                          </li>
                        <?php } ?>

                        <?php if ($page - 2 > 0) { ?>
                          <li>
                            <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page - 2 ?>"><?= $page - 2 ?></a>
                          </li>
                        <?php } ?>

                        <?php if ($page - 1 > 0) { ?>
                          <li>
                            <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page - 1 ?>"><?= $page - 1 ?></a>
                          </li>
                        <?php } ?>

                        <li class="is-active">
                          <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page  ?>"><?= $page ?></a>
                        </li>

                        <?php if ($page + 1 < ceil($totalProduct / $num_results_on_page) + 1) { ?>
                          <li>
                            <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page + 1 ?>"><?= $page + 1 ?></a>
                          </li>
                        <?php } ?>

                        <?php if ($page + 2 < ceil($totalProduct / $num_results_on_page) + 1) { ?>
                          <li>
                            <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page + 2 ?>"><?= $page + 2 ?></a>
                          </li>
                        <?php } ?>



                        <?php if ($page < ceil($totalProduct / $num_results_on_page) - 2) { ?>
                          <li>
                            <a style="color: #333333" class="w-9 h-9 flex items-center justify-center border-2 rounded-lg bg-white border-gray-300  text-gray-600" href="#">...</a>
                          </li>
                          <li>
                            <a href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . ceil($totalProduct / $num_results_on_page) ?>"><?= ceil($totalProduct / $num_results_on_page) ?></a>
                          </li>

                        <?php } ?>

                        <?php if ($page < ceil($totalProduct / $num_results_on_page)) { ?>
                          <li>
                            <a class="fas fa-angle-right" href="<?= "?act=list-san-pham&category=" . $category . "&search=" . $search . "&min=" . $min . "&max=" . $max . "&page=" . $page + 1 ?>"></a>
                          </li>
                        <?php } ?>




                      <?php } ?>
                    </div>


                    <!--====== Pagination ======-->
                    <!-- <ul class="shop-p__pagination">
                    <li class="is-active">

                      <a href="shop-grid-left.html">1</a>
                    </li>
                    <li>

                      <a href="shop-grid-left.html">2</a>
                    </li>
                    <li>

                      <a href="shop-grid-left.html">3</a>
                    </li>
                    <li>

                      <a href="shop-grid-left.html">4</a>
                    </li>
                    <li>

                      <a class="fas fa-angle-right" href="shop-grid-left.html"></a>
                    </li>
                  </ul> -->
                    <!--====== End - Pagination ======-->
                  </div>

                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section 1 ======-->
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
    // JavaScript để xử lý khi nhấn vào danh mục
    const categoryList = document.getElementById('category-list');
    const selectedCategoryInput = document.getElementById('selected-category');

    categoryList.addEventListener('click', (event) => {
      const target = event.target.closest('li'); // Đảm bảo chỉ nhấn vào `li`

      if (target) {
        // Xóa trạng thái "active" của tất cả các mục
        document.querySelectorAll('.category-list li').forEach(item => {
          item.classList.remove('active');
        });

        // Thêm trạng thái "active" vào mục được chọn
        target.classList.add('active');

        // Lấy giá trị của danh mục và gán vào input ẩn
        const selectedValue = target.getAttribute('data-value');
        selectedCategoryInput.value = selectedValue;
      }
    });
  </script>

  <script>
    $(document).ready(function() {
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
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="images/favicon.png" rel="shortcut icon" />
  <title>TechZ - Trang Chủ</title>

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
      <!--====== Primary Slider ======-->
      <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1" id="hero-slider">
          <div class="hero-slide hero-slide--1" style="position:relative">
            <img src="<?= 'admin/' . $slides[0]['hinh_anh'] ?>" style="position:absolute; height:auto; width:100%" alt="">
            <div class="container">
              <div class="row">
                <div class="col-12 ">

                  <div class="slider-content slider-content--animation">

                    <span class="content-span-1 u-c-white">Ưu đãi mới</span>

                    <span class="content-span-2 u-c-white">Giảm 30% giá bán</span>

                    <span class="content-span-3 u-c-white">Áp dụng với các sản phẩm công nghệ mới</span>



                    <a class="shop-now-link btn--e-brand" href="#">Mua Ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hero-slide hero-slide--2" style="position:relative">
            <img src="<?= 'admin/' . $slides[1]['hinh_anh'] ?>" style="position:absolute; height:auto; width:100%" alt="">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="slider-content slider-content--animation">
                    <span class="content-span-1 u-c-white">Top xu hướng</span>

                    <span class="content-span-2 u-c-white">Giảm giá 10% </span>

                    <span class="content-span-3 u-c-white">Áp dụng cho sản phẩm xu hướng</span>



                    <a class="shop-now-link btn--e-brand" href="#">Mua Ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hero-slide hero-slide--3" style="position:relative">
            <img src="<?= 'admin/' . $slides[2]['hinh_anh'] ?>" style="position:absolute; height:auto; width:100%" alt="">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="slider-content slider-content--animation">
                    <span class="content-span-1 u-c-white">Top Thương hiệu</span>

                    <span class="content-span-2 u-c-white">Giảm giá 10%</span>

                    <span class="content-span-3 u-c-white">Áp dụng cho sản phẩm thương hiệu lớn</span>




                    <a class="shop-now-link btn--e-brand" href="#">Mua Ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Primary Slider ======-->

      <!--====== Section 1 ======-->
      <div class="u-s-p-y-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__text-wrap">
                  <h1 class="section__heading u-c-secondary u-s-m-b-12">Mua sắm theo ưu đãi</h1>

                  <span class="section__span u-c-silver">Ưu đãi được ưa chuộng</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="row">
              <div class="col-lg-5 col-md-5 u-s-m-b-30">
                <a class="collection" href="#">
                  <div class="aspect aspect--bg-grey aspect--square">
                    <img class="aspect__img collection__img" src="images/collection/download (2).jpg" alt="" />
                  </div>
                </a>
              </div>
              <div class="col-lg-7 col-md-7 u-s-m-b-30">
                <a class="collection" href="#">
                  <div class="aspect aspect--bg-grey aspect--1286-890">
                    <img class="aspect__img collection__img " style="object-fit: cover;" src="images/collection/Galaxy Watch Active vs_ Apple Watch Series 4_ Which is the better deal_ - Video.jpg" alt="" />
                  </div>
                </a>
              </div>
              <div class="col-lg-7 col-md-7 u-s-m-b-30">
                <a class="collection" href="#">
                  <div class="aspect aspect--bg-grey aspect--1286-890">
                    <img class="aspect__img collection__img " style="object-fit: cover;" src="images/collection/5 Best Samsung Smart Watch For Ladies 2021 _ galaxy watch active unboxing.jpg" alt="" />
                  </div>
                </a>
              </div>
              <div class="col-lg-5 col-md-5 u-s-m-b-30">
                <a class="collection" href="#">
                  <div class="aspect aspect--bg-grey aspect--square">
                    <img class="aspect__img collection__img " style="object-fit: cover;" src="images/collection/Asus ROG Strix G16 (2023) Gaming laptop  just in love.jpg" alt="" />
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!--====== Section Content ======-->
      </div>
      <!--====== End - Section 1 ======-->

      <!--====== Section 2 ======-->
      <div class="u-s-p-b-60 ">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-16">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section__text-wrap">
                  <h1 class="section__heading u-c-secondary u-s-m-b-12">Sản phẩm xu hướng</h1>

                  <span class="section__span u-c-silver">Chọn danh mục</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="filter-category-container">
                  <div class="filter__category-wrapper">
                    <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter="*">Tất cả</button>
                  </div>
                  <?php foreach ($danhMucs as $danhMuc): ?>

                    <div class="filter__category-wrapper">
                      <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".<?= str_replace(" ", "-", $danhMuc['ten']) ?>"><?= $danhMuc['ten'] ?></button>
                    </div>

                  <?php endforeach; ?>
                </div>
                <div class="filter__grid-wrapper u-s-m-t-30">
                  <div class="row"></div>

                  <?php

                  foreach ($danhMucs as $danhMuc):

                    foreach ($sanPhams as $sanPham):

                      if ($sanPham['danh_muc_id'] == $danhMuc['id']):


                  ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item <?= str_replace(" ", "-", $danhMuc['ten'])  ?>">
                          <div class="product-o product-o--hover-on product-o--radius">
                            <div class="product-o__wrap">
                              <a class="aspect aspect--bg-grey aspect--square u-d-block" href="?act=chi-tiet-san-pham&id=<?= $sanPham['id'] ?>"> <img class="aspect__img " style="height: 100%; object-fit:contain" src="<?= 'admin/' . $sanPham['url'] ?>" alt="" /></a>
                              <div class="product-o__action-wrap">
                                <ul class="product-o__action-list">
                                  <li>
                                    <a href="?act=chi-tiet-san-pham&id=<?= $sanPham['id'] ?>" data-tooltip="tooltip" sdata-placement="top" title="Xem chi tiết"><i class="fas fa-search-plus"></i></a>
                                  </li>
                                  <li>
                                    <a class="add-one-to-cart" data-id="<?= $sanPham['id'] ?>" data-tooltip="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fas fa-plus-circle"></i></a>
                                  </li>


                                </ul>
                              </div>
                            </div>

                            <span style="display: flex; justify-content: space-between;align-items: center;margin-top: 10px;" class="product-o__category">
                              <a href="shop-side-version-2.html"><?= $danhMuc['ten'] ?></a>
                              <?php if (!$sanPham['hang_ton_kho']) { ?>
                                <span style="font-size: 12px; color: red; padding: 3px 5px; border: 1px solid red; border-radius: 5px;">Hết hàng</span>
                              <?php } ?>
                            </span>

                            <span class="product-o__name">
                              <a href="?act=chi-tiet-san-pham&id=<?= $sanPham['id'] ?>"><?= $sanPham['ten'] ?></a>

                            </span>

                            <div style="display: flex; justify-content: space-between;">
                              <div class="product-o__rating gl-rating-style ">
                                <?php if ($sanPham['so_sao'] != null):
                                  for ($i = 1; $i <= round($sanPham['so_sao']); $i++): ?>
                                    <i class="fas fa-star"></i>
                                  <?php endfor; ?>
                                  <?php for ($i = 1; $i <= 5 - round($sanPham['so_sao']); $i++): ?>
                                    <i class="far fa-star"></i>
                                  <?php endfor; ?>
                                  <span class="product-o__review">(<?= $sanPham['so_danh_gia'] ?>)</span>
                                  <?php foreach ($countBuyProducts as $countBuyProduct): ?>
                                    <span class="product-o__review text-right"> <?= $countBuyProduct['ten_san_pham'] == $sanPham['ten'] ? "Đã bán " . $countBuyProduct['tong_so_luong_ban'] : "" ?></span>
                                  <?php endforeach; ?>
                                <?php else: ?>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <i class="fas fa-star"></i>
                                  <span class="product-o__review">(0)</span>
                                  <?php foreach ($countBuyProducts as $countBuyProduct): ?>
                                    <span class="product-o__review text-right"> <?= $countBuyProduct['ten_san_pham'] == $sanPham['ten'] ? "Đã bán " . $countBuyProduct['tong_so_luong_ban'] : "" ?></span>
                                  <?php endforeach; ?>
                                <?php endif; ?>
                              </div>
                              <div>
                                <?php if ($sanPham['is_favorite']) { ?>
                                  <i data-id="<?= $sanPham['id'] ?>" style="color: red;" class="fa-solid fa-heart like-product u-s-m-r-6"></i>

                                <?php } else { ?>
                                  <i data-id="<?= $sanPham['id'] ?>" class="fa-solid fa-heart like-product u-s-m-r-6"></i>
                                <?php } ?>
                              </div>
                            </div>

                            <span class="product-o__price"><?= number_format($sanPham['gia_khuyen_mai']) . " đ" ?>

                              <span class="product-o__discount" style="color: #ff4500;"><?= number_format($sanPham['gia_ban']) . " đ" ?></span></span>
                          </div>
                        </div>
                  <?php
                      endif;
                    endforeach;
                  endforeach;
                  ?>


                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="load-more">
                <a class="load-more" href="?act=list-san-pham">
                  <button class="btn btn--e-brand" type="button">Xem thêm</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
    <!--====== Section 6 ======-->
    <div class="u-s-p-y-60" style="padding-top:0;">
      <!--====== Section Intro ======-->
      <div class="section__intro u-s-m-b-46">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section__text-wrap">
                <h1 class="section__heading u-c-secondary u-s-m-b-12 ">Sản phẩm mới</h1>

                <span class="section__span u-c-silver">Tìm sản phẩm mới</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Intro ======-->

      <!--====== Section Content ======-->
      <div class="section__content">
        <div class="container">
          <div class="row">
            <?php
            foreach ($sanPhamMois as $index => $sanPhamMoi):
              foreach ($danhMucs as $danhMuc):
                if ($sanPhamMoi['danh_muc_id'] == $danhMuc['id']):
            ?>
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="product-o product-o--hover-on u-h-100">
                      <div class="product-o__wrap">
                        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html"> <img class="aspect__img" style="height: 100%; object-fit:contain" src="<?= "admin" . $sanPhamMoi['url'] ?>" alt="" /></a>
                        <div class="product-o__action-wrap">
                          <ul class="product-o__action-list">

                            <li>
                              <a href="?act=chi-tiet-san-pham&id=<?= $sanPhamMoi['id'] ?>" data-tooltip="tooltip" sdata-placement="top" title="Xem chi tiết"><i class="fas fa-search-plus"></i></a>
                            </li>
                            <li>
                              <a class="add-one-to-cart" data-id="<?= $sanPhamMoi['id'] ?>" data-tooltip="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fas fa-plus-circle"></i></a>
                            </li>


                          </ul>
                        </div>
                      </div>

                      <span class="product-o__category"> <a href="shop-side-version-2.html"><?= $danhMuc['ten'] ?></a></span>

                      <span class="product-o__name"> <a href="?act=chi-tiet-san-pham&id=<?= $sanPhamMoi['id'] ?>"><?= $sanPhamMoi['ten'] ?></a></span>
                      <div class="product-o__rating gl-rating-style ">
                        <?php if ($sanPhamMoi['so_sao'] != null):
                          for ($i = 1; $i <= round($sanPhamMoi['so_sao']); $i++): ?>
                            <i class="fas fa-star"></i>
                          <?php endfor; ?>
                          <?php for ($i = 1; $i <= 5 - round($sanPhamMoi['so_sao']); $i++): ?>
                            <i class="far fa-star"></i>
                          <?php endfor; ?>
                          <?php foreach ($countBuyProducts as $countBuyProduct): ?>
                            <span class="product-o__review text-right"> <?= $countBuyProduct['ten_san_pham'] == $sanPhamMoi['ten'] ? "Đã bán " . $countBuyProduct['tong_so_luong_ban'] : "" ?></span>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <span class="product-o__review">(0)</span>
                          <?php foreach ($countBuyProducts as $countBuyProduct): ?>
                            <span class="product-o__review text-right"> <?= $countBuyProduct['ten_san_pham'] == $sanPhamMoi['ten'] ? "Đã bán " . $countBuyProduct['tong_so_luong_ban'] : "" ?></span>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>

                      <span class="product-o__price"><?= number_format($sanPhamMoi['gia_khuyen_mai']) . "đ" ?>

                        <span class="product-o__discount" style="color: #ff4500;"><?= number_format($sanPhamMoi['gia_ban']) . "đ" ?></span></span>
                    </div>
                  </div>
            <?php endif;
              endforeach;
            endforeach;

            ?>

          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 6 ======-->





    <!--====== Section 5 ======-->
    <div class="banner-bg mb-1" style="position:relative;">
      <img src="images/banners/7995937.jpg" style="width: 100%; height:100%" alt="">
      <!--====== Section Content ======-->
      <div class="section__content" style="position: absolute ;  top: 7.2%;  left: 50%; transform: translate(-50%, -50%);">

        <div class="container">

          <div class="row">
            <div class="col-lg-12">
              <div class="banner-bg__countdown">
                <div class="countdown countdown--style-banner" data-countdown="2024/11/20"></div>
              </div>


            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 5 ======-->

    <!--====== Section 4 ======-->
    <div class="u-s-p-b-60 ">
      <!--====== Section Intro ======-->
      <div class="section__intro u-s-m-b-46 ">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section__text-wrap">
                <h1 class="section__heading u-c-secondary u-s-m-b-12">Sản phẩm được ưa thích</h1>

                <span class="section__span u-c-silver">Siêu khuyến mãi</span>
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
              <?php foreach ($sanPhamUaThichs as $sanPhamUaThich):
                foreach ($danhMucs as $danhMuc):
                  if ($sanPhamUaThich['danh_muc_id'] == $danhMuc['id']):
              ?>
                    <div class="u-s-m-b-30">
                      <div class="product-o product-o--hover-on">
                        <div class="product-o__wrap">
                          <a class="aspect aspect--bg-grey aspect--square u-d-block" href="?act=chi-tiet-san-pham&id=<?= $sanPhamUaThich['id'] ?>"> <img class="aspect__img" style="height: 100%; object-fit:contain" src="<?= 'admin/' . $sanPhamUaThich['url'] ?>" alt="" /></a>
                          <div class="product-o__action-wrap">
                            <ul class="product-o__action-list">
                              <li>
                                <a href="?act=chi-tiet-san-pham&id=<?= $sanPhamUaThich['id'] ?>" data-tooltip="tooltip" sdata-placement="top" title="Xem chi tiết"><i class="fas fa-search-plus"></i></a>
                              </li>
                              <li>
                                <a class="add-one-to-cart" data-id="<?= $sanPhamUaThich['id'] ?>" data-tooltip="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><i class="fas fa-plus-circle"></i></a>
                              </li>

                            </ul>
                          </div>
                        </div>

                        <span class="product-o__category"> <a href="#"><?= $danhMuc['ten'] ?></a></span>

                        <span class="product-o__name"> <a href="?act=chi-tiet-san-pham&id=<?= $sanPhamUaThich['id'] ?>"><?= $sanPhamUaThich['ten'] ?></a></span>
                        <div class="product-o__rating gl-rating-style">
                          <?php if ($sanPhamUaThich['so_sao'] != null):
                            for ($i = 1; $i <= round($sanPhamUaThich['so_sao']); $i++): ?>
                              <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <?php for ($i = 1; $i <= 5 - round($sanPhamUaThich['so_sao']); $i++): ?>
                              <i class="far fa-star"></i>
                            <?php endfor; ?>
                            <span class="product-o__review">(<?= $sanPhamUaThich['so_danh_gia'] ?>)</span>
                            <?php foreach ($countBuyProducts as $countBuyProduct): ?>
                              <span class="product-o__review text-right"> <?= $countBuyProduct['ten_san_pham'] == $sanPhamUaThich['ten'] ? "Đã bán " . $countBuyProduct['tong_so_luong_ban'] : "" ?></span>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="product-o__review">(0)</span>

                            <span class="product-o__review">
                              <?php foreach ($countBuyProducts as $countBuyProduct): ?>
                                <span class="product-o__review text-right"> <?= $countBuyProduct['ten_san_pham'] == $sanPhamUaThich['ten'] ? "Đã bán " . $countBuyProduct['tong_so_luong_ban'] : "" ?></span>
                              <?php endforeach; ?>
                            </span>

                          <?php endif; ?>
                        </div>

                        <span class="product-o__price"><?= number_format($sanPhamUaThich['gia_khuyen_mai']) . 'đ' ?>

                          <span class="product-o__discount" style="color: #ff4500;"><?= number_format($sanPhamUaThich['gia_ban']) . 'đ' ?></span></span>
                      </div>
                    </div>
              <?php endif;
                endforeach;
              endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 4 ======-->

    <!--====== Section 7 ======-->
    <div class="u-s-p-b-60">
      <!--====== Section Content ======-->
      <div class="section__content">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
              <a class="promotion" href="#">
                <div class="aspect aspect--bg-grey aspect--square">
                  <img class="aspect__img promotion__img" src="images/promo/feature3.jpg" alt="" />
                </div>
                <div class=" promotion__content">
                  <div class="promotion__text-wrap">
                    <div class="promotion__text-1">
                      <span class="u-c-secondary">Tiếp xúc công nghệ</span>
                    </div>
                    <div class="promotion__text-2">
                      <span class="u-c-secondary">Chỉ bằng một cái</span>

                      <span class="u-c-brand">click</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
              <a class="promotion" href="#">
                <div class="aspect aspect--bg-grey aspect--square">
                  <img class="aspect__img promotion__img" src="images/promo/feature1.jpg" alt="" />
                </div>
                <div class="promotion__content">
                  <div class="promotion__text-wrap">
                    <div class="promotion__text-1">
                      <span class="u-c-secondary">Điện thoại thông minh</span>

                      <span class="u-c-brand">2024</span>
                    </div>
                    <div class="promotion__text-2">
                      <span class="u-c-secondary">Mẫu điện thoại mới</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
              <a class="promotion" href="#">
                <div class="aspect aspect--bg-grey aspect--square">
                  <img class="aspect__img promotion__img" src="images/promo/feature2.jpg" alt="" />
                </div>
                <div class="promotion__content">
                  <div class="promotion__text-wrap">
                    <div class="promotion__text-1">
                      <span class="u-c-secondary">Laptop thế hệ mới ra đời</span>
                    </div>
                    <div class="promotion__text-2">
                      <span class="u-c-brand">Giảm giá 10% </span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 7 ======-->

    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">
      <!--====== Section Intro ======-->
      <div class="section__intro u-s-m-b-46">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section__text-wrap">
                <h1 class="section__heading u-c-secondary u-s-m-b-12">Chính sách mua hàng</h1>

                <span class="section__span u-c-silver">Chính sách và quyền lợi khách hàng khi mua hàng</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Intro ======-->

      <!--====== Section Content ======-->
      <div class="section__content">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 u-s-m-b-30">
              <div class="service u-h-100">
                <div class="service__icon"><i class="fas fa-truck"></i></div>
                <div class="service__info-wrap">
                  <span class="service__info-text-1">Miễn Phí vận chuyển</span>

                  <span class="service__info-text-2">Miễn phí vận chuyển với các đơn hàng trong nội thành </span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 u-s-m-b-30">
              <div class="service u-h-100">
                <div class="service__icon"><i class="fas fa-redo"></i></div>
                <div class="service__info-wrap">
                  <span class="service__info-text-1">Hỗ trợ đổi trả</span>

                  <span class="service__info-text-2">Hoàn trả hàng khi bị lỗi hoặc không hài lòng</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 u-s-m-b-30">
              <div class="service u-h-100">
                <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                <div class="service__info-wrap">
                  <span class="service__info-text-1">24/7 Tư vấn</span>

                  <span class="service__info-text-2">Nhân viên tư vấn, hỗ trợ khách hàng 24/7</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->

    <!--====== Section 9 ======-->

    <!--====== End - Section 9 ======-->

    <!--====== Section 10 ======-->
    <div class="u-s-p-b-60">
      <!--====== Section Intro ======-->
      <div class="section__intro u-s-m-b-46">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section__text-wrap">
                <h1 class="section__heading u-c-secondary u-s-m-b-12">Bài viết mới nhất</h1>

                <span class="section__span u-c-silver">Bắt đầu ngày mới bằng 1 bản tin trong ngày</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Intro ======-->

      <!--====== Section Content ======-->
      <div class="section__content">
        <div class="container">
          <div class="row">
            <?php foreach ($tinTucs as $tinTuc): ?>
              <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="bp-mini bp-mini--img u-h-100">
                  <div class="bp-mini__thumbnail">
                    <!--====== Image Code ======-->

                    <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>"> <img class="aspect__img" src="admin/<?= $tinTuc['hinh_anh'] ?>" alt="" /></a>
                    <!--====== End - Image Code ======-->
                  </div>
                  <div class="bp-mini__content">
                    <div class="bp-mini__stat">
                      <span class="bp-mini__stat-wrap">
                        <span class="bp-mini__publish-date">
                          <a> <span><?= date('d-m-Y', strtotime($tinTuc['ngay_tao'])) ?></span></a></span></span>

                      <span class="bp-mini__stat-wrap">
                        <span class="bp-mini__preposition">By</span>

                        <span class="bp-mini__author"> <a href="#">Admin</a></span></span>

                      <span class="bp-mini__stat">
                        <span class="bp-mini__comment">
                          <a href="#"><i class="fa-solid fa-eye"></i></i>

                            <span><?= $tinTuc['luot_xem'] ?></span></a></span></span>
                    </div>


                    <span class="bp-mini__h1"> <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>"><?= $tinTuc['tieu_de'] ?></a></span>
                    <p class="bp-mini__p"><?= $tinTuc['mo_ta_ngan'] ?></p>

                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 10 ======-->

    <!--====== Section 11 ======-->
    <div class="u-s-p-b-90 u-s-m-b-30">
      <!--====== Section Intro ======-->
      <div class="section__intro u-s-m-b-46">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section__text-wrap">
                <h1 class="section__heading u-c-secondary u-s-m-b-12">Nhận xét từ khách hàng</h1>

                <span class="section__span u-c-silver">Khách hàng của chúng ta đã nói những gì</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--====== End - Section Intro ======-->

      <!--====== Section Content ======-->
      <div class="section__content">
        <div class="container">
          <!--====== Testimonial Slider ======-->
          <div class="slider-fouc">
            <div class="owl-carousel" id="testimonial-slider">
              <div class="testimonial">
                <div class="testimonial__img-wrap">
                  <img class="testimonial__img" src="images/about/feedback 1.png" alt="" />
                </div>
                <div class="testimonial__content-wrap">
                  <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                  <blockquote class="testimonial__block-quote">
                    <p>"Sau khi sử dụng một thời gian, mình rất hài lòng với chiếc laptop này. Máy chạy cực kỳ mượt mà, không bị giật lag khi xử lý các tác vụ nặng. Thiết kế sang trọng, hiện đại, vỏ ngoài chắc chắn. Đặc biệt, máy khởi động rất nhanh và màn hình hiển thị sắc nét, phù hợp cho công việc văn phòng lẫn giải trí."</p>
                  </blockquote>

                  <span class="testimonial__author">Cường Curly / Người mua hàng</span>
                </div>
              </div>
              <div class="testimonial">
                <div class="testimonial__img-wrap">
                  <img class="testimonial__img" src="images/about/feedback 2.png" alt="" />
                </div>
                <div class="testimonial__content-wrap">
                  <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                  <blockquote class="testimonial__block-quote">
                    <p>"Điện thoại đúng chuẩn hàng chính hãng, chất lượng hoàn hảo. Sau khi sử dụng, mình thấy hiệu năng rất mạnh mẽ, camera chụp ảnh cực kỳ sắc nét và chi tiết, ngay cả trong điều kiện thiếu sáng"</p>
                  </blockquote>

                  <span class="testimonial__author">Phạm Nam / Người mua hàng.</span>
                </div>
              </div>
              <div class="testimonial">
                <div class="testimonial__img-wrap">
                  <img class="testimonial__img" src="images/about/feedback 3.png" alt="" />
                </div>
                <div class="testimonial__content-wrap">
                  <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                  <blockquote class="testimonial__block-quote">
                    <p>"Đồng hồ thông minh mình nhận được không chỉ đẹp mà còn rất hữu ích. Thiết kế nhỏ gọn, màn hình cảm ứng nhạy và rõ nét, dây đeo thoải mái khi đeo cả ngày."</p>
                  </blockquote>

                  <span class="testimonial__author">Tuấn Kiệt / Người mua hàng</span>
                </div>
              </div>
              <div class="testimonial">
                <div class="testimonial__img-wrap">
                  <img class="testimonial__img" src="images/about/feedback 4.png" alt="" />
                </div>
                <div class="testimonial__content-wrap">
                  <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                  <blockquote class="testimonial__block-quote">
                    <p>"Mình rất hài lòng với chiếc tablet này! Màn hình lớn, sắc nét, cảm ứng cực kỳ mượt mà, rất phù hợp để học online và xem phim. Âm thanh rõ ràng, loa to, không bị rè khi bật âm lượng cao. "</p>
                  </blockquote>

                  <span class="testimonial__author">Quang Tuấn / Người mua hàng</span>
                </div>
              </div>
            </div>
          </div>
          <!--====== End - Testimonial Slider ======-->
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 11 ======-->

    <!--====== Section 12 ======-->
    <div class="u-s-p-b-60">
      <!--====== Section Content ======-->
      <div class="section__content">
        <div class="container">
        </div>
      </div>
      <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 12 ======-->
  </div>
  <!--====== End - App Content ======-->

  <!--====== Main Footer ======-->
  <?php require_once "views/layout/footer.php" ?>

  <!--====== Modal Section ======-->


  <!--====== End - Add to Cart Modal ======-->




  <!--====== End - Add to Cart Modal ======-->

  <!--====== Newsletter Subscribe Modal ======-->

  <!--====== End - Newsletter Subscribe Modal ======-->
  <!--====== End - Modal Section ======-->
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


  <?php require_once "views/layout/lib_js.php" ?>


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

  <!-- Javascript -->

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
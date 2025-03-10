<header class="header--style-1">
  <!--====== Nav 1 ======-->
  <nav class="primary-nav primary-nav-wrapper--border">
    <div class="container">
      <!--====== Primary Nav ======-->
      <div class="primary-nav">
        <!--====== Main Logo ======-->

        <a class="main-logo" href="index.php"> <img src="<?= $noiDungs['logo'] ?>" alt="" width="150" /></a>
        <!--====== End - Main Logo ======-->

        <!--====== Search Form ======-->
        <form method="get" class="main-form">
          <label for="main-search"></label>

          <input type="hidden" name="act" value="list-san-pham" />
          <input name="search" class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Search" />

          <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
        </form>
        <!--====== End - Search Form ======-->

        <!--====== Dropdown Main plugin ======-->
        <div class="menu-init" id="navigation">
          <!-- <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button> -->

          <!--====== Menu ======-->
          <div class="ah-lg-mode">
            <span class="ah-close">✕ Close</span>

            <!--====== List ======-->
            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
              <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="<?= isset($_SESSION['user']) ? 'Hello, ' . $_SESSION['user']['ho_ten'] . '!' : 'Account' ?>">
                <a><i class="far fa-user-circle"></i></a>

                <!--====== Dropdown ======-->

                <span class="js-menu-toggle"></span>
                <ul style="width: 120px">
                  <?php if (isset($_SESSION['user'])) { ?>
                    <li>
                      <form action="?act=tai-khoan" method="post" style="text-align: center;">
                        <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                        <button style="border:none;background:none;cursor:pointer;font-size:small;font-weight:500"><i class="fas fa-user-circle u-s-m-r-6"></i>
                          <span>Tài khoản</span></button>
                      </form>

                    </li>
                    <li>
                      <a href="?act=dang-xuat"><i class="fas fa-lock-open u-s-m-r-6"></i>

                        <span>Đăng xuất</span></a>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="?act=form-dang-ky"><i class="fas fa-user-plus u-s-m-r-6"></i>
                        <span>Đăng ký</span>
                      </a>
                    </li>
                    <li>
                      <a href="?act=form-dang-nhap"><i class="fas fa-lock u-s-m-r-6"></i>

                        <span>Đăng nhập</span></a>
                    </li>
                  <?php } ?>

                </ul>
                <!--====== End - Dropdown ======-->
              </li>
              <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Settings">
                <a><i class="fas fa-user-cog"></i></a>

                <!--====== Dropdown ======-->

                <span class="js-menu-toggle"></span>
                <ul style="width: 120px">
                  <li class="has-dropdown has-dropdown--ul-right-100">
                    <a>Language<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 120px">
                      <li>
                        <a class="u-c-brand">ENGLISH</a>
                      </li>
                      <li>
                        <a>ARABIC</a>
                      </li>
                      <li>
                        <a>FRANCAIS</a>
                      </li>
                      <li>
                        <a>ESPANOL</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-right-100">
                    <a>Currency<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 225px">
                      <li>
                        <a class="u-c-brand">$ - US DOLLAR</a>
                      </li>
                      <li>
                        <a>£ - BRITISH POUND STERLING</a>
                      </li>
                      <li>
                        <a>€ - EURO</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                </ul>
                <!--====== End - Dropdown ======-->
              </li>
              <li data-tooltip="tooltip" data-placement="left" title="Contact">
                <a href="tel:+0900901904"><i class="fas fa-phone-volume"></i></a>
              </li>
              <li data-tooltip="tooltip" data-placement="left" title="Mail">
                <a href="mailto:contact@domain.com"><i class="far fa-envelope"></i></a>
              </li>
            </ul>
            <!--====== End - List ======-->
          </div>
          <!--====== End - Menu ======-->
        </div>
        <!--====== End - Dropdown Main plugin ======-->
      </div>
      <!--====== End - Primary Nav ======-->
    </div>
  </nav>
  <!--====== End - Nav 1 ======-->

  <!--====== Nav 2 ======-->
  <nav class="secondary-nav-wrapper">
    <div class="container">
      <!--====== Secondary Nav ======-->
      <div class="secondary-nav">
        <!--====== Dropdown Main plugin ======-->
        <div class="menu-init" id="navigation1">
          <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

          <!--====== Menu ======-->
          <div class="ah-lg-mode">
            <span class="ah-close">✕ Close</span>

            <!--====== List ======-->
            <ul class="ah-list">
              <li class="has-dropdown">
                <span class="mega-text"><i class="fa-solid fa-list"></i></span>

                <!--====== Mega Menu ======-->

                <span class="js-menu-toggle"></span>
                <div class="mega-menu">
                  <div class="mega-menu-wrap">
                    <div class="mega-menu-list">
                      <ul>
                        <?php foreach ($danhMucs as $index => $danhMuc): ?>
                          <li class="<?= $index == 0 ? "js-active" : "" ?> ">
                            <a href="?act=list-san-pham&category=<?= $danhMuc['id'] ?>" class="d-block text-center" style="display:flex; align-items: center; gap:10px ; width:100%"><img src="<?= 'admin/' . $danhMuc['hinh_anh'] ?>" alt="" style="object-fit:contain ; width:30px ; height:30px">

                              <span><?= $danhMuc['ten'] ?></span></a>

                            <span class="js-menu-toggle js-toggle-mark"></span>
                          </li>
                        <?php endforeach; ?>

                      </ul>
                    </div>

                    <!--====== End - No Sub Categories ======-->
                  </div>
                </div>
                <!--====== End - Mega Menu ======-->
              </li>
            </ul>
            <!--====== End - List ======-->
          </div>
          <!--====== End - Menu ======-->
        </div>
        <!--====== End - Dropdown Main plugin ======-->

        <!--====== Dropdown Main plugin ======-->
        <div class="menu-init" id="navigation2">
          <!-- <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button> -->

          <!--====== Menu ======-->
          <div class="ah-lg-mode">
            <span class="ah-close">✕ Close</span>

            <!--====== List ======-->
            <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
              <li>
                <a href="?act=/">TRANG CHỦ</a>
              </li>

              <li class="has-dropdown">
                <a href="?act=tin-tuc">TIN TỨC</a>

              </li>
              <li>
                <a href="?act=lien-he">LIÊN HỆ</a>
              </li>
              <li>
                <a href="?act=ma-khuyen-mai">MÃ KHUYẾN MÃI</a>
              </li>
            </ul>
            <!--====== End - List ======-->
          </div>
          <!--====== End - Menu ======-->
        </div>
        <!--====== End - Dropdown Main plugin ======-->

        <!--====== Dropdown Main plugin ======-->
        <div class="menu-init" id="navigation3">
          <!-- <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button> -->

          <!-- <span class="total-item-round">2</span> -->

          <!--====== Menu ======-->
          <div class="ah-lg-mode">
            <span class="ah-close">✕ Close</span>

            <!--====== List ======-->
            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
              <li>
                <a href="index.html"><i class="fas fa-home u-c-brand"></i></a>
              </li>
              <li>
                <a onclick="return checkLogin(event,this)" href="?act=list-yeu-thich"><i class="far fa-heart"></i></a>
              </li>
              <li class="has-dropdown">
                <a id="list-cart" href="?act=gio-hangs" onclick="return checkLogin(event,this)" class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                  <?php if (isset($_SESSION['user'])) { ?>

                    <span class="total-item-round"><?= $_SESSION['count_cart'] ?></span>
                  <?php } ?>
                </a>


              </li>
            </ul>
            <!--====== End - List ======-->
          </div>
          <!--====== End - Menu ======-->
        </div>
        <!--====== End - Dropdown Main plugin ======-->
      </div>
      <!--====== End - Secondary Nav ======-->
    </div>
  </nav>
  <!--====== End - Nav 2 ======-->
</header>

<div class="modal fade" id="check-login">
  <div class="modal-dialog modal-dialog-centered" style="width: 320px;">
    <div class="modal-content modal-radius modal-shadow" style="border-radius: 20px;">
      <button id="closeModal" class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="success u-s-m-b-30">
              <div>

                <h2 style="color:#ff4500">Smember</h2>
              </div>
              <div>
                <img style="width: 50px !important; " src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:80/q:90/plain/https://cellphones.com.vn/media/wysiwyg/chibi2.png" alt="" />
              </div>
              <div class="success__info-wrap">
                <span class="success__name">Vui lòng đăng nhập tài khoản Smember để xem ưu đãi và thanh toán dễ dàng hơn.
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6"><a href="?act=form-dang-ky" style="width: 100%;display: flex; justify-content: center; padding: 10px 0; border-radius: 6px;" class="btn btn--e-transparent-brand-b-2" type="submit">Đăng ký</a></div>
              <div class="col-lg-6"><a href="?act=form-dang-nhap" style="width: 100%;display: flex; justify-content: center; padding: 10px 0; border-radius: 6px; background-color: #ff4500; color:white;" class="btn btn--e-transparent-brand-b-2" type="submit">Đăng nhập</a></div>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</div>
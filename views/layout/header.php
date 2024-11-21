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
                      <a href="dashboard.html"><i class="fas fa-user-circle u-s-m-r-6"></i>
                        <span>Tài khoản</span>
                      </a>
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
                <a href="shop-side-version-2.html">NEW ARRIVALS</a>
              </li>
              <li class="has-dropdown">
                <a>PAGES<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                <!--====== Dropdown ======-->

                <span class="js-menu-toggle"></span>
                <ul style="width: 170px">
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a>Home<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 118px">
                      <li>
                        <a href="index.html">Home 1</a>
                      </li>
                      <li>
                        <a href="index-2.html">Home 2</a>
                      </li>
                      <li>
                        <a href="index-3.html">Home 3</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a>Account<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 200px">
                      <li>
                        <a href="signin.html">Signin / Already Registered</a>
                      </li>
                      <li>
                        <a href="signup.html">Signup / Register</a>
                      </li>
                      <li>
                        <a href="lost-password.html">Lost Password</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a href="dashboard.html">Dashboard<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 200px">
                      <li class="has-dropdown has-dropdown--ul-left-100">
                        <a href="dashboard.html">Manage My Account<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                        <!--====== Dropdown ======-->

                        <span class="js-menu-toggle"></span>
                        <ul style="width: 180px">
                          <li>
                            <a href="dash-edit-profile.html">Edit Profile</a>
                          </li>
                          <li>
                            <a href="dash-address-book.html">Edit Address Book</a>
                          </li>
                          <li>
                            <a href="dash-manage-order.html">Manage Order</a>
                          </li>
                        </ul>
                        <!--====== End - Dropdown ======-->
                      </li>
                      <li>
                        <a href="dash-my-profile.html">My Profile</a>
                      </li>
                      <li class="has-dropdown has-dropdown--ul-left-100">
                        <a href="dash-address-book.html">Address Book<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                        <!--====== Dropdown ======-->

                        <span class="js-menu-toggle"></span>
                        <ul style="width: 180px">
                          <li>
                            <a href="dash-address-make-default.html">Address Make Default</a>
                          </li>
                          <li>
                            <a href="dash-address-add.html">Add New Address</a>
                          </li>
                          <li>
                            <a href="dash-address-edit.html">Edit Address Book</a>
                          </li>
                        </ul>
                        <!--====== End - Dropdown ======-->
                      </li>
                      <li>
                        <a href="dash-track-order.html">Track Order</a>
                      </li>
                      <li>
                        <a href="dash-my-order.html">My Orders</a>
                      </li>
                      <li>
                        <a href="dash-payment-option.html">My Payment Options</a>
                      </li>
                      <li>
                        <a href="dash-cancellation.html">My Returns & Cancellations</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a>Empty<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 200px">
                      <li>
                        <a href="empty-search.html">Empty Search</a>
                      </li>
                      <li>
                        <a href="empty-cart.html">Empty Cart</a>
                      </li>
                      <li>
                        <a href="empty-wishlist.html">Empty Wishlist</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a>Product Details<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 200px">
                      <li>
                        <a href="product-detail.html">Product Details</a>
                      </li>
                      <li>
                        <a href="product-detail-variable.html">Product Details Variable</a>
                      </li>
                      <li>
                        <a href="product-detail-affiliate.html">Product Details Affiliate</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a>Shop Grid Layout<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 200px">
                      <li>
                        <a href="shop-grid-left.html">Shop Grid Left Sidebar</a>
                      </li>
                      <li>
                        <a href="shop-grid-right.html">Shop Grid Right Sidebar</a>
                      </li>
                      <li>
                        <a href="shop-grid-full.html">Shop Grid Full Width</a>
                      </li>
                      <li>
                        <a href="shop-side-version-2.html">Shop Side Version 2</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li class="has-dropdown has-dropdown--ul-left-100">
                    <a>Shop List Layout<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                    <!--====== Dropdown ======-->

                    <span class="js-menu-toggle"></span>
                    <ul style="width: 200px">
                      <li>
                        <a href="shop-list-left.html">Shop List Left Sidebar</a>
                      </li>
                      <li>
                        <a href="shop-list-right.html">Shop List Right Sidebar</a>
                      </li>
                      <li>
                        <a href="shop-list-full.html">Shop List Full Width</a>
                      </li>
                    </ul>
                    <!--====== End - Dropdown ======-->
                  </li>
                  <li>
                    <a href="cart.html">Cart</a>
                  </li>
                  <li>
                    <a href="wishlist.html">Wishlist</a>
                  </li>
                  <li>
                    <a href="checkout.html">Checkout</a>
                  </li>
                  <li>
                    <a href="faq.html">FAQ</a>
                  </li>
                  <li>
                    <a href="about.html">About us</a>
                  </li>
                  <li>
                    <a href="contact.html">Contact</a>
                  </li>
                  <li>
                    <a href="404.html">404</a>
                  </li>
                </ul>
                <!--====== End - Dropdown ======-->
              </li>
              <li class="has-dropdown">
                <a href="?act=tin-tuc">Tin Tức</a>

              </li>
              <li>
                <a href="shop-side-version-2.html">VALUE OF THE DAY</a>
              </li>
              <li>
                <a href="?act=ma-khuyen-mai">Mã khuyến mãi</a>
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
                <a data-modal="modal" data-modal-id="#check-login" onclick="return checkLogin(event,this)" href="?act=list-yeu-thich"><i class="far fa-heart"></i></a>
              </li>
              <li class="has-dropdown">
                <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                  <!-- <span class="total-item-round">2</span></a> -->

                  <!--====== Dropdown ======-->

                  <span class="js-menu-toggle"></span>
                  <div class="mini-cart">
                    <!--====== Mini Product Container ======-->
                    <div class="mini-product-container gl-scroll u-s-m-b-15">
                      <!--====== Card for mini cart ======-->
                      <div class="card-mini-product">
                        <div class="mini-product">
                          <div class="mini-product__image-wrapper">
                            <a class="mini-product__link" href="product-detail.html"> <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="" /></a>
                          </div>
                          <div class="mini-product__info-wrapper">
                            <span class="mini-product__category"> <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="mini-product__name"> <a href="product-detail.html">Yellow Wireless Headphone</a></span>

                            <span class="mini-product__quantity">1 x</span>

                            <span class="mini-product__price">$8</span>
                          </div>
                        </div>

                        <a class="mini-product__delete-link far fa-trash-alt"></a>
                      </div>
                      <!--====== End - Card for mini cart ======-->

                      <!--====== Card for mini cart ======-->
                      <div class="card-mini-product">
                        <div class="mini-product">
                          <div class="mini-product__image-wrapper">
                            <a class="mini-product__link" href="product-detail.html"> <img class="u-img-fluid" src="images/product/electronic/product18.jpg" alt="" /></a>
                          </div>
                          <div class="mini-product__info-wrapper">
                            <span class="mini-product__category"> <a href="shop-side-version-2.html">Electronics</a></span>

                            <span class="mini-product__name"> <a href="product-detail.html">Nikon DSLR Camera 4k</a></span>

                            <span class="mini-product__quantity">1 x</span>

                            <span class="mini-product__price">$8</span>
                          </div>
                        </div>

                        <a class="mini-product__delete-link far fa-trash-alt"></a>
                      </div>
                      <!--====== End - Card for mini cart ======-->

                      <!--====== Card for mini cart ======-->
                      <div class="card-mini-product">
                        <div class="mini-product">
                          <div class="mini-product__image-wrapper">
                            <a class="mini-product__link" href="product-detail.html"> <img class="u-img-fluid" src="images/product/women/product8.jpg" alt="" /></a>
                          </div>
                          <div class="mini-product__info-wrapper">
                            <span class="mini-product__category"> <a href="shop-side-version-2.html">Women Clothing</a></span>

                            <span class="mini-product__name"> <a href="product-detail.html">New Dress D Nice Elegant</a></span>

                            <span class="mini-product__quantity">1 x</span>

                            <span class="mini-product__price">$8</span>
                          </div>
                        </div>

                        <a class="mini-product__delete-link far fa-trash-alt"></a>
                      </div>
                      <!--====== End - Card for mini cart ======-->

                      <!--====== Card for mini cart ======-->
                      <div class="card-mini-product">
                        <div class="mini-product">
                          <div class="mini-product__image-wrapper">
                            <a class="mini-product__link" href="product-detail.html"> <img class="u-img-fluid" src="images/product/men/product8.jpg" alt="" /></a>
                          </div>
                          <div class="mini-product__info-wrapper">
                            <span class="mini-product__category"> <a href="shop-side-version-2.html">Men Clothing</a></span>

                            <span class="mini-product__name"> <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

                            <span class="mini-product__quantity">1 x</span>

                            <span class="mini-product__price">$8</span>
                          </div>
                        </div>

                        <a class="mini-product__delete-link far fa-trash-alt"></a>
                      </div>
                      <!--====== End - Card for mini cart ======-->
                    </div>
                    <!--====== End - Mini Product Container ======-->

                    <!--====== Mini Product Statistics ======-->
                    <div class="mini-product-stat">
                      <div class="mini-total">
                        <span class="subtotal-text">SUBTOTAL</span>

                        <span class="subtotal-value">$16</span>
                      </div>
                      <div class="mini-action">
                        <a class="mini-link btn--e-brand-b-2" href="checkout.html">PROCEED TO CHECKOUT</a>

                        <a class="mini-link btn--e-transparent-secondary-b-2" href="cart.html">VIEW CART</a>
                      </div>
                    </div>
                    <!--====== End - Mini Product Statistics ======-->
                  </div>
                  <!--====== End - Dropdown ======-->
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
      <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
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
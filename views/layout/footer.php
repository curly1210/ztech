<footer>
  <div class="outer-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="outer-footer__content u-s-m-b-40">
            <span class="outer-footer__content-title">Liên hệ với chúng tôi</span>
            <div class="outer-footer__text-wrap">
              <i class="fas fa-home"></i>

              <span><?= $noiDungs['dia_chi'] ?></span>
            </div>
            <div class="outer-footer__text-wrap">
              <i class="fas fa-phone-volume"></i>

              <span><?= $noiDungs['so_dien_thoai'] ?></span>
            </div>
            <div class="outer-footer__text-wrap">
              <i class="far fa-envelope"></i>

              <span><?= $noiDungs['email'] ?></span>
            </div>
            <div class="outer-footer__social">
              <ul>
                <li>
                  <a class="s-fb--color-hover" href="<?= $noiDungs['link_facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                </li>
                <li>
                  <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                  <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a>
                </li>
                <li>
                  <a class="s-insta--color-hover" href="<?= $noiDungs['link_instagram'] ?>"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                  <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="outer-footer__content u-s-m-b-40">
                <span class="outer-footer__content-title">Thông tin</span>
                <div class="outer-footer__list-wrap">
                  <ul>
                    <li>
                      <a href="cart.html">Giỏ hàng</a>
                    </li>
                    <li>
                      <a href="dashboard.html">Tài khoản</a>
                    </li>
                    <li>
                      <a href="shop-side-version-2.html">Nhà cung cấp</a>
                    </li>
                    <li>
                      <a href="dash-payment-option.html">Tài chính</a>
                    </li>
                    <li>
                      <a href="shop-side-version-2.html">Cửa hàng</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="outer-footer__content u-s-m-b-40">
                <div class="outer-footer__list-wrap">
                  <span class="outer-footer__content-title">Về doanh nghiệp </span>
                  <ul>
                    <li>
                      <a href="about.html">Về chúng tôi</a>
                    </li>
                    <li>
                      <a href="?act=lien-he">Liên hệ với chúng tôi</a>
                    </li>
                    <li>
                      <a href="index.html">Sitemap</a>
                    </li>
                    <li>
                      <a href="dash-my-order.html">Vận chuyển</a>
                    </li>
                    <li>
                      <a href="shop-side-version-2.html">Kho</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="outer-footer__content">
            <span class="outer-footer__content-title">Theo dõi chúng tôi</span>
            <form class="newsletter">
              <div class="u-s-m-b-15">
                <div class="radio-box newsletter__radio">
                  <input type="radio" id="male" name="gender" />
                  <div class="radio-box__state radio-box__state--primary">
                    <label class="radio-box__label" for="male">Nam</label>
                  </div>
                </div>
                <div class="radio-box newsletter__radio">
                  <input type="radio" id="female" name="gender" />
                  <div class="radio-box__state radio-box__state--primary">
                    <label class="radio-box__label" for="female">Nữ</label>
                  </div>
                </div>
              </div>
              <div class="newsletter__group">
                <label for="newsletter"></label>

                <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email" />

                <button class="btn btn--e-brand newsletter__btn" type="submit">Đăng ký</button>
              </div>

              <span class="newsletter__text">Hãy đăng ký để nhận thông tin cập nhật về chương trình khuyến mãi, hàng mới, giảm giá và phiếu giảm giá.</span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="lower-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="lower-footer__content">
            <div class="lower-footer__copyright">
              <span>Copyright © 2018</span>

              <a href="index.html">Reshop</a>

              <span>All Right Reserved</span>
            </div>
            <div class="lower-footer__payment">
              <ul>
                <li><i class="fab fa-cc-stripe"></i></li>
                <li><i class="fab fa-cc-paypal"></i></li>
                <li><i class="fab fa-cc-mastercard"></i></li>
                <li><i class="fab fa-cc-visa"></i></li>
                <li><i class="fab fa-cc-discover"></i></li>
                <li><i class="fab fa-cc-amex"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<div id="myselfModal"></div>


<?php if (isset($_SESSION["message"])) {
  $message = $_SESSION["message"];
  echo "<script type=\"text/javascript\">        
              setTimeout(function() {alert('$message');},200);  
      </script>";
  unset($_SESSION['message']);
}
?>
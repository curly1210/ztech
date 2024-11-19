<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="shortcut icon">
  <title>Liên hệ | TechZ</title>

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

                    <a href="index.html">Trang chủ</a>
                  </li>
                  <li class="is-marked">

                    <a href="contact.html">Liên hệ</a>
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

        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="g-map">
                  <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d168508.91147525262!2d105.56022279910523!3d21.05044189483664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1732028466431!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 2 ======-->


      <!--====== Section 3 ======-->
      <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="contact-o u-h-100">
                  <div class="contact-o__wrap">
                    <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                    <span class="contact-o__info-text-1">HÃY GỌI CHO CHÚNG TÔI</span>
                    <span class="contact-o__info-text-2"><?= $noiDungs['so_dien_thoai'] ?></span>

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="contact-o u-h-100">
                  <div class="contact-o__wrap">
                    <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

                    <span class="contact-o__info-text-1">ĐỊA CHỈ CỦA CHÚNG TÔI</span>

                    <span class="contact-o__info-text-2"><?= $noiDungs['dia_chi'] ?></span>

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 u-s-m-b-30">
                <div class="contact-o u-h-100">
                  <div class="contact-o__wrap">
                    <div class="contact-o__icon"><i class="far fa-clock"></i></div>

                    <span class="contact-o__info-text-1">THỜI GIAN LÀM VIỆC</span>

                    <span class="contact-o__info-text-2">6 Ngày trong tuần</span>

                    <span class="contact-o__info-text-2">Từ 8h - 17h</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 3 ======-->


      <!--====== Section 4 ======-->
      <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-area u-h-100">
                  <div class="contact-area__heading">
                    <h2>Liên hệ</h2>
                  </div>
                  <form id="formContact" class="contact-f" method="post">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 u-h-100">
                        <div class="u-s-m-b-10" style="position: relative;;">
                          <label for="c-name"></label>
                          <input name="ten" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-name" placeholder="Họ tên">
                          <div id="err_ten" style="color: red; font-size: small; height: 20px;"></div>
                        </div>

                        <div class="u-s-m-b-10">
                          <label for="c-email"></label>
                          <input name="email" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-email" placeholder="E-Mail">
                          <div id="err_email" style="color: red; font-size: small; height: 20px;"></div>
                        </div>

                        <div class="u-s-m-b-10">
                          <label for="c-subject"></label>
                          <input name="dienThoai" class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-subject" placeholder="Số điện thoại">
                          <div id="err_dienThoai" style="color: red; font-size: small; height: 20px;"></div>
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 u-h-100">
                        <div class="u-s-m-b-30">

                          <label for="c-message"></label>
                          <textarea name="noiDung" style="height: 180px;" class="text-area text-area--border-radius text-area--primary-style" id="c-message" placeholder="Nội dung"></textarea>
                          <div id="err_noiDung" style="color: red; font-size: small; height: 20px;"></div>
                        </div>
                      </div>
                      <div class="col-lg-12">

                        <button class="btn btn--e-brand-b-2" type="submit">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--====== End - Section Content ======-->
      </div>
      <!--====== End - Section 4 ======-->
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

  <!--====== Google Map ======-->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-MO9uPLS-ApTqYs0FpYdVG8cFwdq6apw"></script> -->

  <!--====== Vendor Js ======-->
  <?php require_once "views/layout/lib_js.php"  ?>


  <script>
    $(document).ready(function() {
      $("#formContact").submit(function(event) {
        event.preventDefault(); // Ngăn chặn form nạp lại trang

        $.ajax({
          url: "?act=gui-lien-he",
          type: "POST",
          data: $(this).serialize(), // Lấy dữ liệu form
          success: function(response) {
            response = JSON.parse(response);

            const err_ten = document.getElementById("err_ten");
            const err_email = document.getElementById("err_email");
            const err_dienThoai = document.getElementById("err_dienThoai");
            const err_noiDung = document.getElementById("err_noiDung");

            err_ten.innerHTML = "";
            err_email.innerHTML = "";
            err_dienThoai.innerHTML = "";
            err_noiDung.innerHTML = "";

            if (response['check'] == 1) {
              if ("ho_ten" in response) {
                err_ten.innerHTML = response["ho_ten"];
                // err_hoTen.style = "display:block";
              }

              if ("email" in response) {
                err_email.innerHTML = response["email"];
                // err_email.style = "display:block";
              }

              if ("dien_thoai" in response) {
                err_dienThoai.innerHTML = response["dien_thoai"];
              }

              if ("noi_dung" in response) {
                err_noiDung.innerHTML = response["noi_dung"];
              }
            } else {
              setTimeout(() => {
                alert("Gửi thông tin thành công!");
                // window.location = "?act=/";
                window.location.reload();
              }, 100);
            }


          },
          error: function(xhr, status, error) {
            console.error("Error:", error);
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
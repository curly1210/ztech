<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>TechZ - Tài Khoản</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <?php require_once "views/layout/lib_css.php"  ?>
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

                                        <a href="#">Tài khoản</a>
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
                    <div class="dash">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                    <!--====== Dashboard Features ======-->
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-1">

                                            <span class="dash__text u-s-m-b-16">Xin Chào : <?= $nguoiDung['ho_ten'] ?> </span>
                                            <ul class="dash__f-list">

                                                <li>

                                                    <a class="#" href="#">Thông tin tài khoản</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Tài khoản</h1>

                                            <span class="dash__text u-s-m-b-30">Thông tin tài khoản</span>
                                            <div class="row">
                                                <div class="col-lg-6 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Họ tên</h2>

                                                    <span class="dash__text"> <?= $nguoiDung['ho_ten'] ?></span>
                                                </div>
                                                <div class="col-lg-6 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Email</h2>

                                                    <span class="dash__text"> <?= $nguoiDung['email'] ?></span>

                                                </div>
                                                <div class="col-lg-6 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Số điện thoại</h2>

                                                    <span class="dash__text"><?= $nguoiDung['dien_thoai'] ?></span>

                                                </div>
                                                <div class="col-lg-6 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Ngày sinh</h2>

                                                    <span class="dash__text"><?= $nguoiDung['nam_sinh'] ?></span>
                                                </div>
                                                <div class="  col-lg-6 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Giới tính</h2>

                                                    <span class="dash__text"><?= $nguoiDung['gioi_tinh'] == 1 ? "Nam" : "Nữ"; ?></span>
                                                </div>
                                                <div class="  col-lg-12 u-s-m-b-30">
                                                    <h2 class="dash__h2 u-s-m-b-8">Địa chỉ</h2>

                                                    <span class="dash__text"><?= $nguoiDung['dia_chi'] ?></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex">
                                                    <div class="u-s-m-b-16">
                                                        <form action="?act=cap-nhat-tai-khoan" method="post">
                                                            <input type="hidden" name="id" value="<?= $nguoiDung['id'] ?>">
                                                            <button class="dash__custom-link btn--e-transparent-brand-b-2 " style="background:none;cursor:pointer">Cập nhật thông tin</button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form action="?act=doi-mat-khau" method="post">
                                                            <input type="hidden" name="id" value="<?= $nguoiDung['id'] ?>">
                                                            <button class="dash__custom-link btn--e-brand-b-2" style="cursor:pointer">Đổi mật khẩu</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <?php require_once "views/layout/footer.php" ?>

        <!--====== Modal Section ======-->


        <!--====== Unsubscribe or Subscribe Newsletter ======-->
        <div class="modal fade" id="dash-newsletter">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">
                    <div class="modal-body">
                        <form class="d-modal__form">
                            <div class="u-s-m-b-15">
                                <h1 class="gl-modal-h1">Newsletter Subscription</h1>

                                <span class="gl-modal-text">I have read and understood</span>

                                <a class="d_modal__link" href="dash-my-profile.html">Ludus Privacy Policy</a>
                            </div>
                            <div class="gl-modal-btn-group">

                                <button class="btn btn--e-brand-b-2" type="submit">SUBSCRIBE</button>

                                <button class="btn btn--e-grey-b-2" type="button" data-dismiss="modal">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--====== Unsubscribe or Subscribe Newsletter ======-->
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
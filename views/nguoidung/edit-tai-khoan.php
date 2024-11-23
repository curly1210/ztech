<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>TechZ - Cập nhật tài khoản</title>

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

                                        <a href="?act=/">Trang Chủ</a>
                                    </li>
                                    <li class="is-marked">

                                        <a href="#">Cập nhật tài khoản</a>
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

                                            <span class="dash__text u-s-m-b-16">Xin Chào, <?= $nguoiDung['ho_ten'] ?></span>
                                            <ul class="dash__f-list">

                                                <li>

                                                    <a href="#">Thông tin tài khoản</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Cập nhật tài khoản</h1>

                                            <span class="dash__text u-s-m-b-30">Điền thông tin muốn sửa đổi</span>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form action="?act=submit-update-tai-khoan" method="post" class="dash-edit-p">
                                                        <input type="hidden" name="id" value="<?= $nguoiDung['id'] ?>">
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">Họ tên</label>

                                                                <input class="input-text input-text--primary-style" name="ho_ten" type="text" id="reg-fname" placeholder="Họ tên" value="<?= $nguoiDung['ho_ten'] ?>">
                                                                <span style="color:red ; font-size:13px; margin:5px"><?= !empty($_SESSION['error']['ho_ten']) ? $_SESSION['error']['ho_ten'] : "" ?></span>
                                                            </div>

                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <!--====== Date of Birth Select-Box ======-->
                                                                <input type="text" style="display: none;" name="ngay_sinh_not_update" value="<?= $nguoiDung['nam_sinh'] ?>">
                                                                <label class="gl-label" for="ngay-sinh">Ngày sinh</label>
                                                                <input type="date" id="ngay-sinh" name="ngay_sinh" class="input-text input-text--primary-style">
                                                                <!--====== End - Date of Birth Select-Box ======-->
                                                            </div>
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="gender">Giới tính</label>
                                                                <select class="select-box select-box--primary-style u-w-100" id="gender" name="gioi_tinh">
                                                                    <option selected disabled>Select</option>
                                                                    <option value="1" <?= $nguoiDung['gioi_tinh'] == 1 ? "selected" : "" ?>>Nam</option>
                                                                    <option value="2" <?= $nguoiDung['gioi_tinh'] == 2 ? "selected" : "" ?>>Nữ</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-femail">Email</label>

                                                                <input class="input-text input-text--primary-style" type="text" name="email" id="reg-femail" value="<?= $nguoiDung['email'] ?>" placeholder="Email">
                                                                <span style="color:red ; font-size:13px; margin:5px"><?= !empty($_SESSION['error']['email']) ? $_SESSION['error']['email'] : "" ?></span>
                                                            </div>


                                                        </div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="reg-fsdt">Số điện thoại</label>

                                                            <input class="input-text input-text--primary-style" name="so_dien_thoai" value="<?= $nguoiDung['dien_thoai'] ?>" type="text" id="reg-fsdt" placeholder="Số điện thoại">
                                                            <span style="color:red ; font-size:13px;"><?= !empty($_SESSION['error']['dien_thoai']) ? $_SESSION['error']['dien_thoai'] : "" ?></span>
                                                        </div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="reg-fdiachi">Địa chỉ</label>
                                                            <input class="input-text input-text--primary-style" type="text" name="dia_chi" value="<?= $nguoiDung['dia_chi'] ?>" id="reg-fdiachi" placeholder="Địa chỉ">
                                                            <span style="color:red ; font-size:13px;"><?= !empty($_SESSION['error']['dia_chi']) ? $_SESSION['error']['dia_chi'] : "" ?></span>
                                                        </div>

                                                        <button class="btn btn--e-brand-b-2" type="submit">Cập nhật</button>
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
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>

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

                                <a class="d_modal__link" href="dash-edit-profile.html">Ludus Privacy Policy</a>
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
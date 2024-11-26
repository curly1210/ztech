<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>TechZ - Danh sách đơn hàng</title>

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

                                        <a href="#">Danh sách đơn hàng</a>
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


                                            <ul class="dash__f-list ">

                                                <li>

                                                    <form action="?act=tai-khoan" method="post">
                                                        <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                                                        <button style="border:none;background:none;cursor:pointer;font-size:small;font-weight:500;padding:0">
                                                            <span>Thông tin tài khoản</span></button>
                                                    </form>
                                                </li>

                                            </ul>
                                            <ul class="dash__f-list">

                                                <li>

                                                    <a class="#" href="?act=don-hang">Danh sách đơn hàng</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                        <div class="dash__pad-1">
                                            <ul class="dash__w-list">
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                        <span class="dash__w-text"><?= $donHangs[0]['don_hang_dat'] ?></span>

                                                        <span class="dash__w-name">Đơn hàng đã đặt</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text"><?= $donHangs[0]['don_hang_dat'] ?></span>

                                                        <span class="dash__w-name">Đơn hàng đã hủy</span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Danh sách đơn hàng</h1>

                                            <span class="dash__text u-s-m-b-30">Danh sách các đơn hàng đã đặt</span>

                                            <div class="m-order__list">
                                                <?php foreach ($donHangs as $donHang): ?>
                                                    <div class="m-order__get">

                                                        <div class="manage-o__header u-s-m-b-30">
                                                            <div class="dash-l-r">
                                                                <div>
                                                                    <div class="manage-o__text-2 u-c-secondary">Mã đơn: <?= $donHang['id'] ?></div>
                                                                    <div class="manage-o__text u-c-silver">Đặt vào : <?= $donHang['ngay_dat_hang'] ?>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div style="display:inline-flex ; align-items:center ;justify-content:center;">

                                                                        <a href="?act=chi-tiet-don-hang&id=<?= $donHang['id'] ?>" style="display:block;color:green;font-size:13px ;margin-right:15px">Chi tiết </a>
                                                                        <?php if ($donHang['id_trang_thai_don_hang'] == 6): ?>
                                                                            <form action="?act=huy-don-hang" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này không ?')" method="post">

                                                                                <input type="hidden" name="id" value="<?= $donHang['id'] ?>">
                                                                                <input type="hidden" name="id_nguoi_dung" value="<?= $_SESSION['id'] ?>">
                                                                                <button type="submit" style="background: none; border:none; font-size:13px;color:red ; cursor:pointer">Hủy đơn hàng</button>
                                                                            </form>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="manage-o__description">
                                                            <div class="description__container">
                                                                <div class="description__img-wrap">

                                                                    <img class="u-img-fluid" style="width: 100%;height:100%;object-fit:contain" src="<?= "admin/" . $donHang['hinh_anh_dau_tien'] ?>" alt="">
                                                                </div>
                                                                <div class="description-title"><?= $donHang['ten_san_pham_dau_tien'] ?></div>
                                                            </div>
                                                            <div class="description__info-wrap">
                                                                <div>
                                                                    <span class="manage-o__badge " style="color: <?= $donHang['ma_mau'] ?>;"><?= $donHang['ten_trang_thai'] ?></span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

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
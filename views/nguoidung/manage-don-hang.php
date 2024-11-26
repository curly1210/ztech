<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>TechZ - Chi tiết đơn hàng </title>

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

                                        <a href="#">Chi tiết đơn hàng</a>
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

                                                        <span class="dash__w-text">4</span>

                                                        <span class="dash__w-name">Đơn hàng đã đặt</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="dash__w-wrap">

                                                        <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                        <span class="dash__w-text">0</span>

                                                        <span class="dash__w-name">Đơn hàng đã hủy</span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <h1 class="dash__h1 u-s-m-b-30">Chi tiết đơn hàng</h1>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="dash-l-r">
                                                <div>
                                                    <div class="manage-o__text-2 u-c-secondary"><?= $donHang['id'] ?></div>
                                                    <div class="manage-o__text u-c-silver">Được đặt vào: <?= $donHang['ngay_dat_hang'] ?></div>
                                                </div>
                                                <div>
                                                    <div class="manage-o__text-2 u-c-silver">Thành tiền:

                                                        <span class="manage-o__text-2 u-c-secondary"><?= number_format($donHang['thanh_toan']) ?> đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="manage-o">
                                                <div class="manage-o__header u-s-m-b-30">
                                                    <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                                        <span class="manage-o__text">Trạng thái đơn: <span style="color:<?= $donHang['ma_mau'] ?>"><?= $donHang['ten_trang_thai_don_hang'] ?></span></span>
                                                    </div>
                                                </div>
                                                <div class="dash-l-r">
                                                </div>
                                                <?php foreach ($products as $product): ?>
                                                    <div class="manage-o__description" style="margin-bottom:10px">
                                                        <div class="description__container">
                                                            <div class="description__img-wrap">

                                                                <img class="u-img-fluid" src="<?= "admin/" . $product['image_url'] ?>" alt="" style="width:100%;height:100%;object-fit:contain">
                                                            </div>
                                                            <div class="description-title"><?= $product['ten'] ?></div>
                                                        </div>
                                                        <div class="description__info-wrap">
                                                            <div>

                                                                <span class="manage-o__text-2 u-c-silver">Số lượng:

                                                                    <span class="manage-o__text-2 u-c-secondary"><?= $product['so_luong'] ?></span></span>
                                                            </div>
                                                            <div>

                                                                <span class="manage-o__text-2 u-c-silver">Giá:

                                                                    <span class="manage-o__text-2 u-c-secondary"><?= number_format($product['gia'])   ?> đ</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Địa chỉ người đặt</h2>


                                                    <span class="dash__text-2"><?= $donHang['ho_ten'] ?></span>
                                                    <span class="dash__text-2"><?= $donHang['dia_chi_nguoi_dat'] ?></span>

                                                    <span class="dash__text-2"><?= $donHang['dien_thoai'] ?></span>
                                                    <span class="dash__text-2"><?= $donHang['email'] ?></span>

                                                </div>
                                            </div>
                                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Địa chỉ người nhận</h2>
                                                    <span class="dash__text-2"><?= $donHang['ten_nguoi_nhan'] ?></span>

                                                    <span class="dash__text-2"><?= $donHang['dia_chi_nguoi_nhan'] ?></span>

                                                    <span class="dash__text-2"><?= $donHang['so_dien_thoai'] ?></span>
                                                    <span class="dash__text-2"><?= $donHang['email_nguoi_nhan'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Hóa đơn</h2>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 dash__text-2">Tổng tiền</div>
                                                        <div class="manage-o__text-2 dash__text-2"><?= number_format($donHang['tong_tien'])  ?> đ</div>
                                                    </div>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 dash__text-2">Phí vận chuyển</div>
                                                        <div class="manage-o__text-2 dash__text-2"><?= number_format($donHang['tien_ship'])  ?> đ</div>
                                                    </div>
                                                    <?php if ($donHang['id_ma_khuyen_mai'] != null): ?>
                                                        <div class="dash-l-r u-s-m-b-8">
                                                            <div class="manage-o__text-2 dash__text-2">Mã giảm giá</div>
                                                            <div class="manage-o__text-2 dash__text-2">-<?= number_format($donHang['giam_gia'])  ?> đ</div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary" style="font-weight:bold; font-size:17px">Thành tiền</div>
                                                        <div class="manage-o__text-2 u-c-secondary" style="font-weight:bold; font-size:17px"><?= number_format($donHang['thanh_toan'])  ?> đ</div>
                                                    </div>
                                                    <div style="margin-top: 90px;">
                                                        <span class="dash__text-2">Phương thức thanh toán: <?= $donHang['phuong_thuc_thanh_toan'] ?></span>
                                                        <span class="dash__text-2">Trạng thái thanh toán: <?= $donHang['trang_thai_thanh_toan'] ?></span>
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
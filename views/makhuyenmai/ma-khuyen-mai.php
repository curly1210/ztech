<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Ludus - Electronics, Apparel, Computers, Books, DVDs & more</title>

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

                                        <a href="?act=/">Home</a>
                                    </li>
                                    <li class="is-marked">

                                        <a href="?act=ma-khuyen-mai">Mã khuyến mãi</a>
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

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">Mã khuyến mãi</h1>
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
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <div class="table-responsive">
                                    <table class="table-p">
                                        <tbody>

                                            <!--====== Row ======-->
                                            <?php foreach ($maKhuyenMais as $index => $maKhuyenMai): ?>
                                                <tr>
                                                    <td>
                                                        <div class="table-p__box">
                                                            <div class="table-p__img-wrap">

                                                                <img class="u-img-fluid" src="images/voucher/voucher.jpg" alt="">
                                                            </div>
                                                            <div class="table-p__info">

                                                                <span class="table-p__name">

                                                                    <a><?= $maKhuyenMai['ten'] ?></a></span>

                                                                <span class="table-p__category">

                                                                    <p>Số lượng: <?= $maKhuyenMai['so_luong'] ?> </p>
                                                                </span>
                                                                <ul class="table-p__variant-list">
                                                                    <li>

                                                                        <span>Ngày bắt đầu: <?= date("d-m-Y", strtotime($maKhuyenMai['ngay_bat_dau']))  ?></span>

                                                                    </li>
                                                                    <li>

                                                                        <span>Ngày kết thúc: <?= date("d-m-Y", strtotime($maKhuyenMai['ngay_ket_thuc'])) ?></span>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="table-p__del-wrap">
                                                            <form action="">
                                                                <input type="text" class="copyText" value="<?= $maKhuyenMai['ten'] ?>" style="display: none;">
                                                            </form>
                                                            <a class="table-p__delete-link" onclick="copyToClipboard(<?= $index ?>)"><i style="font-size:25px;" class="fa-solid fa-copy"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <!--====== End - Row ======-->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">

                                        <a class="route-box__link" href="?act=/"><i class="fas fa-long-arrow-alt-left"></i>

                                            <span>Trang Chủ</span></a>
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
    <!-- Hàm copy nội dung vào clipboard -->
    <script>
        // Hàm copy nội dung vào clipboard sử dụng Clipboard API
        function copyToClipboard(index) {
            // Lấy phần tử input
            var copyText = document.getElementsByClassName("copyText")[index];

            // Sử dụng Clipboard API để sao chép nội dung
            navigator.clipboard.writeText(copyText.value).then(function() {
                // Nếu sao chép thành công, hiển thị thông báo thành công
                alert("Sao chép mã thành công");
            }).catch(function(err) {
                // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
                alert("Có lỗi xảy ra khi sao chép: " + err);
            });
        }
    </script>
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

    <!-- Javascript -->
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
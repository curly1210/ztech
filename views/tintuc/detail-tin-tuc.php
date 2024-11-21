<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Chi Tiết Tin Tức - TechZ</title>

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
            <div class="u-s-p-y-90">

                <!--====== Detail Post ======-->
                <div class="detail-post">
                    <div class="bp-detail">
                        <div class="bp-detail__thumbnail">

                            <!--====== Image Code ======-->
                            <div class="aspect aspect--bg-grey aspect--1366-768">

                                <img class="aspect__img" src="<?= "admin/" . $tinTuc['hinh_anh'] ?>" alt="">
                            </div>
                            <!--====== End - Image Code ======-->
                        </div>
                        <div class="bp-detail__info-wrap">
                            <div class="bp-detail__stat">

                                <span class="bp-detail__stat-wrap">

                                    <span class="bp-detail__publish-date">

                                        <a href="#">

                                            <span><?= date("d-m-Y", strtotime($tinTuc['ngay_tao'])) ?></span></a></span></span>

                                <span class="bp-detail__stat-wrap">

                                    <span class="bp-detail__author">

                                        <a href="#">Admin</a></span></span>


                            </div>

                            <span class="bp-detail__h1">

                                <a href="#"><?= $tinTuc['tieu_de'] ?></a></span>

                            <p class="bp-detail__p "><?= $tinTuc['noi_dung'] ?>
                            </p>

                            <div class="post-center-wrap">
                                <ul class="bp-detail__social-list">
                                    <li>

                                        <a class="s-fb--color" href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-tw--color" href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-insta--color" href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-wa--color" href="#"><i class="fab fa-whatsapp"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-gplus--color" href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="gl-l-r bp-detail__postnp">
                                <div>

                                    <a href="?act=tin-tuc"><- Trở về</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Detail Post ======-->

            <!--====== End - Section 1 ======-->
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
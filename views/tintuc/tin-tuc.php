<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Tin Tức - TechZ</title>

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
                <div class="container">
                    <div class="blog-m">
                        <div class="row blog-m-init">
                            <?php foreach ($tinTucs as $tinTuc): ?>
                                <div class="blog-m__element">
                                    <div class="bp-mini bp-mini--img">
                                        <div class="bp-mini__thumbnail">

                                            <!--====== Image Code ======-->

                                            <a class="aspect aspect--bg-grey aspect--1366-768 u-d-block" href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>">

                                                <img class="aspect__img" src="<?= "admin/" . $tinTuc['hinh_anh'] ?>" alt=""></a>
                                            <!--====== End - Image Code ======-->
                                        </div>
                                        <div class="bp-mini__content" style="height: 200px;">
                                            <div class="bp-mini__stat">

                                                <span class="bp-mini__stat-wrap">

                                                    <span class="bp-mini__publish-date">

                                                        <a href="#">

                                                            <span><?= date("d-m-Y", strtotime($tinTuc['ngay_tao'])) ?></span></a></span></span>

                                                <span class="bp-mini__stat-wrap">

                                                    <span class="bp-mini__preposition">By</span>

                                                    <span class="bp-mini__author">

                                                        <a href="#">Admin</a></span></span>

                                                <span class="bp-mini__stat">

                                                    <span class="bp-mini__comment">

                                                        <a href="blog-detail.html"><i class="fa-solid fa-eye"></i>

                                                            <span><?= $tinTuc['luot_xem'] ?></span></a></span></span>
                                            </div>


                                            <span class="bp-mini__h1">

                                                <a href="?act=chi-tiet-tin-tuc&id=<?= $tinTuc['id'] ?>"><?= $tinTuc['tieu_de'] ?></a></span>
                                            <p class="bp-mini__p"><?php

                                                                    $words = explode(' ', trim($tinTuc['mo_ta_ngan']));
                                                                    if (count($words) <= 20) {
                                                                        return $tinTuc['mo_ta_ngan'];
                                                                    }

                                                                    // Lấy số từ theo giới hạn và ghép lại thành chuỗi
                                                                    $limitedContent = implode(' ', array_slice($words, 0, 20));
                                                                    echo $limitedContent . "...";
                                                                    ?></p>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>



                        </div>
                    </div>
                    <nav class="post-center-wrap u-s-p-y-60">

                        <!--====== Pagination ======-->
                        <ul class="blog-pg">
                            <li class="blog-pg--active">

                                <a href="blog-masonry.html">1</a>
                            </li>
                            <li>

                                <a href="blog-masonry.html">2</a>
                            </li>
                            <li>

                                <a href="blog-masonry.html">3</a>
                            </li>
                            <li>

                                <a href="blog-masonry.html">4</a>
                            </li>
                            <li>

                                <a class="fas fa-angle-right" href="blog-masonry.html"></a>
                            </li>
                        </ul>
                        <!--====== End - Pagination ======-->
                    </nav>
                </div>
            </div>
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
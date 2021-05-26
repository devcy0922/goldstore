<?php
/**
 * @var $sideMenu array
 * @var $content string
 * @var $thisURL array
 */


?>

<html>
<head>

    <!--    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">-->
    <style>
        @import url(http://cdn.rawgit.com/hiun/NanumSquare/master/nanumsquare.css);

        .nanumsquare {
            font-family: 'NanumSquare', sans-serif !important;
        }
    </style>

    <meta property="og:title" content="project">
    <meta property="og:site_name" content="project"/>
    <!--    <meta property="og:image" content="http://--><? //= $_SERVER['HTTP_HOST'] ?><!--/images/default/logo/">-->
    <meta property="og:image:width" content="142"/>
    <meta property="og:image:height" content="101"/>
    <meta property="og:url" content=""/>
    <meta property="og:description" content="project">

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="theme-color" content="#66666690"/>
    <meta name="description" content="project"/>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Title" content="project"/>
    <meta http-equiv="Author" content="project"/>
    <meta name="Keywords" content="project"/>


    <title>project</title>
    <!-- Core css  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/design/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/design/dist/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/design/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/design/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/design/dist/assets/css/app.css">


    <link rel="shortcut icon" href="/design/dist/assets/images/favicon.svg" type="image/x-icon">

    <!-- Core Javascript -->
    <script src="/design/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/design/dist/assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>

    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>

</head>
<body>
<!--<div id="loading"></div>-->

<div id="app">

    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index.html"><img src="/design/dist/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <?php

                    foreach ($sideMenu as $item) {
                        $urlExplode = explode("/", $item['defaultURL']);

                        $active = false; // 메뉴 active 설정
                        $subMenuActive = false; // 하위 메뉴 active 설정 - 설정안함

                        foreach ($urlExplode as $key => $value) {

                            if( isset($thisURL[$key]) ){
                                if ( $value !== $thisURL[$key]) {
                                    $active = false;
                                    continue;
                                } else {
                                    $active = true;
                                }
                            }else{
                                continue;
                            }
                        }

                        $subMenuList = $item['list'] ?? [] ;
                        $addMenuClass = !empty($subMenuList) ? " has-sub" : "";
                        ?>
                        <li class="sidebar-item <?= $addMenuClass ?> <?= $active ? 'active' : '' ?>">
                            <a href="<?= $item['defaultURL'] ?>" class='sidebar-link'>
                                <i class="<?= $item['iconClass'] ?>"></i>
                                <span><?= $item['titleName'] ?></span>
                            </a>
                            <?php
                            if (!empty($subMenuList)) {
                                ?>
                                <ul class="submenu <?= $active ? 'active' : '' ?>">
                                    <?php
                                    foreach ($subMenuList as $subMenu) {
                                        ?>
                                        <li class="submenu-item ">
                                            <a href="<?= $item['defaultURL'] . $subMenu['locationURL'] ?>"><?= $subMenu['titleName'] ?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                            ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <?=$content?>

</div>


</body>
</html>
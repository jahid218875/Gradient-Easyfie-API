<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="<?= baseurl; ?>assets/css/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="<?= baseurl; ?>assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= baseurl; ?>assets/css/slick-theme.css">
    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="<?= baseurl; ?>assets/css/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= baseurl; ?>assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?= baseurl; ?>assets/css/color1.css">
    <script async src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="icon" href="<?php echo 'https://easyfie.com/' . $web_data->icon ?>" type="image/gif" sizes="16x16">



    <title>
        <?php

        if ((strpos($_SERVER['REQUEST_URI'], 'details.php') !== false) || (strpos($_SERVER['REQUEST_URI'], 'blog-details.php') !== false)) {

            echo $value->data->name . ' | ' . $web_data->title;
        } elseif (strpos($_SERVER['REQUEST_URI'], 'search.php') !== false) {

            echo !empty($query) ? $query . ' | ' . $web_data->title : 'Category Search' . ' | ' . $web_data->title;
        } elseif (strpos($_SERVER['REQUEST_URI'], 'page.php') !== false) {

            echo $pageInformation['title'] . ' | ' . $web_data->title;
        } else {

            $urlarray = explode("/", $_SERVER['REQUEST_URI']); //https://stackoverflow.com/questions/7395049/get-last-part-of-url-php
            $end = $urlarray[count($urlarray) - 1];
            if ($end == NULL) {
                echo $web_data->title;
            } else {
                echo ucfirst(rtrim($end, ".php")) . ' | ' . $web_data->title;
            }
        }
        ?>

    </title>


    <?= $web_data->header; ?>


    <?php

    if (!empty($themes_color)) {
        $menu_color = $themes_color->menu_color;
        $bg_color = $themes_color->bg_color;

        echo "
          <style>

           body {
            background-color: $bg_color !important;
           }
           #stickyNavbar{
                background-color: $menu_color !important;

               z-index:50 !important
            }
            /* .top-header{
                background-color: $menu_color !important;
             }
             */

          </style>";
    }


    ?>

    <style>
        .centralized {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sm-cart-details {
            position: fixed;
            background-color: #fff;
            width: 95%;
            border-radius: 0;
            border: 1px solid #eee;
            top: 0;
            height: 100vh;
            right: -95%;
            z-index: 99;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            overflow: scroll;
        }

        /* .sm-cart-details table td:nth-child(5)
{
    display: none;
} */
        .centralized-mini-cart-close {
            border: 1px solid gray;
            background-color: lightgray;
            padding: 5px
        }

        .readmore {
            max-height: 20px;
        }

        ul.pagination {
            justify-content: center;
        }

        ul.pagination li {
            color: #000 !important;
            margin: 05px;
            border-radius: 4px;
        }

        ul.pagination li a {
            color: #000;
            display: block;
            background: #908787;
            padding: 5px 10px;
        }

        ul.pagination li:hover a {
            color: #fff;
        }

        ul.pagination li a.active {
            color: white;
        }

        @media (max-width:767px) {
            td.readmore {
                text-overflow: ellipsis;
                max-height: 40px !important;
                max-width: 120px;
                overflow: hidden;
                white-space: nowrap;
            }
        }
    </style>

    <?php if (strpos($_SERVER['REQUEST_URI'], 'details.php') !== false || strpos($_SERVER['REQUEST_URI'], 'blog-details.php') !== false) {  ?>


        <meta name="description" content="<?= !empty(@$value->data->description) ? substr(strip_tags(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', html_entity_decode(@$value->data->description))), 0, 200) : $value->data->name; ?>">
        <meta property="og:description" content="<?= !empty(@$value->data->description) ? substr(strip_tags(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', html_entity_decode(@$value->data->description))), 0, 200) : $value->data->name; ?>" />
        <meta property="og:title" content="<?= $value->data->name; ?>" />
        <meta property="og:url" content="<?= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:type" content="og:product" />
        <meta property="og:image" content="<?= 'https://easyfie.com/' . $value->data->image; ?>" />

    <?php } elseif (strpos($_SERVER['REQUEST_URI'], 'search.php') !== false) { ?>

        <meta name="description" content="<?= $query . ' | ' . $web_data->title; ?>">
        <meta property="og:description" content="<?= $query . ' | ' . $web_data->title; ?>" />
        <meta property="og:title" content="<?= $query; ?>" />
        <meta property="og:url" content="<?= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:type" content="articles" />
        <meta property="og:image" content="<?php echo 'https://easyfie.com/' . $web_data->logo; ?>" />

    <?php } elseif (strpos($_SERVER['REQUEST_URI'], 'page.php') !== false) { ?>


        <meta name="description" content="<?= substr(strip_tags(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', html_entity_decode($pageInformation['post']))), 0, 200); ?>">
        <meta property="og:description" content="<?= substr(strip_tags(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', html_entity_decode($pageInformation['post']))), 0, 200); ?>" />
        <meta property="og:title" content="<?= $pageInformation['title'] . ' | ' . $web_data->title; ?>" />
        <meta property="og:url" content="<?= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:type" content="articles" />
        <meta property="og:image" content="<?php echo 'https://easyfie.com/' . $web_data->logo; ?>" />

    <?php } else { ?>


        <?php
        $metaDesc = json_decode($meta->meta_des);




        if (strpos($_SERVER['REQUEST_URI'], 'store') !== false) {
            $description = $metaDesc->store;
        } elseif (strpos($_SERVER['REQUEST_URI'], 'offers') !== false) {
            $description = $metaDesc->offers;
        } elseif (strpos($_SERVER['REQUEST_URI'], 'blogs') !== false) {
            $description = $metaDesc->blogs;
        } else {
            $description = $metaDesc->home;
        }

        ?>


        <meta name="description" content="<?= $description ?>">
        <meta property="og:description" content="<?= $description ?>" />
        <meta property="og:title" content="<?= ($end == NULL) ? $web_data->title : ucfirst(rtrim($end, ".php")) . ' | ' . $web_data->title; ?>" />
        <meta property="og:url" content="<?= "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:type" content="articles" />
        <meta property="og:image" content="<?php echo 'https://easyfie.com/' . $web_data->logo ?>" />

    <?php } ?>

    <script>
        var baseurl = "<?php echo baseurl ?>";
    </script>

</head>

<body>


    <?php
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        echo '<script>alert("' . $flash . '");</script>';
        unset($_SESSION['flash']);
        session_destroy();
    }


    ?>
    <!-- header start -->
    <header id="stickyNavbar" style="z-index:50">
        <div class="mobile-fix-option bg-white">
            <div class="row text-white d-md-none">
                <div class="col-9 position-absolute centralized" style="height: 100%">
                    <a href="checkout.php" class="text-capitalize text-white text-center" style="background:#ff4c3b; font-size: 1.2rem; width: 100%; height: 100%;     display: flex;align-items: center; justify-content: center;">
                        <span>Place Order</span>
                    </a>
                </div>
                <div class="col-3 position-absolute centralized bg-white centralized-mini-cart" style="right:0; height: 100%">

                    <div><img loading="lazy" src="<?= baseurl; ?>assets/images/icon/cart.png" class="img-fluid lazyload" alt=""></div>
                    <span class="itemCount position-relative" style="color:#ff4c3b; top:-12px"></span>
                </div>
            </div>
        </div>

        <div class="top-header d-none d-md-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i>Email Us: <?php echo @$me->email ?></li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: <?php echo @$me->phone_number ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <ul class="header-dropdown">

                            <li><a href="https://twitter.com/<?php echo @$me->twitter ?>"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.youtube.com/<?php echo @$me->youtube ?>"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.facebook.com/<?php echo @$me->facebook ?>"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.vk.com/<?php echo @$me->vk ?>"><i class="fa fa-vk fa-2x" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/<?php echo @$me->instagram ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.linkedin.com/profile/view?id=<?php echo @$me->linkedin ?>"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">

                            <div class="brand-logo">
                                <a href="https://<?= $web_data->website ?>"><img loading="lazy" src="<?php echo 'https://easyfie.com/' . $web_data->logo ?>" class="" alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <li>
                                            <a href="https://<?= $web_data->website ?>">Home</a>

                                        </li>
                                        <li>
                                            <a href="<?= baseurl ?>store">Store</a>

                                        </li>
                                        <li>
                                            <a href="<?= baseurl ?>offers">Offers</a>

                                        </li>
                                        <li>
                                            <a href="<?= baseurl ?>blogs">Blogs</a>

                                        </li>
                                        <?php foreach ($generated_page as $menu) { ?>
                                            <?php if ($menu->menu == 'UpperMenu') { ?>
                                                <li>
                                                    <a href="<?= ($menu->type == 'page') ? 'page.php?name' : 'page.php?category' ?>=<?= $menu->slug ?>"><?= $menu->title ?></a>

                                                </li>
                                            <?php } ?>
                                        <?php } ?>

                                        <li>
                                            <a href="#">Categories</a>
                                            <ul>
                                                <?php foreach ($categories as $category) { ?>
                                                    <li><a href="<?= baseurl ?>category/<?= $category->category ?>"><?= $category->english ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="d-none d-md-block">
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img loading="lazy" src="<?= baseurl; ?>assets/images/icon/search.png" onclick="openSearch()" class="img-fluid lazyload" alt=""> <i class="ti-search" onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div> <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form action="<?= baseurl . 'search'; ?>">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="query" placeholder="Search a Product">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div ">
                                            <div><img loading="lazy" src="<?= baseurl; ?>assets/images/icon/cart.png" class="img-fluid lazyload" alt=""></div>
                                            <ul class="show-div shopping-cart">

                                                <li>
                                                    <div class="total">
                                                        <h5>subtotal : <?= @$me->currency; ?> <span class="cartTotal">0</span></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="buttons"><a href="<?= baseurl . 'cart' ?>" class="view-cart">view
                                                            cart</a> <a href="<?= baseurl . 'checkout' ?>" class="checkout">checkout</a></div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
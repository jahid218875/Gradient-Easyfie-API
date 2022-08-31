<?php
require 'vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$router = new Router;
$baseurl = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
// $baseurl =  $baseurl . "://" . $_SERVER['SERVER_NAME'];
$baseurl = 'http://localhost/php/easyfie/gradient/';
define('baseurl', $baseurl);

$router->group("/php/easyfie/gradient", function ($router) {
    // global $baseurl;
    $router->get('/', function () {

        require "config.php";
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/banner.php');
        require('includes/home-offer.php');
        require('includes/products.php');
        require('includes/generaloffer.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });

    $router->get('/store', function () {
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/banner.php');
        require('includes/store.php');
        require('includes/generaloffer.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });
    $router->get('/offers', function () {

        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/banner.php');
        require('includes/offers.php');
        require('includes/generaloffer.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });
    $router->get('/blogs', function () {
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/blog.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });
    $router->get('/search', function () {
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/banner.php');
        require('includes/search.php');
        require('includes/generaloffer.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });
    $router->get('/cart', function () {
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/cart.php');
        require('includes/generaloffer.php');
        require 'includes/footer.php';
    });
    $router->get('/checkout', function () {
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('checkout.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });
    $router->get('/category/:any', function ($search_categories) {
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/banner.php');
        require('includes/category.php');
        require('includes/generaloffer.php');
        require('includes/cartfix.php');
        require 'includes/footer.php';
    });
    $router->get('/product/:any', function ($slug) {

        $slug_explode = explode("-", $slug);
        $id = end($slug_explode);
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/details_page_query.php');
        require('details.php');
        require('includes/footer.php');
    });
    $router->get('/offer/:any', function ($slug) {

        $slug_explode = explode("-", $slug);
        $id = end($slug_explode);
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/details_page_query.php');
        require('details.php');
        require('includes/cartfix.php');
        require('includes/footer.php');
    });
    $router->get('/blog/:any', function ($slug) {

        $slug_explode = explode("-", $slug);
        $id = end($slug_explode);
        require 'config.php';
        require('includes/header.php');
        echo '<div class="fix-sticky"></div>';
        require('includes/details_page_query.php');
        require('blog-details.php');
        require('includes/cartfix.php');
        require('includes/footer.php');
    });
    $router->post('/data', function () {
        require 'config.php';
        require 'data.php';
    });
    $router->get('/pages/:any', function ($any) {
        require 'config.php';


        if (!empty($any)) {
            $generated_pages = $easyfie->generatedPageSingle($token, $any);
            require 'page.php';
        } else {
            echo 'Something went wrong..';
            exit;
        }
    });
});


$router->run();

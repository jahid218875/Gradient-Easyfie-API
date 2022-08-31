<?php

$page = empty($_GET['page']) ? 1 : $_GET['page'];

$search_categories = @$search_categories;

if (empty($search_categories)) {
    $_SESSION['flash'] = 'Empty Input Nothing Found..';
}

if (!empty($search_categories)) {
    $limit = 12;
    $search = $easyfie->singleCategories($token, $search_categories, $limit, $page);
} else {
    $_SESSION['flash'] = 'Sorry Nothing Found..';
}

?>
<!-- Paragraph-->
<div id="store" class="title1 section-t-space">
    <!-- <h4>special offer</h4> -->
    <h2 class="title-inner1">Search Results</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="product-para">
            </div>
        </div>
    </div>
</div>
<!-- Paragraph end -->

<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <?php
            if (!empty($search)) {
                foreach ($search->data as $product) {

                    // print_r($product);
                    // exit;

                    $product_name = str_word_count($product->name);

                    if ($product_name > 5) {

                        $product_explode = explode(" ", $product->name);
                        $product_str = $product_explode[0] . " " . $product_explode[1] . " " . $product_explode[2] . " " . $product_explode[3];
                        $product_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_str)));
                        $product_url = $product_url . "-" . $product->id;
                    } else {
                        $product_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product->name)));
                        $product_url = $product_url . "-" . $product->id;
                    }
            ?>
                    <div class="col-6 col-md-3 ">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="<?php

                                                $url = $product->remark == '' ? 'product/' : 'offer/';
                                                echo baseurl . $url . $product_url;

                                                ?>"><img loading="lazy" src="<?= 'https://easyfie.com/' . str_replace('_image', '_image_small',  $product->image) ?>" class="img-fluid lazyload bg-img" alt=""></a>
                                </div>
                                <div class="pdbtn cart-info cart-wrap">
                                    <button class="btn btn-sm btn-secondary itemBtn minus additionBtn">-</button>
                                    <button class="btn btn-sm btn-secondary itemBtn add-item-to-cart"><i class="fa fa-shopping-cart ti-shopping-cart"> Add Cart</i></button>
                                    <button class="btn btn-sm btn-secondary itemBtn add-item-to-cart additionBtn">+</button>
                                </div>
                                <div class="product-information" productName="<?= $product->name ?>" product-price="<?= $product->price ?>" product-id="<?= $product->id; ?>"></div>
                            </div>
                            <div class="product-detail">


                                <h6><a href="<?php

                                                $url = $product->remark == '' ? 'product/' : 'offer/';
                                                echo baseurl . $url . $product_url;

                                                ?>" class="product-name-link">
                                        <?= substr($product->name, 0, 50) ?>
                                        <?php
                                        if (strlen($product->name) > 50) {
                                            echo '...';
                                        }
                                        ?>
                                    </a></h6>


                                <h4><?= @$me->currency; ?> <?= $product->price ?></h4>
                            </div>
                        </div>
                    </div>
            <?php }
            } else {
                if (isset($_SESSION['flash'])) {
                    $flash = $_SESSION['flash'];
                    echo '<script>alert("' . $flash . '");</script>';
                    unset($_SESSION['flash']);
                }
            } ?>
        </div>
        <div class="row mt-5">
            <div class='d-flex mx-auto'>
                <?php
                echo $easyfie->Paginate($page, $search->total, $limit);
                ?>
            </div>
        </div>
    </div>
</section>
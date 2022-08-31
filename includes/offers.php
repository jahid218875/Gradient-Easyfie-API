<?php $page = empty($_GET['page']) ? 1 : $_GET['page'];
$limit = 12;
$offers = $easyfie->ProductsOrBlogs($token, "offer", $limit, "desc", $page);
?>

<!-- Paragraph-->
<div id="store" class="title1 section-t-space">
    <h4>special offer</h4>
    <h2 class="title-inner1">top collection</h2>
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
            <?php foreach ($offers->data as $offer) {

                $offer_name = str_word_count($offer->name);

                if ($offer_name > 5) {

                    $offer_explode = explode(" ", $offer->name);
                    $offer_str = $offer_explode[0] . " " . $offer_explode[1] . " " . $offer_explode[2] . " " . $offer_explode[3];
                    $offer_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $offer_str)));
                    $offer_url = $offer_url . "-" . $offer->id;
                } else {
                    $offer_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $offer->name)));
                    $offer_url = $offer_url . "-" . $offer->id;
                }

            ?>
                <?php if ($offer->remark == 'Offer') { ?>
                    <div class="col-6 col-md-3 ">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="<?= baseurl . "offer/" . $offer_url ?>"><img loading="lazy" src="<?= 'https://easyfie.com/' . str_replace('_image', '_image_small',  $offer->image) ?>" class="img-fluid lazyload bg-img" alt=""></a>
                                </div>
                                <div class="pdbtn cart-info cart-wrap">
                                    <button class="btn btn-sm btn-secondary itemBtn minus additionBtn">-</button>
                                    <button class="btn btn-sm btn-secondary itemBtn add-item-to-cart"><i class="fa fa-shopping-cart ti-shopping-cart"> Add Cart</i></button>
                                    <button class="btn btn-sm btn-secondary itemBtn add-item-to-cart additionBtn">+</button>
                                </div>
                                <div class="product-information" productName="<?= $offer->name ?>" product-price="<?= $offer->price ?>" product-id="<?= $offer->id; ?>"></div>

                            </div>
                            <div class="product-detail">

                                <h6><a href="<?= baseurl . "offer/" . $offer_url ?>" class="product-name-link">
                                        <?= substr($offer->name, 0, 50) ?>
                                        <?php
                                        if (strlen($offer->name) > 50) {
                                            echo '...';
                                        }
                                        ?>
                                    </a></h6>
                                <h4><?= @$me->currency; ?> <?= $offer->price ?></h4>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <div class='d-flex mx-auto'>
                <?php
                echo $easyfie->Paginate($page, $offers->total, $limit);
                ?>
            </div>
        </div>
    </div>
</section>
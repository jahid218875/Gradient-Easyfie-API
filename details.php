<div class="breadcrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="page-title">
          <h2>product</h2>
        </div>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb" class="theme-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://<?= $web_data->website ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">product</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<?php if (!strpos($_SERVER['REQUEST_URI'], "blog") !== false) { ?>

  <section>
    <div class="collection-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-lg-6">
            <div class="product-slick">

              <div>
                <img loading="lazy" src="<?= 'https://easyfie.com/' . $value->data->image ?>" alt="" class="img-fluid lazyload image_zoom_cls-<?= $key ?>">
              </div>

            </div>
            <div class="row">
              <div class="col-12 p-0">
                <div class="slider-nav">
                  <?php

                  if (count($value->images) > 0) {

                    foreach ($value->images as $image) { ?>
                      <div><img loading="lazy" src="<?= 'https://easyfie.com/' . $image->image ?>" alt="" class="img-fluid blur-up lazyload"></div>

                  <?php  }
                  } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 rtl-text">
            <div class="product-right">
              <h2 class="mb-0"><?= $value->data->name; ?></h2>
              <h5 class="mb-2"><i class="fa fa-map-marker"></i> <a href="#"><?= @$value->data->location; ?></a></h5>

              <h3><?= @$me->currency; ?> <?= $value->data->price; ?></h3>
              <div class="color-variant">

                Type: <?= $type; ?>
                <br>
                <a target="_blank" href="https://www.easyfie.com/messages/<?= $user_id . '/?url=' . base64_encode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>">Contact Seller</a>

              </div>

              <div class="product-buttons">
                <button class="btn btn-solid btn-secondary itemBtn minus additionBtn">-</button>
                <button class="btn btn-solid btn-secondary itemBtn add-item-to-cart"><i class="fa fa-shopping-cart ti-shopping-cart"> Add Cart</i></button>
                <button class="btn btn-solid btn-secondary itemBtn add-item-to-cart additionBtn">+</button>
              </div>
              <div class="product-information" productName="<?= $value->data->name ?>" product-price="<?= $value->data->price ?>" product-id="<?= $value->data->id; ?>"></div>

              <div class="border-product">
                <h6 class="product-title">product details</h6>
                <p>
                  <?= html_entity_decode($value->data->description); ?>
                </p>
              </div>
              <div class="border-product">
                <h6 class="product-title">share it</h6>
                <div class="product-icon">
                  <ul class="product-social">
                    <li><a href="#" data-sharer="facebook" data-hashtag="awesome, products" data-url="<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" data-sharer="twitter" data-hashtag="awesome, products" data-url="<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" data-sharer="pinterest" data-hashtag="awesome, products" data-url="<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#" data-sharer="linkedin" data-hashtag="awesome, products" data-url="<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>"><i class="fa fa-linkedin"></i></a></li>
                  </ul>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } ?>







<?php if (!strpos($_SERVER['REQUEST_URI'], "blog") !== false) { ?>

  <!-- product section start -->
  <section class="section-b-space ratio_asos">
    <div class="container">
      <div class="row">
        <div class="col-12 product-related">
          <h2>related products</h2>
        </div>
      </div>
      <div class="row search-product">
        <?php if (count($value->related) > 0) {
          foreach ($value->related as $rel_data) {





            $product_name = str_word_count($rel_data->name);

            if ($product_name > 5) {

              $product_explode = explode(" ", $rel_data->name);
              $product_str = $product_explode[0] . " " . $product_explode[1] . " " . $product_explode[2] . " " . $product_explode[3];
              $product_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $product_str)));
              $product_url = $product_url . "-" . $rel_data->id;
            } else {
              $product_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $rel_data->name)));
              $product_url = $product_url . "-" . $rel_data->id;
            }

        ?>
            <div class="col-xl-3 col-md-4 col-sm-6">
              <div class="product-box">
                <div class="img-wrapper">
                  <div class="front">
                    <a href="<?php

                              $url = $rel_data->remark == '' ? 'product/' : 'offer/';
                              echo baseurl . $url . $product_url;

                              ?>"><img loading="lazy" src="<?= 'https://easyfie.com/' . $rel_data->image; ?>" class="img-fluid lazyload bg-img" alt=""></a>
                  </div>
                  <div class="cart-info cart-wrap">
                    <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i class="fa fa-shopping-cart ti-shopping-cart"></i></button>
                  </div>
                </div>
                <div class="product-detail">
                  <a href="<?php

                            $url = $rel_data->remark == '' ? 'product/' : 'offer/';
                            echo baseurl . $url . $product_url;

                            ?>">
                    <h6>
                      <?= substr($rel_data->name, 0, 50) ?>
                      <?php
                      if (strlen($rel_data->name) > 50) {
                        echo '...';
                      }
                      ?>
                    </h6>
                  </a>
                  <h4><?= @$me->currency; ?> <?= $rel_data->price; ?></h4>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </section>
  <!-- product section end -->
<?php  } ?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:15px 50px;">
        <h3><a href="tel:<?= $me->phone_number; ?>" class="btn btn-info"><i class="fa fa-phone fa-rotate-90"></i> Click Here To Call</a></h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="padding:10px 50px;">
        <form id="mail_form" role="form">
          <div class="form-group">
            <input type="hidden" class="form-control" name="url" id="url" readonly value="<?= "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" placeholder="Enter Your Subject" required>
            <input type="hidden" class="form-control" name="main_url" id="main_url" readonly value="<?= "http://" . $_SERVER['SERVER_NAME'] ?>" placeholder="Enter Your Subject" required>
          </div>
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Your Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Your Mobile</label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Your Mobile" required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Contact Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Your Subject" required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Details</label>
            <textarea class="form-control" name="details" id="" rows="3" required></textarea>
          </div>
          <button type="submit" id="contact" class="btn btn-info btn-block"><span class="glyphicon glyphicon-off"></span> Contact Seller</button><br>
        </form>
      </div>
    </div>

  </div>
</div>


<?php require('includes/cartfix.php'); ?>
<script>
  $(document).ready(function() {
    $("#myBtn").click(function() {
      $("#myModal").modal();
    });

    $("#mail_form").submit(function(e) {
      e.preventDefault();

      $data = $('#mail_form').serialize();
      var request = $.ajax({
        url: "contact.php",
        type: "POST",
        data: $data,
        dataType: "html"
      });

      request.done(function(msg) {
        alert(msg);
        $("#myModal").modal('hide');
        $('#mail_form').trigger('reset');
      });

      request.fail(function(jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
      });
    });


  });
</script>



<?php
if (!empty($value->data->location)) {
  $ex_first = explode(',', $value->data->location);
  $count = count($ex_first);
  $ex_first = str_replace(' ', '', $ex_first);
  if ($count == 3) {
    $count = $count - 2;
    $scnd_address = $ex_first[$count];
  } elseif ($count == 2) {
    $count = $count - 1;
    $scnd_address = $ex_first[$count];
  } else {
    $scnd_address = $ex_first[0];
  }
}

?>


<?php if (strpos($_SERVER['REQUEST_URI'], "product") !== false) { ?>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Product",
      "name": "<?= $value->data->name; ?>",
      "image": "<?= 'https://easyfie.com/' . $value->data->image ?>",
      "description": "<?= trim(preg_replace('/\t/', '', html_entity_decode($value->data->description))); ?>",
      "offers": [{
        "@type": "Product",
        "price": <?= $value->data->price; ?>,
        "priceCurrency": "BDT",
        "availability": "InStock"
      }]
    }
  </script>

<?php  } elseif (strpos($_SERVER['REQUEST_URI'], "offer") !== false) { ?>

  <script type="application/ld+json">
    {
      "@context": "http://schema.org/",
      "@type": "Product",
      "name": "<?= $value->data->name; ?>",
      "image": "<?= 'https://easyfie.com/' . $value->data->image ?>",
      "description": "<?= trim(preg_replace('/\t/', '', html_entity_decode($value->data->description))); ?>",
      "offers": [{
        "@type": "Offer",
        "price": <?= $value->data->price; ?>,
        "priceCurrency": "BDT",
        "availability": "InStock"
      }]
    }
  </script>

<?php  } ?>
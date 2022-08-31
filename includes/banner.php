<!-- Home slider -->
<section id="home" class="p-0">
    <div class="slide-1 home-slider">

        <?php if (isset($web_data->banner)) { ?>
            <?php foreach (json_decode($web_data->banner) as $banner) { ?>
                <div class="home text-center">
                    <img loading="lazy" src="<?php echo 'https://easyfie.com/' . $banner; ?>" alt="" class="img-fluid">
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>
<!-- Home slider end -->
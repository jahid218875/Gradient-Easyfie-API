<div class="fix-sticky"></div>
<section class="blog-detail-page section-b-space ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 blog-detail">
                <h3>
                    <?= $value->data->name; ?>
                </h3>
                <ul class="post-social">
                    <li><time><?php echo date("d M Y", $value->data->posted); ?></time></li>
                    <li class="text-capitalize">Posted By : <?= $me->first_name . ' ' . $me->last_name ?></li>
                    <li><i class="fa fa-eye"></i> <?php echo ($value->data->view) ?> views</li>
                </ul>
                <img loading="lazy" class="img-fluid" src="<?= 'https://easyfie.com/' . $value->data->image ?>" style=" max-height: 330px"><br><br>
                <div>
                    <?php echo html_entity_decode($value->data->description); ?>
                </div>
            </div>
        </div>
        <div class="row section-b-space blog-advance">
        </div>
    </div>
</section>
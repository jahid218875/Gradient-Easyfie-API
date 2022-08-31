<?php require('includes/header.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (!empty($generated_pages)) { ?>

                    <h2 class="mb-4">
                        <?php echo $generated_pages->title; ?>
                    </h2>
                    <div class="articleDescription">
                        <?php echo $generated_pages->post; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>
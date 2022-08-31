<?php $page = empty($_GET['page']) ? 1 : $_GET['page'];
$limit = 12;
$blogs = $easyfie->ProductsOrBlogs($token, "article", $limit, "desc", $page);
?>

<!-- blog section -->
<div id="blog" class="container">
    <div class="row">
        <div class="col">
            <div class="title1 section-t-space">
                <h4>Recent Story</h4>
                <h2 class="title-inner1">from the blog</h2>
            </div>
        </div>
    </div>
</div>
<section class="blog p-t-0 ratio2_3 mb-5">
    <div class="container">
        <div class="row">
            <?php foreach ($blogs->data as $blog) {


                $blog_title = str_word_count($blog->title);

                if ($blog_title > 5) {

                    $blog_explode = explode(" ", $blog->title);
                    $blog_str = $blog_explode[0] . " " . $blog_explode[1] . " " . $blog_explode[2] . " " . $blog_explode[3];
                    $blog_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $blog_str)));
                    $blog_url = $blog_url . "-" . $blog->id;
                } else {
                    $blog_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $blog->title)));
                    $blog_url = $blog_url . "-" . $blog->id;
                }
            ?>
                <?php if (!empty($blog)) { ?>
                    <div class="col-md-4 mb-2">
                        <a href="<?= baseurl . "blog/" . $blog_url ?>">
                            <div class="classic-effect">
                                <div>
                                    <img loading="lazy" src="<?= 'https://easyfie.com/' . $blog->thumbnail ?>" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4><i class="fa fa-eye"></i> <?= ($blog->visited >= 1) ? $blog->visited : 0 ?></h4>
                            <a href="<?= baseurl . 'blog/' . $blog_url ?>" class="d-block mb-2">
                                <p>
                                    <?= substr($blog->title, 0, 25) ?>
                                    <?php
                                    if (strlen($blog->title) > 25) {
                                        echo '...';
                                    }
                                    ?>
                                </p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="row mt-5">
            <div class='d-flex mx-auto'>
                <?php
                echo $easyfie->Paginate($page, $blogs->total, $limit);
                ?>
            </div>
        </div>
    </div>
</section>
<!-- blog section end -->
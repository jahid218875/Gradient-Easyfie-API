<?php $page = empty($_GET['page']) ? 1 : $_GET['page'];
$record_per_page = 12;
$blogs = $easyfie->ProductsOrBlogs($token, "article", $record_per_page, "desc", $page);
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

            <?php foreach ($blogs->data as $blog) { ?>
                <?php if (!empty($blog)) { ?>
                    <div class="col-md-4 m-2">
                        <a href="<?= 'blog-details.php?blog=' . $blog->id ?>">
                            <div class="classic-effect">
                                <div>
                                    <img loading="lazy" src="<?= 'https://easyfie.com/' . $blog->thumbnail ?>" class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>
                                <span></span>
                            </div>
                        </a>
                        <div class="blog-details">
                            <h4><i class="fa fa-eye"></i> <?= $blog->view ?></h4>
                            <a href="<?= 'blog-details.php?blog=' . $blog->id ?>">
                                <p>
                                    <?= substr($blog->title, 0, 25) ?>
                                    <?php
                                    if (strlen($blog->title) > 25) {
                                        echo '...';
                                    }
                                    ?>
                                </p>
                            </a>
                            <!-- <hr class="style1"> -->
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="row mt-3">
            <div class="col-md-10 mx-auto col-sm-12">
                <ul class="pagination">
                    <li><a href="?page=1" class="<?php echo ($pageno == 1) ? 'active' : ''; ?>">First</a></li>
                    <?php for ($i = 2; $i < $total_pages; $i++) { ?>
                        <li>
                            <a href="<?php echo "?page=" . $i;  ?>" class="<?php echo ($pageno == $i) ? 'active' : ''; ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li><a href="?page=<?php echo $total_pages; ?>" class="<?php echo ($pageno == $total_pages) ? 'active' : ''; ?>">Last</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <?php
            $total_pages = ceil($blogs->total / $record_per_page);
            $start_loop = $page;


            $difference = $total_pages - $page;

            if ($difference <= 5) {
                $start_loop = $total_pages - 5;
                if ($start_loop == 0) {
                    $start_loop = 1;
                }
            }
            $end_loop = $start_loop + 4;
            echo "<div class='d-flex mx-auto'>";
            if ($page >= 1) {
                echo "<a class='page-link' href='?page=1'>First</a>";
                echo "<a class='page-link' href='?page=" . ($page - 1) . "'><<</a>";
            }

            for ($i = $start_loop; $i <= $end_loop; $i++) {
                echo "<a class='page-link' href='?page=" . $i . "'>" . $i . "</a>";
            }

            if ($page <= $end_loop) {
                $p = $end_loop == $page ? $page : ($page + 1);
                echo "<a class='page-link' href='?page=" .  $p . "'>>></a>";
                echo "<a class='page-link' href='?page=" . $total_pages . "'>Last</a>";
            }
            echo "</div>";
            ?>
        </div>
    </div>
</section>
<!-- blog section end -->
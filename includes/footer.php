<?= $web_data->footer; ?>

<footer class="bg-info text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <ul class="footer-link">
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">About</a></li>
          <?php foreach ($generated_page as $menu) { ?>
            <?php if ($menu->menu == 'DownMenu') { ?>
              <li>
                <a href="<?= baseurl ?>pages/<?= $menu->slug ?>"><?= $menu->title ?></a>
              </li>
            <?php } ?>
          <?php } ?>
        </ul>
      </div>
      <div class="col-md-2 footer-padding">
        © 2020 Easyfie
      </div>
    </div>
  </div>
</footer>



<?php
if ($me->profession == 'Service Holder') {
?>
  <script>
    // $('a[href="#tabs-3"]').tab('show');
  </script>
<?php } ?>


<!-- latest jquery-->
<script src="<?= baseurl; ?>assets/js/jquery-3.3.1.min.js"></script>
<!-- fly cart ui jquery-->
<script defer src="<?= baseurl; ?>assets/js/jquery-ui.min.js"></script>
<script defer src="<?= baseurl; ?>assets/js/jquery.sticky.js"></script>

<!-- exitintent jquery-->
<script defer src="<?= baseurl; ?>assets/js/jquery.exitintent.js"></script>

<script defer src="<?= baseurl; ?>assets/js/exit.js"></script>

<!-- popper js-->
<script defer src="<?= baseurl; ?>assets/js/popper.min.js"></script>

<!-- slick js-->
<script defer src="<?= baseurl; ?>assets/js/slick.js"></script>
<script defer src="<?= baseurl; ?>assets/js/sharer.min.js"></script>

<!-- menu js-->
<script defer src="<?= baseurl; ?>assets/js/menu.js"></script>

<!-- lazyload js-->
<script defer src="<?= baseurl; ?>assets/js/lazysizes.js"></script>
<script defer src="<?= baseurl; ?>assets/js/jquery.elevatezoom.js"></script>

<!-- Bootstrap js-->
<script defer src="<?= baseurl; ?>assets/js/bootstrap.js"></script>
<script defer src="<?= baseurl; ?>assets/js/readmore.js"></script>

<!-- Bootstrap Notification js-->
<script defer src="<?= baseurl; ?>assets/js/bootstrap-notify.min.js"></script>


<!-- Theme js-->
<script defer src="<?= baseurl; ?>assets/js/script.js"></script>

<script>
  $(document).ready(function() {
    $("#stickyNavbar").sticky({
      topSpacing: 0
    });

    $('.readmore').readmore({
      speed: 75,
      collapsedHeight: 20,
      heightMargin: 15,
      lessLink: '<a href="#">Read less</a>'
    });
  });

  function openSearch() {
    document.getElementById("search-overlay").style.display = "block";
  }

  function closeSearch() {
    document.getElementById("search-overlay").style.display = "none";
  }

  /*=====================
  22. Menu js
  ==========================*/
  $('.centralized-mini-cart').on('click', function() {
    $('.sm-cart-details').css("right", "0px");
  });
  $(".centralized-mini-cart-close").on('click', function() {
    $('.sm-cart-details').css("right", "-95%");
  });
</script>

<!--   Must Needed JS || Added by Kawsar -->
<script defer src="<?= baseurl; ?>assets/js/app.js"></script>

<script>
  // Mobile Cart
  $('.cartList').on("click", 'td', function() {
    $(this).toggleClass("readmore")
  });
</script>


</body>

</html>
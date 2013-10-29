<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]><div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>
  <?php if (is_front_page()) : ?>
    <?php get_template_part( 'templates/home', 'top' ) ?>
  <?php endif; ?> 

  <div class="container document" role="document">
    <div class="content row">
      <div class="main clearfix <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="inner-side" role="complementary">
          <?php get_template_part( 'templates/sidebar', 'inner') ?>
        </aside><!-- /.inner-side -->

        <aside class="ugyerzi clearfix">
          <h3>Ha úgy érzi, bármiben sérül az egészséges alvása, forduljon bizalommal a SomnoCenter szakértőihez!</h3>
          <a href="?page_id=70" class="btn">Az első konzultáció és a vizsgálat részletei</a>
          <p class="discl">A központjainkban az alvászavarok teljes spektrumának diagnosztizálását és kezelését végezzük.</p>
        </aside>
      <?php endif; ?>

    </div><!-- /.content -->
  </div><!-- /.container .document -->



<?php get_template_part( 'templates/vizsgalathoz'); ?>


<?php if (is_single()): ?>
<div class="container related">  
  <div class="row">
    <h3>Kapcsolódó írások</h3>
    <div class="related-item">
      <h4>Lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, numquam, atque, porro, laborum illum unde recusandae magnam quas sapiente iste doloremque tempore expedita ipsam neque rem quam deleniti dolor enim.
      </p>
      <a href="#" class="btn">Folytatás</a>
    </div>
    <div class="related-item">
      <h4>Ez is lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, numquam, atque, porro, laborum illum unde recusandae magnam quas sapiente iste doloremque tempore expedita ipsam neque rem quam deleniti dolor enim.
      </p>
      <a href="#" class="btn">Folytatás</a>
    </div>
    <div class="related-item">
      <h4>Lorem ipsum dolor sit amet</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, numquam, atque, porro, laborum illum unde recusandae magnam quas sapiente iste doloremque tempore expedita ipsam neque rem quam deleniti dolor enim.
      </p>
      <a href="#" class="btn">Folytatás</a>
    </div>

  </div>
</div>
<?php endif; ?>

<?php get_template_part( 'templates/searchblock'); ?>


    <div class="container sidebar-footer">  
      <div class="row">
        <aside class="sidebar clearfix <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      </div>
    </div><!-- /.sidebarcont -->



  <?php get_template_part('templates/footer'); ?>

</body>
</html>

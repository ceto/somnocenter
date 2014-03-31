<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]><div class="alert alert-warning"><?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?></div><![endif]-->


<div class="mobilcol">
  <nav class="nav-main mobile clearfix" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills clearfix', 'depth' => 1));
        endif;
      ?>
  </nav>
  <nav class="nav-sub mobile clearfix" role="navigation">
    <?php
      if (has_nav_menu('secondary_navigation')) :
        wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills clearfix'));
      endif;
    ?>
  </nav>
</div>
<div class="minden">

  <?php
    do_action('get_header');
    get_template_part('templates/header');
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
      <?php endif; ?>
      <?php if ( $post->post_parent == '49' ) {
        get_template_part('templates/gyogyithato');
      } ?>
      <?php if (is_single() /*|| is_front_page()*/) {
        get_template_part('templates/ugyerzi');
      }?>

    </div><!-- /.content -->
  </div><!-- /.container .document -->
  <?php if (is_front_page() || is_page_template('page-orvosok.php') ) : ?>
    <?php get_template_part( 'templates/home', 'bottom' ) ?>
  <?php endif; ?> 
<?php get_template_part( 'templates/landinghez'); ?>
<?php get_template_part( 'templates/vizsgalathoz'); ?>
<?php get_template_part( 'templates/related'); ?>
<?php get_template_part( 'templates/searchblock'); ?>


    <div class="container sidebar-footer">  
      <div class="row">
        <aside class="sidebar clearfix <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      </div>
    </div><!-- /.sidebarcont -->



<?php get_template_part( 'templates/footer','dark'); ?>
<?php get_template_part( 'templates/footer','light'); ?>


  <?php get_template_part('templates/footer'); ?>

</div><!-- /.minden -->
</body>
</html>

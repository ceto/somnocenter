<section id="toptel" class="container toptel panel-collapse collapse">
  <div class="row">
    <div class="cell cellcim"><h3><?php _e('Jelentkezés<small>vizsgálatra</small>','roots'); ?></h3></div>
    <div class="cell"><h3><a href="tel:+36205007993"><small>Budapest</small>+36 20 500 7993</a></h3></div>
    <div class="cell"><h3><a href="tel:+36203688580"><small>Szeged</small>+36 20 368 8580</a></h3></div>
    <div class="cell"><h3><a href="tel:+36304761400"><small>Pécs</small>+36 30 476 1400</a></h3></div>
    <a href="<?php echo get_permalink(2237);?>" class="btn"><?php _e('Apnoé szűrés','roots'); ?></a>
    <a href="<?php echo get_permalink(520);?>" class="btn"><?php _e('Alvásvizsgálat','roots'); ?></a>
    
  </div>

</section>
<header class="banner container" role="banner">
  <div class="row">
    <a href="#" class="menu-button"><span class="ion-navicon"></span></a>
    <a href="#toptel" data-toggle="collapse" class="hs"><?php _e('Jelentkezés','roots'); ?></a>
  	<nav class="nav-sub desktop" role="navigation">
	  <?php
	    if (has_nav_menu('secondary_navigation')) :
	      wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills clearfix'));
	    endif;
	  ?>
	   </nav>
   
    <?php if ( (is_single() || is_archive() || is_home() ) && TRUE ) : ?>
     <a class="brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_life.png" alt="<?php bloginfo('name'); ?>">
      </a>
    <?php else : ?>
      <a class="brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_center.png" alt="<?php bloginfo('name'); ?>">
      </a>
    <?php endif ?>


  </div>
</header>
<nav class="nav-main desktop clearfix" role="navigation">
  <div class="row">
  <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills clearfix', 'depth' => 1));
    endif;
  ?>
  </div>
</nav>





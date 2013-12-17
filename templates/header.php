<header class="banner container" role="banner">
  <div class="row">
    <a href="#" class="menu-button"><span class="ion-navicon"></span></a>
    <a href="#" class="hs "><span class="ion-search"></span></a>
  	<nav class="nav-sub desktop" role="navigation">
	  <?php
	    if (has_nav_menu('secondary_navigation')) :
	      wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills clearfix'));
	    endif;
	  ?>
	   </nav>
     <div class="info">
       <small>Budapest | Szeged | Pécs</small>+36 70 770 5653 
     </div>
    
    <?php if ( (is_single() || is_archive() || is_home() ) && FALSE ) : ?>
     <a class="brand" href="<?php echo get_permalink(22); ?>" title="<?php bloginfo('name'); ?>">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_life.png" alt="<?php bloginfo('name'); ?>">
      </a>
    <?php else : ?>
      <a class="brand" href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>">
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





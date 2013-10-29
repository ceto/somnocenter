<header class="banner container" role="banner">
  <div class="row">
    <a href="#" class="hs">?</a>
  	<nav class="nav-sub" role="navigation">
	  <?php
	    if (has_nav_menu('secondary_navigation')) :
	      wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills clearfix'));
	    endif;
	  ?>
	   </nav>
     <div class="info">
       <small>Budapest | Szeged | Pécs</small>+36 70 770 5653 
     </div>

    <a class="brand" href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/somnocenter_logo.png" alt="<?php bloginfo('name'); ?>">
    </a>

  </div>
</header>
<nav class="nav-main clearfix" role="navigation">
  <div class="row">
  <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav nav-pills clearfix', 'depth' => 1));
    endif;
  ?>
  </div>
</nav>



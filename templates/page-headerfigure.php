<div class="page-headerfigure">
  <?php if (has_post_thumbnail() ) : ?>
    <?php the_post_thumbnail('large31'); ?>
  <?php else : ?>
    <img src="http://lorempixel.com/1200/400" alt="<?php the_title(); ?>">
  <?php endif; ?>
  
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p class="breadcrumbs">','</p>');
  } ?>
  <h1>
    <?php echo roots_title(); ?>
  </h1>
</div>
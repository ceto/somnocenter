<?php 
  $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  $tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
?>
<div class="page-headerfigure" style="background-image:url('<?php echo $tn; ?>')">
  <?php if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p class="breadcrumbs">','</p>');
  } ?>
  <h1>
    <?php echo roots_title(); ?>
  </h1>
</div>
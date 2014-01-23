<?php 
  $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  $tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
?>
<div class="page-headerfigure" style="background-image:url('<?php echo $tn; ?>')">
  <?php /* if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p class="breadcrumbs">','</p>');
  } */?>
  <div class="szigorow">
    <aside class="hero-block" role="complementary">
      <div class="hero-text">
        <h1 class="nagy">
          <span><?php echo roots_title(); ?></span>
        </h1>
        <?php if (is_page(43) ): ?>
          <h4 class="kicsi"><span>Tünetei alapján az alvászavar betegségek felismerhetőek</span></h4>
        <?php elseif (is_page(2) ): ?>
          <h4 class="kicsi"><span>Szolgáltatásaink bemutatása</span></h4>
        <?php endif ?>
        <?php if (is_page(116) ): ?>
          <h4 class="kicsi"><span>Frissítve: <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></span></h4>
        <?php endif ?>


      </div>
    </aside>
  </div>

</div>
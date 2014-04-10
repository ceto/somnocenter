<?php 
  $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  $tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
  $localclass='';
  if ( is_page_template('page-arlista.php') || is_page_template('page-gyogyitasstart.php') ) {
    $localclass="ralog";
  }
?>
<div class="page-headerfigure <?php echo $localclass;  ?>" style="background-image:url('<?php echo $tn; ?>')">
  <?php /* if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p class="breadcrumbs">','</p>');
  } */?>
  <div class="fosrow">
    <aside class="hero-block" role="complementary">
        <div class="hero-text">
          <h1 class="nagy">
            <span><?php echo roots_title(); ?></span>
          </h1>
          <?php if (is_page(116) ): ?>
            <h4 class="kicsi"><span>Szolgáltatások árai &mdash; Frissítve: <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></span></h4>
          <?php elseif (get_post_meta( $post->ID, '_cmb_subtitle', true )!='' ): ?>
            <h4 class="kicsi"><span><?php echo get_post_meta( $post->ID, '_cmb_subtitle', true ); ?></span></h4>
          <?php endif; ?>

        </div>
    </aside>

    <aside class="telfej">
      <div class="tart">
      <span class="head">Szeretne kipihenten ébredni?</span>  
      <a href="tel:+36707705653" class="telcsi"><span class="ion-ios7-telephone"></span> +36 1 789 6532</a>
      <a class="click" href="<?php echo get_permalink(520);?>"><span class="ion-laptop"></span> Jelentkezzen konzultációra</a>
      </div>
    </aside>

  </div>
</div>
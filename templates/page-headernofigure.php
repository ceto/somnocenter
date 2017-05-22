<?php
  $localclass='';
  if ( is_page_template('page-arlista.php') || is_page_template('page-gyogyitasstart.php') ) {
    $localclass="ralog";
  }
?>

<div class="page-headerfigure page-headerfigure--nofigure <?php echo $localclass;  ?>">
  <div class="fosrow">
    <aside class="hero-block" role="complementary">
        <div class="hero-text">
          <h1 class="nagy">
            <span class="active"><?php echo roots_title(); ?></span>
          </h1>
          <?php if (is_page(116) ): ?>
            <h4 class="kicsi"><span><?php _e('Szolgáltatások árai &mdash; Frissítve:','roots'); ?> <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time></span></h4>
          <?php elseif (get_post_meta( $post->ID, '_cmb_subtitle', true )!='' ): ?>
            <h4 class="kicsi"><span><?php echo get_post_meta( $post->ID, '_cmb_subtitle', true ); ?></span></h4>
          <?php endif; ?>

        </div>
    </aside>

    <?php get_template_part('templates/narancs'); ?>

  </div>
</div>

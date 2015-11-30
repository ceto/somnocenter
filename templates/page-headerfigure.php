<?php
  $localclass='';
  if ( is_page_template('page-arlista.php') || is_page_template('page-gyogyitasstart.php') ) {
    $localclass="ralog";
  }

  if (has_post_thumbnail()) {
    $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small43' );
    $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium31' );
    $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large31' );
    $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'giant31' );
  } else {
    $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'small43' );
    $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'medium31' );
    $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'large31' );
    $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'giant31' );
  }
?>

<style type="text/css">
  .page-headerfigure {
    background-image:url('<?php echo $imcismall['0']; ?>');
  }
  @media only screen and (min-width: 768px) {
    .page-headerfigure {
      background-image:url('<?php echo $imcimedium['0']; ?>');
    }
  }
  @media only screen and (min-width: 1280px) {
    .page-headerfigure {
      background-image:url('<?php echo $imcigreat['0']; ?>');
    }
  }
  @media only screen and (min-width: 1600px) {
    .page-headerfigure {
      background-image:url('<?php echo $imcigiant['0']; ?>');
    }
  }
</style>

<div class="page-headerfigure <?php echo $localclass;  ?>">
  <?php /* if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb('<p class="breadcrumbs">','</p>');
  } */?>
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

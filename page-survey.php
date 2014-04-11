<?php
/*
Template Name: Kérdőív Sablon 
*/
?>
<?php 
  //$imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  //$tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
?>
<style>
  .main{
    /*
    background-image:url('<?php echo $tn; ?>');
    background-size: cover;
    background-attachment: fixed;
    */
  }
</style>
<div class="surveyhead szigorow" >
  <div class="balfel">
    <?php if (get_post_meta( $post->ID, '_cmb_addcont', true )!='' ): ?>
      <?php echo do_shortcode(get_post_meta( $post->ID, '_cmb_addcont', true ) ); ?>
    <?php else: ?>
      <?php get_template_part('templates/contact','form'); ?>
    <?php endif; ?> 
  </div>
  <div class="jobbfel">
    <div class="surveycont-wrap">
            <?php if (has_post_thumbnail() ): ?>
        <figure class="survey-fig">
          <?php the_post_thumbnail('medium21'); ?>
        </figure>
      <?php endif; ?>
      <h1 class="survey-title"><?php the_title(); ?></h1>
      <?php if (get_post_meta( $post->ID, '_cmb_subtitle', true )!='' ): ?>
        <h2><?php echo do_shortcode(get_post_meta( $post->ID, '_cmb_subtitle', true ) ); ?></h2>
      <?php endif; ?>

      <div class="survey-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</div>
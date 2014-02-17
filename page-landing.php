<?php
/*
Template Name: Landing Page Űrlappal 
*/
?>
<?php 
  $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  $tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
?>
<style>
  .main{
    background-image:url('<?php echo $tn; ?>');
    background-size: cover;
    background-attachment: fixed;
  }
</style>
<div class="landinghead szigorow" >
  <div class="balfel">
    <div class="landcont-wrap">
      <h1 class="landing-title"><?php the_title(); ?></h1>
      <div class="landing-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <div class="jobbfel">
      <?php get_template_part('templates/contact','form'); ?>
  </div>
</div>
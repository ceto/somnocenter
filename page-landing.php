<?php
/*
Template Name: Landing Page Űrlappal 
*/
?>
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
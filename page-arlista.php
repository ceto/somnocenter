<?php
/*
Template Name: Árlista
*/
?>
<?php get_template_part('templates/page', 'newheader'); ?>
<?php
  wp_reset_query();
  $i=0;
?>
<?php
  $the_cumo=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => get_the_ID(),
    'order' => 'ASC'
  ));
?>
<section class="arstartblokk">
  <div class="tab-content">
    <?php while ($the_cumo->have_posts()) : $the_cumo->the_post(); ?>
      <section id="arelem-<?php echo ++$i; ?>" <?php post_class( 'fade tab-pane container arelem-'.$i.' '.(($i==1)?'active in':'') ) ?>>
        <div class="arelem-block szigorow">
          <?php the_content(); ?>
        </div>
      </section><!-- /.arelem-# -->
    <?php endwhile; ?>
  </div><!-- /.tab-content -->
</section>
<?php wp_reset_query(); ?>
<div class="row">
  <div class="disclaimer"><?php the_content(); ?></div>
  <?php get_template_part('templates/gyogyithato'); ?>
</div>
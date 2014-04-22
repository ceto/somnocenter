<?php
/*
Template Name: Árlista
*/
?>
<?php get_template_part('templates/page', 'headerfigure'); ?>
<?php
  $the_cumo=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => get_the_ID(),
    'order' => 'ASC'
    
  ));
  $i=0;
?>
<section class="arstartblokk">
  <ul class="nav nav-tabs gyogyTab" id="arTab">
    <?php while ($the_cumo->have_posts()) : $the_cumo->the_post(); ?>
      <li <?php echo (++$i==1)?'class="active"':'' ?>>
        <a href="#arelem-<?php echo $i; ?>" data-toggle="tab">
          <strong><?php the_title() ?></strong>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
  <?php 
    wp_reset_query();
    $i=0;
  ?>
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
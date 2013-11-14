<?php
/*
Template Name: Központok Sablon
*/
?>
<div class="clearfix felteke">
<div class="balfel">
<?php
  $the_center=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => get_the_ID()
    
  ));
?>
<ul class="nav nav-tabs clearfix" id="centerTab">
  <?php while ($the_center->have_posts()) : $the_center->the_post(); ?>
    <li <?php echo (++$i==1)?'class="active"':'' ?>>
      <a href="#center-<?php echo $i; ?>" data-toggle="tab">
        <?php the_title() ?>
      </a>
    </li>
  <?php endwhile; ?>
</ul>
<?php 
  rewind($the_center);
  $i=0;
?>
<div class="tab-content">
  <?php while ($the_center->have_posts()) : $the_center->the_post(); ?>
    <section id="center-<?php echo ++$i; ?>" <?php post_class('tab-pane fade center-'.$i.' '.(($i==1)?'active in':'') ); ?> >
      <figure>
        <img src="http://placehold.it/480x320" alt="<?php the_title(); ?>">
      </figure>
      <h2><a href="<?php  the_permalink(); ?>">Somnocenter <?php the_title(); ?></a></h2>
      <p class="excerpt"><?php the_content(); ?></p>
    </section>
  <?php endwhile; ?>
</div>
</div><!-- /.balfel -->
<?php wp_reset_query(); ?>
<div class="jobbfel">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
</div><!-- /.jobbfel -->
</div><!-- /.felteke -->
<?php get_template_part('templates/ugyerzi'); ?>

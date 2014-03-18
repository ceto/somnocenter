<?php
/*
Template Name: Központok Sablon
*/
?>
<script>
  var map;
  function initialize() {
      var mapOptions = {
        zoom: 8,
        center: new google.maps.LatLng(-34.397, 150.644)
      };
      map = new google.maps.Map(document.getElementById('map-canvas-1'), mapOptions);
    }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="clearfix felteke">
<div class="jobbfel">
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
  wp_reset_query();
  $i=0;
?>
<div class="tab-content">
  <?php while ($the_center->have_posts()) : $the_center->the_post(); ?>
    <section id="center-<?php echo ++$i; ?>" <?php post_class('tab-pane fade center-'.$i.' '.(($i==1)?'active in':'') ); ?> >
      <figure>
        <img src="http://placehold.it/480x320" alt="<?php the_title(); ?>">
        <div class="map-canvas" id="map-canvas-<?php echo $i; ?>"></div>
      </figure>
      <h2><a href="<?php  the_permalink(); ?>">Somnocenter <?php the_title(); ?></a></h2>
      <p class="excerpt"><?php the_content(); ?></p>
    </section>
  <?php endwhile; ?>
</div>
</div><!-- /.balfel -->
<?php wp_reset_query(); ?>
<div class="balfel">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
</div><!-- /.jobbfel -->
</div><!-- /.felteke -->
<?php get_template_part('templates/ugyerzi'); ?>

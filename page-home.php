<?php
/*
Template Name: Homepage Template
*/
?>
<section class="jobbfel">
  <h3 class="rovatfej">Somno TV</h3>
  <?php 
  $vidi=new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'tax_query' => array(
        array(                
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 
                'post-format-video'
            ),
            //'operator' => 'NOT IN'
        )
    )    
  ));
?>
<?php $kockastyle='szimplasor'; ?>
<?php while ($vidi->have_posts()) : $vidi->the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<h3 class="rovatfej">Páciensek kérdezik</h3>
<?php 
  $qa=new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'orderby' => 'rand',
    'tax_query' => array(
        array(                
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 
                'post-format-aside'
            ),
            //'operator' => 'NOT IN'
        )
    )    
  ));
?>
<?php $kockastyle='noimage'; ?>
<?php while ($qa->have_posts()) : $qa->the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>


</section>
<section class="balfel">
<?php 
  $arti=new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'ignore_sticky_posts' => 1,
    'tax_query' => array(
        array(                
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-video'),
            'operator' => 'NOT IN'
        )
        ,
        array(                
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-aside'),
            'operator' => 'NOT IN'
        )
    )
  ));
  $kockastyle='duplasor';
?>
<?php while ($arti->have_posts()) : $arti->the_post(); ?>
   <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
</section>


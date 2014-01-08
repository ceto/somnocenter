<?php
/*
Template Name: Homepage Template
*/
?>
<section class="jobbfel">
  <?php 
  $vidi=new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 1,
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
  <div class="disc-blokk">
    <h3>Terápiás megoldás<small>valamennyi alvászavarra</small></h3>
    <h4>Alvászavarok diagnosztizálása és kezelése Magyarországon egyedülálló szakértelemmel.</h4>
    <ul>
      <li><a href="#">Szomnológus szakorvosok</a></li>
      <li><a href="#">Országos hálózat</a></li>
      <li><a href="#">Szűrés és teljeskörű kezelés</a></li>
      <li><a href="#">Várakozási idő nélkül</a></li>
    </ul>
    <a href="?page_id=70" class="btn">Első konzultáció és vizsgálat részletei</a>
  </div>
</section>
<section class="balfel">
<?php 
  $arti=new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'tax_query' => array(
        array(                
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array( 
                'post-format-video'
            ),
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


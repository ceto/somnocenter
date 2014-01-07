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
<?php while ($vidi->have_posts()) : $vidi->the_post(); ?>
  <article class="listazott vidi" >
    <figure class="entry-mini-figure">
      <a class="player popup-video" href="<?php echo get_post_meta( $post->ID, '_cmb_video', true ); ?>">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('small43'); ?>
        <?php else: ?>
          <img src="http://lorempixel.com/480/320" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </a>
    </figure>
    <div class="entry-cat">
      <?php 
      $category = get_the_category(); 
      if($category[0]){
      echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
      }
    ?>
    </div>

    <h2 class="entry-title">
      <a class="popup-video" href="<?php echo get_post_meta( $post->ID, '_cmb_video', true ); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn entry-author"><?php echo get_the_author(); ?></a>
  — <?php get_template_part('templates/entry','time'); ?>
  </article>
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
    'posts_per_page' => 4,
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
?>
<?php while ($arti->have_posts()) : $arti->the_post(); ?>
  <article class="listazott">
    <figure class="entry-mini-figure">
      <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('small43'); ?>
        <?php else: ?>
          <img src="http://lorempixel.com/480/320" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </a>
    </figure>
    <div class="entry-cat">
      <?php 
      $category = get_the_category(); 
      if($category[0]){
      echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
      }
    ?>
    </div>

    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn entry-author"><?php echo get_the_author(); ?></a>
  — <?php get_template_part('templates/entry','time'); ?>
  </article>
<?php endwhile; ?>
</section>


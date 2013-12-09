<?php
/*
Template Name: Homepage Template
*/
?>
<section class="balfel">
<?php 
  $arti=new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3
  ));
?>
<?php while ($arti->have_posts()) : $arti->the_post(); ?>
  <article class="listazott">
    <figure class="entry-mini-figure">
      <a href="<?php the_permalink(); ?>"><img src="http://lorempixel.com/320/160" alt="<?php the_title(); ?>"></a>
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
  </article>
<?php endwhile; ?>
</section>

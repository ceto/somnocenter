<article <?php post_class(); ?>>
  <header>
    <?php get_template_part('templates/entry-meta'); ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  	<div class="entry-rovat">
  		Rovat: 
      <?php 
      $category = get_the_category(); 
      if($category[0]){
      echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
      }
    ?>
  	</div>
  </header>
    <figure class="entry-mini-figure">
      <img src="http://lorempixel.com/320/160" alt="<?php the_title(); ?>">
  </figure>

  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>

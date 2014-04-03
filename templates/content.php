<?php global $kockastyle; ?>
<article <?php post_class($kockastyle.' kiskocka'); ?> >
  <header>
    <figure class="entry-mini-figure">
      <a <?php echo (get_post_format()=='video')?'class="player popup-video"':''; ?> href="<?php echo ( get_post_format()=='video' )?get_post_meta( $post->ID, '_cmb_video', true ):get_permalink(); ?>">
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
      //print_r($category); 
      if($category[0]->term_id!==7){
        echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
      } else {
        echo '<a href="'.get_category_link($category[1]->term_id ).'">'.$category[1]->cat_name.'</a>';
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
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('nagycikk'); ?>>

    <figure class="entry-figure">
      <a <?php echo (get_post_format()=='video')?'class="player popup-video"':''; ?> href="<?php echo ( get_post_format()=='video' )?get_post_meta( $post->ID, '_cmb_video', true ):get_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('medium21'); ?>
        <?php else: ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/dummy-life-nagy.jpg" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </a>
    </figure>
   <header>
      <?php get_template_part('templates/entry-cat'); ?>
      <?php get_template_part('templates/entry-time'); ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-author'); ?>
   </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
          <?php get_template_part('templates/entry-sharing'); ?>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

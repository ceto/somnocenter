<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <figure class="entry-figure">
      <?php if (has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('medium21'); ?>
      <?php else : ?>
        <img src="http://lorempixel.com/1024/512" alt="<?php the_title(); ?>">
      <?php endif; ?>

    </figure>
   <header>
      <?php get_template_part('templates/entry-cat'); ?>
      <?php get_template_part('templates/entry-time'); ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-author'); ?>
      <?php get_template_part('templates/entry-sharing'); ?>
   </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php // comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

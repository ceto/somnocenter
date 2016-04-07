<?php while (have_posts()) : the_post(); ?>
  <section class="ps pagefej">
    <div class="lead">
      <?php the_real_excerpt(); ?>
    </div>
  </section>
  <div class="ps">
  <section class="pagecopy">
    <?php the_content('', TRUE); ?>
    <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
  </section>
  <aside class="pagesidebar inner-side"  role="complementary">
     <?php get_template_part( 'templates/sidebar', 'inner') ?>
  </aside>

  </div>
<?php endwhile; ?>
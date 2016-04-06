<?php while (have_posts()) : the_post(); ?>
  <section class="ps pagefej">
    <div class="lead">
      <?php the_real_excerpt(); ?>
    </div>
  </section>
  <section class="ps ps--narrow pagecopy">
  <?php the_content('', TRUE); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
  </section>
<?php endwhile; ?>
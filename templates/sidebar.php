<?php
  $the_ill=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => 49
    
  ));
?>
<section class="widget widget_illness dupla">
  <div class="widget-inner">
    <h3 class="widget-title">Leggyakoribb alvászavar betegésgek</h3>
    <ul lass="ill-list">
      <?php while ($the_ill->have_posts()) : $the_ill->the_post(); ?>
        <li>
          <a href="<?php  the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
      <?php endwhile; ?>
    </ul>
    <?php wp_reset_query(); ?>
  </div>
</section>
<?php dynamic_sidebar('sidebar-footer'); ?>
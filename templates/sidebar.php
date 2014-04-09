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

<section class="widget widget_qa">
  <div class="widget-inner">
    <h3 class="widget-title">Páciensek kérdezik</h3>
    <?php 
    $qaf=new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'orderby' => 'rand',
      'tax_query' => array(
          array(                
              'taxonomy' => 'post_format',
              'field' => 'slug',
              'terms' => array( 
                  'post-format-aside'
              ),
              //'operator' => 'NOT IN'
          )
      )    
    ));
    ?>
    <ul>
    <?php while ($qaf->have_posts()) : $qaf->the_post(); ?>
      <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    </ul>
    <a class="catmore" href="<?php echo esc_url(get_category_link(5)); ?>">További kérdések ...</a>
  </div>
</section>
<?php //dynamic_sidebar('sidebar-footer'); ?>
<?php
/*
Template Name: Képes aloldal listázó (NEW)
*/
?>
<?php get_template_part('templates/page', 'newheader'); ?>

<?php
  $the_service=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => get_the_ID(),
    'orderby' => 'menu_order',
    'order' => 'ASC'
  ));
?>
<section class="ps pagefej">
  <div class="lead"><?php the_content(); ?></div>
  <nav class="subpagetoc">
    <h3><?php _e('Tartalomjegyzék','sc') ?></h3>
    <ul class="subpagetoc">
      <?php while ($the_service->have_posts()) : $the_service->the_post(); ?>
        <li>
            <a href="#<?= sanitize_title(get_the_title()); ?>"><?php the_title() ?></a>
        </li>
      <?php endwhile; ?>
    </ul>
  </nav>
</section>
<?php $the_service->rewind(); ?>
<section class="spwrap">
  <?php while ($the_service->have_posts()) : $the_service->the_post(); ?>
    <div id="<?= sanitize_title(get_the_title()); ?>" class="ps spblock">
      <div class="spblock__inner">
        <?php $biga = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'small31'); ?>
        <a href="<?php the_permalink();?>" class="spblock__ill" style="background-image:url(<?php echo $biga[0]; ?>)"></a>
        <div class="spblock__szoveg">
          <h3 class="spblock__title"><a href="<?php the_permalink();?>"><?php the_title() ?> <small><?php echo get_post_meta( $post->ID, '_cmb_subtitle', true ); ?></small></a></h3>
          <?php the_content( __('Részletek','sc') , TRUE ); ?>
        </div>
      </div>
    </div>
  <?php endwhile; ?>

</section><!-- /.spwrap -->




<section class="promoblock">
  <?php get_template_part('templates/promo','teszt'); ?>
</section>
<?php wp_reset_query(); ?>

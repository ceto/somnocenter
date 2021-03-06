<?php
/*
Template Name: Gyógyítás Start
*/
?>
<?php get_template_part('templates/page', 'newheader'); ?>
<?php
  wp_reset_query();
  $i=0;
?>
<?php
  $the_cumo=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => get_the_ID(),
    'order' => 'ASC'
  ));
?>
<section class="gyogystartblokk">
  <div class="tab-content">
    <?php while ($the_cumo->have_posts()) : $the_cumo->the_post(); ?>
      <section id="arelem-<?php echo ++$i; ?>" <?php post_class( 'fade tab-pane container gyogyelem-'.$i.' '.(($i==1)?'active in':'') ) ?>>
        <?php
          $coco=wpautop( do_shortcode( get_the_content() ) );
          $the_service=new WP_Query(array(
            'post_type' => 'page;',
            'posts_per_page' => -1,
            'post_parent' => get_the_ID(),
            'orderby' => 'menu_order',
            'order' => 'ASC'
          ));
          $j=0;
        ?>
        <?php while ($the_service->have_posts()) : $the_service->the_post(); ?>
       		<div class="gyogyelem-block <?php echo ((++$j+$i)%2 ==0)?'paros':'paratlan'; ?>">
        		  <div class="szoveg">
                <h3><a href="<?php the_permalink();?>"><?php the_title() ?></a></h3>
          			<div class="conti">
                  <?php the_excerpt(); ?>
          			</div>
              </div>
              <?php
                $biga = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) , 'small31');
              ?>
		          <div class="ill" style="background-image:url(<?php echo $biga[0]; ?>)"></div>
            </div>
        <?php endwhile; ?>

        <div class="page-text">
          <?php echo $coco; ?>
        </div>

      </section><!-- /.gyogyelem-# -->
    <?php endwhile; ?>
  </div><!-- /.tab-content -->
</section>
<?php wp_reset_query(); ?>
<?php get_template_part('templates/gyogyithato'); ?>

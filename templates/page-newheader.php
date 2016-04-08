<?php
  $localclass='';
  if (( get_post_meta( $post->ID, '_cmb_innermenu', true ) != 0) || ( is_page_template('page-arlista.php') || is_page_template('page-gyogyitasstart.php')  ) ) {
    $localclass="ralog";
  }

  if (has_post_thumbnail()) {
    $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small43' );
    $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium31' );
    $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large31' );
    $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'giant31' );
  } else {
    $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'small43' );
    $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'medium31' );
    $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'large31' );
    $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'giant31' );
  }
?>

<style type="text/css">
  .page-headerfigure {
    background-image:url('<?php echo $imcismall['0']; ?>');
  }
  @media only screen and (min-width: 768px) {
    .page-headerfigure {
      background-image:url('<?php echo $imcimedium['0']; ?>');
    }
  }
  @media only screen and (min-width: 1280px) {
    .page-headerfigure {
      background-image:url('<?php echo $imcigreat['0']; ?>');
    }
  }
  @media only screen and (min-width: 1600px) {
    .page-headerfigure {
      background-image:url('<?php echo $imcigiant['0']; ?>');
    }
  }
</style>

<div class="page-headerfigure <?php echo $localclass;  ?>">
  <div class="fosrow">
    <header class="hero-block" role="complementary">
        <div class="hero-text">
          <h1 class="nagy">
            <span class="active"><?php echo roots_title(); ?></span>
          </h1>
          <?php if (get_post_meta( $post->ID, '_cmb_subtitle', true )!='' ): ?>
            <p class="kicsi"><span><?php echo get_post_meta( $post->ID, '_cmb_subtitle', true ); ?></span></p>
          <?php endif; ?>

        </div>
    </header>

    <?php get_template_part('templates/narancs'); ?>

    <?php if ( get_post_meta( $post->ID, '_cmb_innermenu', true ) != 0) : ?>
      <nav class="innernav">
        <?php wp_nav_menu( array(
          'menu'=>get_post_meta( $post->ID, '_cmb_innermenu', true ),
          'menu_class'=>'nav nav-tabs'
         )); ?>
      </nav>
    <?php elseif ( is_page_template('page-arlista.php') || is_page_template('page-gyogyitasstart.php')  ) : ?>
      <?php
        $the_cumo=new WP_Query(array(
          'post_type' => 'page;',
          'posts_per_page' => -1,
          'post_parent' => get_the_ID(),
          'order' => 'ASC'

        ));
        $i=0;
      ?>
      <nav class="innernav">
        <ul class="nav nav-tabs" id="arTab">
          <?php while ($the_cumo->have_posts()) : $the_cumo->the_post(); ?>
            <li <?php echo (++$i==1)?'class="active"':'' ?>>
              <a href="#arelem-<?php echo $i; ?>" data-toggle="tab">
                <strong><?php the_title() ?></strong>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      </nav>
    <?php endif; ?>

  </div>
</div>




<?php if ( is_page_template('page-landing.php') || is_page_template('page-kozpontok.php') ) : ?>
<?php $the_mitort=new WP_Query( array (
		'post_type' => 'page',
		'post_parent'=> '520',

	));
$i=0;
?>
<aside class="vizsgalatokhoz" role="complementary">
  <ul class="nav nav-tabs clearfix" id="myTab">
    <?php while ($the_mitort->have_posts()) : $the_mitort->the_post(); ?>
      <li <?php echo (++$i==1)?'class="active"':'' ?>>
        <a href="#vizsgalathoz-<?php echo $i; ?>" data-toggle="tab">
          <?php the_title() ?>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
  <?php 
    wp_reset_query();
    $i=0;
  ?>
  <div class="tab-content">
    <?php while ($the_mitort->have_posts()) : $the_mitort->the_post(); ?>
      <section id="vizsgalathoz-<?php echo ++$i; ?>" <?php post_class( 'fade tab-pane container vizsgalathoz-'.$i.' '.(($i==1)?'active in':'') ) ?>>
      	<div class="row clearfix">
      		<div class="vizsgalathoz-block">
        			<div class="conti">
        				<?php the_content(); ?>
        			</div>
      		</div>
      	</div>
      </section><!-- /.vizsgalathoz-# -->
    <?php endwhile; ?>
  </div><!-- /.tab-content -->
</aside>
<?php wp_reset_query(); ?>



<?php endif; ?>
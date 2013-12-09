<?php
/*
Template Name: Gyógyítás Start
*/
?>

<div class="fa">
  <aside class="gyfej">
    <h3>Az alvászavar gyógyítható
      <small>Az alvászavar okainak feltárása az szakorvosi konzultációval kezdődik.</small>
    </h3>
    <a href="?page_id=70" class="btn">Kezdje itt a gyógyulást<small>Az első konzultáció részletei</small></a>
  </aside>
	<?php get_template_part('templates/page', 'header'); ?>
	<?php get_template_part('templates/content', 'page'); ?>
</div>
<?php
	$the_cumo=new WP_Query(array(
		'post_type' => 'page;',
		'posts_per_page' => -1,
		'post_parent' => get_the_ID()
		
	));
	$i=0;
?>
<section class="gyogystartblokk">
  <h2>A vizsgálatok bemutatása</h2>
  <ul class="nav nav-tabs gyogyTab" id="gyogyTab">
    <?php while ($the_cumo->have_posts()) : $the_cumo->the_post(); ?>
      <li <?php echo (++$i==1)?'class="active"':'' ?>>
        <a href="#gyogyelem-<?php echo $i; ?>" data-toggle="tab">
          <?php the_title() ?>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
  <?php 
    rewind($the_cumo);
    $i=0;
  ?>
  <div class="tab-content">
    <?php while ($the_cumo->have_posts()) : $the_cumo->the_post(); ?>
      <section id="gyogyelem-<?php echo ++$i; ?>" <?php post_class( 'fade tab-pane container gyogyelem-'.$i.' '.(($i==1)?'active in':'') ) ?>>
      	<div class="row clearfix">
      		<div class="gyogyelem-block clearfix">
        			<!--h3><?php the_title() ?></h3-->
        			<div class="conti">
        				
                <?php the_content(); ?>
        			</div>
		      	</div>
      	</div>
      </section><!-- /.gyogyelem-# -->
    <?php endwhile; ?>
  </div><!-- /.tab-content -->
</section>
<?php wp_reset_query(); ?>
<?php get_template_part('templates/gyogyithato'); ?>

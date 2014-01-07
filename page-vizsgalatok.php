<?php
/*
Template Name: Vizsgálatok lista
*/
?>
<div class="indent">
	<?php get_template_part('templates/page', 'header'); ?>
	<?php get_template_part('templates/content', 'page'); ?>
</div>
<?php
	$the_exam=new WP_Query(array(
		'post_type' => 'page;',
		'posts_per_page' => -1,
		'post_parent' => get_the_ID()
		
	));
?>
<div class="vizsga-lista">
	<?php while ($the_exam->have_posts()) : $the_exam->the_post(); ?>
  	<div <?php post_class('exam clearfix'); ?> >
  		<div class="inner">
	  		<figure>
	  			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pikto-endosz.png" alt="<?php the_title(); ?>">
	  			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pikto-svajci.png" alt="<?php the_title(); ?>">
	  			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pikto-pontok.png" alt="<?php the_title(); ?>">
	  			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/pikto-ora.png" alt="<?php the_title(); ?>">

	  		</figure>
	  		<h2><a href="<?php	the_permalink(); ?>"><?php the_title(); ?></a></h2>
	  		<p class="excerpt"><?php the_excerpt(); ?></p>
  		</div>
  	</div>
	<?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
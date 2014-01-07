<?php
/*
Template Name: Felezett oldalpár
*/
?>
<nav class="nav-inner">
	<ul class="clearfix">
		<li><a href="?page_id=49">Betegségek</a></li>
		<li class="active"><a href="?page_id=43">Tünetek</a></li>
	</ul>
</nav>
<?php get_template_part('templates/page', 'header'); ?>
<?php
	$the_subpage=new WP_Query(array(
		'post_type' => 'page;',
		'posts_per_page' => -1,
		'post_parent' => get_the_ID(),
	));
	$i=0;
?>
<?php while ($the_subpage->have_posts()) : $the_subpage->the_post(); ?>
	<div class="feles <?php echo ($i++%2==1)?'feles2':''; ?>">
  	 <h2><?php the_title(); ?></h2>
  	 <div class="conti">
  	 	<?php the_content(); ?>
  	 </div>
	</div>
<?php endwhile; ?>
<?php wp_reset_query(); ?>
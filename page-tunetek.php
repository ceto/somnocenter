<?php
/*
Template Name: Tünetek lista
*/
?>
<!-- nav class="nav-inner">
	<ul class="clearfix">
		<li><a href="?page_id=49">Betegségek</a></li>
		<li class="active"><a href="?page_id=43">Tünetek</a></li>
	</ul>
</nav -->
<div class="fejecske clearfix">
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="fej-cont">
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
</div>
<?php
	$the_subpage=new WP_Query(array(
		'post_type' => 'page;',
		'posts_per_page' => -1,
		'post_parent' => get_the_ID(),
	));
	$i=0;
?>
<div class="felezett clearfix">
<?php while ($the_subpage->have_posts()) : $the_subpage->the_post(); ?>
	<div class="feles <?php echo ($i++%2==1)?'feles2':''; ?>">
    <h2><?php the_title(); ?></h2>
    <?php
      $the_tunet=new WP_Query(array(
        'post_type' => 'page;',
        'posts_per_page' => -1,
        'post_parent' => get_the_ID(),
      ));
    ?>
    <div id="accordion<?php echo $i; ?>">
      <?php while ($the_tunet->have_posts()) : $the_tunet->the_post(); ?>
        <div class="tuncike panel clearfix">
          <h3>
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion<?php echo $i; ?>" href="#t<?php echo get_the_ID(); ?>">
              <?php the_title(); ?>
            </a>
          </h3>
        	<div class="conti collapse clearfix" id="t<?php echo get_the_ID(); ?>">
        	 <div class="belso">
             <?php the_content(); ?>
            </div><!-- /.belso -->
          </div>

        </div><!-- /.tuncike -->
      <?php endwhile; ?>
    </div><!-- /#accordion -->
  </div>
<?php endwhile; ?>
</div><!-- /.felezett -->
<?php get_template_part('templates/gyogyithato'); ?>
<?php wp_reset_query(); ?>
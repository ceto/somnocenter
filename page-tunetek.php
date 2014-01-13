<?php
/*
Template Name: Tünetek lista
*/
?>
<div class="fejecske">
  <div class="fej-cont">
    <aside class="hero-block" role="complementary">
      <div class="hero-text">
        <h3>Alvászavar tünetek és betegségek</h3>
        <p>Tünetei alapján az alvászavarok felismerhetők</p>
      </div>
    </aside><!-- /.home-blokk -->
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
<div class="felezett">
  <div class="inner">
<?php while ($the_subpage->have_posts()) : $the_subpage->the_post(); ?>
	<div class="feles <?php echo ($i++%2==1)?'feles2':'feles1'; ?>">
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
        <div class="tuncike panel">
          <h3>
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion<?php echo $i; ?>" href="#t<?php echo get_the_ID(); ?>">
              <?php the_title(); ?><span class="icon"></span>
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
</div>
</div><!-- /.felezett -->
<section class="betegsegek">
  <div class="inner">
  <h2>A leggyakoribb alvászavarbetegségek</h2>
  <?php
  $the_beteg=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'post_parent' => 49,
  ));
  $i=0;
  ?>
  <ul class="betegseg-list">
    <?php while ($the_beteg->have_posts()) : $the_beteg->the_post(); ?>
      <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
  </ul>
    <?php get_template_part('templates/gyogyithato'); ?>
  </div>
</section>
<?php wp_reset_query(); ?>
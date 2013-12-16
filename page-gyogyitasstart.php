<?php
/*
Template Name: Gyógyítás Start
*/
?>

<div class="fa">
  <aside class="gyfej">
    <h3>Az alvászavar okainak feltárása az szakorvosi konzultációval kezdődik.</h3>
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
        
        <?php
          $the_service=new WP_Query(array(
            'post_type' => 'page;',
            'posts_per_page' => -1,
            'post_parent' => get_the_ID()
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
		      	
            </div>
        <?php endwhile; ?>


      </section><!-- /.gyogyelem-# -->
    <?php endwhile; ?>
  </div><!-- /.tab-content -->
</section>
<?php wp_reset_query(); ?>
<?php get_template_part('templates/gyogyithato'); ?>

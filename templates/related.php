<?php if ( (!is_page_template('page-landing.php')) && (!is_page_template('page-registereddl.php')) && (!is_page_template('page-orvosok.php')) && ($post->post_parent != '179') && (is_singular()) && (!is_page(2)) && (!is_page(43)) && (!is_page(53)) && (!is_front_page()) ) : ?>
<aside class="vizsgalatokhoz" role="complementary">
  <ul class="nav nav-tabs clearfix" id="myTab">
      <li class="active">
        <a href="#vizsgalathoz-1" data-toggle="tab">
          Kapcsolódó írások
        </a>
      </li>
  </ul>
  <div class="tab-content">
      <section id="vizsgalathoz-1" <?php post_class( 'fade tab-pane container vizsgalathoz-1 active in'); ?>>
      	<div class="row clearfix">
      		<div class="vizsgalathoz-block">
        			<div class="conti">
        				<?php get_template_part('templates/yarpp', 'definition' ); ?>
        			</div>
      		</div>
      	</div>
      </section><!-- /.vizsgalathoz-# -->

  </div><!-- /.tab-content -->
</aside>
<?php endif; ?>
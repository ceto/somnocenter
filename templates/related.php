<?php if ( ($post->post_parent == '49') || is_single() ) : ?>
<aside class="vizsgalatokhoz" role="complementary">
  <ul class="nav nav-tabs clearfix" id="myTab">
      <li class="active">
        <a href="#vizsgalathoz-<?php echo $i; ?>" data-toggle="tab">
          Kapcsolódó írások
        </a>
      </li>
  </ul>
  <div class="tab-content">
      <section id="vizsgalathoz-<?php echo ++$i; ?>" <?php post_class( 'fade tab-pane container vizsgalathoz-'.$i.' '.(($i==1)?'active in':'') ) ?>>
      	<div class="row clearfix">
      		<div class="vizsgalathoz-block clearfix">
        			<div class="conti">
        				<?php related_entries(); ?>
        			</div>
      		</div>
      	</div>
      </section><!-- /.vizsgalathoz-# -->
  </div><!-- /.tab-content -->
</aside>
<?php endif; ?>
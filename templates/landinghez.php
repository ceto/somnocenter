<?php if ( is_page_template('page-landing.php') || is_page_template('page-kozpontok.php') ) : ?>

  <?php if ( get_post_meta( get_the_ID(), 'tabs', true ) ) : ?>
    
    
    <aside class="vizsgalatokhoz" role="complementary">
      <?php $tabs = get_post_meta( get_the_ID(), 'tabs', true ); $i=0; ?>

      <ul class="nav nav-tabs clearfix" id="myTab">
        <?php foreach ( (array) $tabs as $key => $entry ) { ?>
          <li <?=  (++$i==1)?'class="active"':'' ?>>
            <a href="#vizsgalathoz-<?php echo $i; ?>" data-toggle="tab"><?= $entry['tabtitle']; ?></a>
          </li>
        <?php } ?>
      </ul>

      <div class="tab-content">
        <?php reset($tabs); $i=0; ?>
        <?php foreach ( (array) $tabs as $key => $entry ) { ?>
          <section id="vizsgalathoz-<?php echo ++$i; ?>" <?php post_class( 'fade tab-pane container vizsgalathoz-'.$i.' '.(($i==1)?'active in':'') ) ?>>
          	<div class="row clearfix">
          		<div class="vizsgalathoz-block">
            			<div class="conti"><?= wpautop($entry['tabcontent']); ?></div>
          		</div>
          	</div>
          </section><!-- /.vizsgalathoz-# -->
        <?php } ?>
      </div><!-- /.tab-content -->
    </aside>
    
  <?php endif; ?>

<?php endif; ?>
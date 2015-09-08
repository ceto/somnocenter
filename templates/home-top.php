<div class="container home-top">  


<div id="owl-home" class="owl-carousel owl-theme">

    <?php if ( get_post_meta( get_the_ID(), 'slides', true ) ) {
      $slides = get_post_meta( get_the_ID(), 'slides', true );
      $i=0;
      foreach ( (array) $slides as $key => $entry ) { ?>
        
        <?php
          if ($entry['photo']!='') {
            $imcismall = wp_get_attachment_image_src( $entry['photo_id'] , 'small43' ); 
            $imcimedium = wp_get_attachment_image_src( $entry['photo_id'] , 'medium31' ); 
            $imcigreat = wp_get_attachment_image_src( $entry['photo_id'] , 'large31' );
            $imcigiant = wp_get_attachment_image_src( $entry['photo_id'] , 'giant31' );  
          } else {
            $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'small43' ); 
            $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'medium31' ); 
            $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'large31' );
            $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'giant31' ); 
          }
        ?>



        <div class="item item-<?= ++$i; ?>">
          <style type="text/css">
            .item-<?= $i; ?> {
              background-image:url('<?php echo $imcismall['0']; ?>');
            }
            @media only screen and (min-width: 768px) {
              .item-<?= $i; ?> {
                background-image:url('<?php echo $imcimedium['0']; ?>');
              }
            }
            @media only screen and (min-width: 1280px) {
              .item-<?= $i; ?> {
                background-image:url('<?php echo $imcigreat['0']; ?>');
              }
            }
            @media only screen and (min-width: 1600px) {
              .item-<?= $i; ?> {
                background-image:url('<?php echo $imcigiant['0']; ?>');
              }
            }
          </style>
          <div class="row">
            <div class="hero-text">
              <h3 class="nagy"><span class="active"><?= $entry['title'] ?></span></h3>
              <h4 class="kicsi"><span><?= $entry['subtitle'] ?></span></h4>
            </div>
            <div class="hero-action">
              <a href="<?= $entry['url'] ?>" class="btn"><?= $entry['button'] ?></a>
            </div>
          </div>
        </div><!-- /.item-->
    <?php } } ?>
</div>

    <aside class="telfej hometopi">
      <div class="tart">
        <span class="head"><?php _e('Szeretne kipihenten ébredni?','roots'); ?></span>  
        <a href="tel:0036205007993" class="telcsi">+36 20 500 7993</a>
        <a class="click" href="<?php echo get_permalink(520);?>"><?php _e('jelentkezzen vizsgálatra online','roots'); ?></a>
      </div>
    </aside>


</div><!-- /.home-top -->









<div class="container document" role="document">
<div class="content row">
    <div class="home-ads">
    <?php if ( get_post_meta( get_the_ID(), 'ads', true ) ) {
      $ads = get_post_meta( get_the_ID(), 'ads', true );
      $i=0;
      foreach ( (array) $ads as $key => $entry ) { ?>
        <aside class="home-featured home-featured-<?= ++$i; ?> clearfix">
          <?php
            if ($entry['photo']!='') {
              $imcismall = wp_get_attachment_image_src( $entry['photo_id'] , 'small43' ); 
              $imcimedium = wp_get_attachment_image_src( $entry['photo_id'] , 'medium31' ); 
            } 
          ?>
          <style type="text/css">
              .home-featured-<?= $i; ?> {
                background-image:url('<?php echo $imcismall['0']; ?>');
              }
              @media only screen and (min-width: 768px) {
                .home-featured-<?= $i; ?> {
                  background-image:url('<?php echo $imcimedium['0']; ?>');
                }
              }
          </style>
          <div class="finner">
            <h3><a href="<?= $entry['url'] ?>"><?= $entry['title'] ?></a></h3>
            <a href="<?= $entry['url'] ?>" class="btn"><?= $entry['button'] ?></a>
          </div>
        </aside>
    <?php } } ?>
    </style>

  

</div><!-- /.content -->
</div><!-- /.container .document -->

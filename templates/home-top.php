<?php 
  if (has_post_thumbnail()) {
    $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small43' ); 
    $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium31' ); 
    $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large31' );
    $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'giant31' );  
  } else {
    $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'small43' ); 
    $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'medium31' ); 
    $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'large31' );
    $imcigiant = wp_get_attachment_image_src( get_post_thumbnail_id( 10 ), 'giant31' ); 
  }
?>

<style type="text/css">
  .home-top {
    background-image:url('<?php echo $imcismall['0']; ?>');
  }
  @media only screen and (min-width: 768px) {
    .home-top {
      background-image:url('<?php echo $imcimedium['0']; ?>');
    }
  }
  @media only screen and (min-width: 1280px) {
    .home-top {
      background-image:url('<?php echo $imcigreat['0']; ?>');
    }
  }
  @media only screen and (min-width: 1600px) {
    .home-top {
      background-image:url('<?php echo $imcigiant['0']; ?>');
    }
  }
</style>
<div class="container home-top">  
  <div class="row">
    <aside class="hero-block" role="complementary">
      <div class="hero-text">
        <h3 class="nagy">
          <span class="active"><?php _e('Napközben álmos és fáradt?','roots'); ?></span>
          <span><?php _e('Éjszaka többször felébred?','roots'); ?></span>
          <span><?php _e('Hangosan horkol?','roots'); ?></span>
          <span><?php _e('Magas a vérnyomása?','roots'); ?></span>
          <span><?php _e('Nem tud elaludni?','roots'); ?></span>
        </h3>
        <h4 class="kicsi"><span><?php _e('A tünetek hátterében alvászavarok állhatnak','roots'); ?></span></h4>
      </div>
      <div class="hero-action">
        <a href="<?php echo get_permalink(43); ?>" class="btn"><?php _e('Ismerje meg a tüneteket','roots'); ?></a>
      </div>
    </aside><!-- /.home-blokk -->
    <aside class="telfej hometopi">
    <div class="tart">
      <span class="head"><?php _e('Szeretne kipihenten ébredni?','roots'); ?></span>  
      <a href="tel:0036205007993" class="telcsi">+36 20 500 7993</a>
      <a class="click" href="<?php echo get_permalink(520);?>"><?php _e('jelentkezzen vizsgálatra online','roots'); ?></a>
    </div>
  </aside>
  </div>
</div><!-- /.home-top -->
<div class="container document" role="document">
<div class="content row">
  <aside class="home-banner clearfix">
      <h3><?php _e('Van e önnek alvászavara?','roots'); ?></h3>
      <a href="<?php echo get_permalink(1197); ?>" class="btn"><?php _e(' perces alvászavar teszt','roots'); ?></a>
  </aside>
  <aside class="home-featured clearfix">
      <?php dynamic_sidebar('sidebar-featured'); ?>
  </aside>

</div><!-- /.content -->
</div><!-- /.container .document -->
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
          <span class="active">Napközben álmos és fáradt?</span>
          <span>Éjszaka többször felébred?</span>
          <span>Hangosan horkol?</span>
          <span>Magas a vérnyomása?</span>
          <span>Nem tud elaludni?</span>
        </h3>
        <h4 class="kicsi"><span>A tünetek hátterében alvászavarok állhatnak</span></h4>
      </div>
      <div class="hero-action">
        <a href="<?php echo get_permalink(43); ?>" class="btn">Ismerje meg a tüneteket</a>
      </div>
    </aside><!-- /.home-blokk -->
    <aside class="telfej hometopi">
    <div class="tart">
      <span class="head">Szeretne kipihenten ébredni?</span>  
      <a href="tel:0036205007993" class="telcsi">+36 20 500 7993</a>
      <a class="click" href="<?php echo get_permalink(520);?>">jelentkezzen vizsgálatra online</a>
    </div>
  </aside>
  </div>
</div><!-- /.home-top -->
<div class="container document" role="document">
<div class="content row">
  <aside class="home-banner clearfix">
      <h3>Van e önnek alvászavara?</h3>
      <a href="<?php echo get_permalink(1197); ?>" class="btn">1 perces alvászavar teszt</a>
  </aside>
  <aside class="home-featured clearfix">
      <?php dynamic_sidebar('sidebar-featured'); ?>
  </aside>

</div><!-- /.content -->
</div><!-- /.container .document -->
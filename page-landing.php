<?php
/*
Template Name: Landing Page Űrlappal 
*/
?>
<?php 
  $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  $tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
?>
<style>
  .main{
    background-image:url('<?php echo $tn; ?>');
    background-size: cover;
    background-attachment: fixed;
  }
</style>
<div class="landinghead szigorow" >
  <div class="balfel">
    <div class="landcont-wrap">
      <h1 class="landing-title"><?php the_title(); ?></h1>
      <div class="landing-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <div class="jobbfel">
      <?php get_template_part('templates/contact','form'); ?>
  </div>
</div>
<div class="landingbott szigorow">
  <div class="balfel">
    <div class="vat-wrap">
      <h3>Somnocenter – Terápiás megoldás az alvászavarra.</h3>
      <p>A SomnoCenter Alvászavar Központokban valamennyi, mintegy 90 féle alvászavart diagnosztizáljuk és kezeljük. Tapasztalt alvásszakértő orvosainkkal, csúcsminőségű alvásvizsgálatainkkal és hatékony terápiás módszereinkkel Budapesten, Pécsen és Szegeden várjuk mindazokat, akik szeretnének újra kipihenten ébredni.</p>
    </div>
  </div>
  <div class="jobbfel">
    <div class="vat-wrap">
      <h3>Miért a somnocenter?</h3>
      <ul>
        <li>Mert mit tudjuk, mi kell a pihentető alváshoz!</li>
        <li>Mert nálunk valamennyi alvászavar jól kezelhető!</li>
        <li>Mert központjainkban az ország legjobb alvásszakértő orvosai várják!</li>
        <li>Mert hozzánk ritka alvásbetegségeivel is fordulhat!</li>
        <li>Mert centrumainkban hosszú várakozási idő nélkül juthat diagnózishoz és terápiához!</li>
        <li>Mert hatékony módszereinkkel visszaállítjuk az egészségét és a munkaképességét!</li>
        <li>Mert a SomnoCenter az egyetlen országos, az Európai és a Magyar Alvástársaság által akkreditált alvásdiagnosztikai és terápiás központ hálózat</li>
      </ul>
    </div>
  </div>
</div>
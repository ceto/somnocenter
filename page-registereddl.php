<?php
/*
Template Name: Letöltés Sablon Orvosoknak
*/
?>

<?php
  //$imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'banner169');
  //$tn=has_post_thumbnail()?$imci[0]:get_stylesheet_directory_uri().'/assets/img/parocska.jpg';
?>
<style>
  .page .main{
    padding-top: 2em;
  }
</style>
<div class="surveyhead szigorow" >


  <div class="balfel">
    <div class="surveycont-wrap">

      <?php if (has_post_thumbnail() ): ?>
        <figure class="survey-fig">
          <?php the_post_thumbnail('medium21'); ?>
        </figure>
      <?php endif; ?>
      <h1 class="survey-title"><?php the_title(); ?></h1>
      <?php if (get_post_meta( $post->ID, '_cmb_subtitle', true )!='' ): ?>
        <h2><?php echo do_shortcode(get_post_meta( $post->ID, '_cmb_subtitle', true ) ); ?></h2>
      <?php endif; ?>

      <div class="survey-content">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <div class="jobbfel">

  <h3><?php _e('A letöltés regisztrációhoz kötött', 'somnocenter') ?></h3>

    <!-- Contact Form -->
    <form class="form contact-form" id="contact_regdl_form" method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/contact_regdl.php">


      <!-- Name -->
      <div class="controls">
          <input type="text" name="name" id="name" placeholder="Adja meg nevét" pattern=".{3,100}" required>
      </div>

      <!-- Email -->
      <div class="controls">
          <input type="email" name="email" id="email" placeholder="E-mail címét" pattern=".{5,100}" required>
      </div>

      <div class="controls">
        <input type="text" name="code" id="code" placeholder="Orvosi pecsét száma" pattern=".{5,5}" required>
      </div>

      <div class="controls">
        <textarea name="msg" id="msg" pattern=".{5,100}" rows="5" placeholder="Ha kérdése van itt felteheti..." maxlength="400"></textarea>
      </div>

      <div id="result"></div>
      <div class="actions">
        <input type="hidden" name="dlfilename" id="dlfilename" value="<?= get_post_meta( $post->ID, '_cmb_dlfilename', true ) ?>">
        <input type="hidden" name="dlfile" id="dlfile" value="<?= get_post_meta( $post->ID, '_cmb_dlfile', true ) ?>">
        <button class="btn button" id="submit_btn">Letöltés&nbsp;&nbsp;<i class="ion ion-ios7-download"></i></button>
      </div>

    </form>
<!-- End Contact Form -->


  </div>

</div>
<?php
/*
Template Name: Tünetlista (NEW)
*/
?>
<?php get_template_part('templates/page', 'newheader'); ?>
<section class="ps pagefej">
  <div class="lead"><?php the_content(); ?></div>
  <nav class="tunetnav">
    <h3>Nappali tünetek</h3>
    <ul class="subpagetoc">
      <?php
        $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
        foreach ( (array) $sections as $key => $entry ) {
        if ( isset( $entry['content'] ) ) : ?>
        <li>
            <a href="#<?= sanitize_title($entry['name']); ?>"><?= $entry['name'] ?></a>
        </li>
      <?php endif; } ?>
    </ul>
  </nav>
  <nav class="tunetnav">
    <h3>Éjszakai tünetek</h3>
    <ul class="subpagetoc">
      <?php
        $sections = get_post_meta( get_the_ID(), 'page_repeat_group_2', true );
        foreach ( (array) $sections as $key => $entry ) {
        if ( isset( $entry['content'] ) ) : ?>
        <li>
            <a href="#<?= sanitize_title($entry['name']); ?>"><?= $entry['name'] ?></a>
        </li>
      <?php endif; } ?>
    </ul>
  </nav>
</section>
<div class="tunetlistawrap">
  <section id="nappalitunetek" class="tunetek">
    <header class="ps ps--narrow">
      <h2>Nappali alvászavar tünetek</h2>
      <?= apply_filters( 'the_content', get_post_meta( get_the_ID(), 'lead', true)  ) ?>
    </header>
    <?php
      $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
      foreach ( (array) $sections as $key => $entry ) {
      if ( isset( $entry['content'] ) ) : ?>
      <div id="<?= sanitize_title($entry['name']); ?>" class="ps ps--narrow tunet">
        <div class="tunet__wrap">
          <h3 class="tunet__name"><?= $entry['name'] ?></h3>
          <div class="tunet__cont"><?= apply_filters( 'the_content', $entry['content']  ) ?></div>
        </div>
      </div>
    <?php endif; } ?>
  </section>

  <section id="ejszakaitunetek" class="tunetek tunetek--ejszakai">
    <header class="ps ps--narrow">
      <h2>Éjszakai alvászavar tünetek</h2>
      <?= apply_filters( 'the_content', get_post_meta( get_the_ID(), 'lead', true)  ) ?>
    </header>
    <?php
      $sections = get_post_meta( get_the_ID(), 'page_repeat_group_2', true );
      foreach ( (array) $sections as $key => $entry ) {
      if ( isset( $entry['content'] ) ) : ?>
      <div id="<?= sanitize_title($entry['name']); ?>" class="ps ps--narrow tunet">
        <div class="tunet__wrap">
          <h3 class="tunet__name"><?= $entry['name'] ?></h3>
          <div class="tunet__cont"><?= apply_filters( 'the_content', $entry['content']  ) ?></div>
        </div>
      </div>
    <?php endif; } ?>
  </section>
</div>


<section class="promoblock">
  <?php get_template_part('templates/promo','teszt'); ?>
</section>
<?php wp_reset_query(); ?>

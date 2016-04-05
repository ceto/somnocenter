<?php
/*
Template Name: Tünetlista (NEW)
*/
?>
<?php get_template_part('templates/page', 'headerfigure'); ?>
<section class="ps tunetfej">
  <div class="lead"><?php the_content(); ?></div>
  <nav class="tunetnav">
    <h3>Nappali tünetek</h3>
    <ul class="tunetlist">
      <?php
        $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
        foreach ( (array) $sections as $key => $entry ) {
        if ( isset( $entry['content'] ) ) : ?>
        <li>
            <a href="#<?= sanitize_title(get_the_title()) .'-'.$key; ?>"><?= $entry['name'] ?></a>
        </li>
      <?php endif; } ?>
    </ul>
  </nav>
  <nav class="tunetnav">
    <h3>Éjszakai tünetek</h3>
    <ul class="tunetlist">
      <?php
        $sections = get_post_meta( get_the_ID(), 'page_repeat_group_2', true );
        foreach ( (array) $sections as $key => $entry ) {
        if ( isset( $entry['content'] ) ) : ?>
        <li>
            <a href="#<?= sanitize_title(get_the_title()) .'-'.$key; ?>"><?= $entry['name'] ?></a>
        </li>
      <?php endif; } ?>
    </ul>
  </nav>
</section>

<section id="nappalitunetek" class="nappalitunetek">
  <header class="ps">
    <h2>Nappali alvászavar tünetek</h2>
  </header>
  <?php
    $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
    foreach ( (array) $sections as $key => $entry ) {
    if ( isset( $entry['content'] ) ) : ?>
    <div id="<?= sanitize_title(get_the_title()) .'-'.$key; ?>" class="ps ps--narrow tunet">
        <h3 class="tunet__name"><?= $entry['name'] ?></h3>
        <div class="tunet__cont"><?= apply_filters( 'the_content', $entry['content']  ) ?></div>
    </div>
  <?php endif; } ?>
</section>

<section id="ejszakaitunetek" class="ejszakaitunetek">
  <header class="ps">
    <h2>Éjszakai alvászavar tünetek</h2>
  </header>
  <?php
    $sections = get_post_meta( get_the_ID(), 'page_repeat_group_2', true );
    foreach ( (array) $sections as $key => $entry ) {
    if ( isset( $entry['content'] ) ) : ?>
    <div id="tunet--<?= sanitize_title(get_the_title()) .'-'.$key; ?>" class="ps ps--narrow tunet">
        <h3 class="tunet__name"><?= $entry['name'] ?></h3>
        <div class="tunet__cont"><?= apply_filters( 'the_content', $entry['content']  ) ?></div>
    </div>
  <?php endif; } ?>
</section>



<section class="betegsegek">
  <div class="inner">
  <h2><?php _e('A leggyakoribb alvászavar betegségek','roots'); ?></h2>
  <?php
  $the_beteg=new WP_Query(array(
    'post_type' => 'page;',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'post_parent' => 49,
  ));
  $i=0;
  ?>
  <ul class="betegseg-list">
    <?php while ($the_beteg->have_posts()) : $the_beteg->the_post(); ?>
      <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
  </ul>
    <?php get_template_part('templates/gyogyithato'); ?>
  </div>
</section>
<?php wp_reset_query(); ?>

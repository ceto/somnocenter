<?php
/*
Template Name: Tünetlista (NEW)
*/
?>
<?php get_template_part('templates/page', 'newheader'); ?>
<section class="ps pagefej">
  <div class="lead"><?php the_content(); ?></div>
</section>
  <?php
    $sections = get_post_meta( get_the_ID(), 'page_repeat_group', true );
    $sections2 = get_post_meta( get_the_ID(), 'page_repeat_group_2', true );
    $i=0;
  ?>
<div class="tunetlistawrap ps">
  <section id="nappalitunetek" class="tunetek tunetek--nappali">
    <header>
      <h2>Nappali tünetek</h2>
    </header>
    <div id="accordion0">
      <?php foreach ( (array) $sections as $key => $entry ) : ?>
          <div class="tuncike panel">
            <h3>
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion0" href="#<?= sanitize_title($entry['name']); ?>"><?= $entry['name'] ?><span class="icon"></span>
              </a>
            </h3>
            <div class="conti collapse clearfix" id="<?= sanitize_title($entry['name']); ?>">
             <div class="belso">
               <?= apply_filters( 'the_content', $entry['content']  ) ?>
              </div><!-- /.belso -->
            </div>
          </div><!-- /.tuncike -->
      <?php endforeach; ?>
    </div><!-- /#accordion -->
  </section>

  <section id="ejszakaitunetek" class="tunetek tunetek--ejszakai">
    <header>
      <h2>Éjszakai tünetek</h2>
    </header>
    <div id="accordion1">
      <?php foreach ( (array) $sections2 as $key => $entry ) : ?>
          <div class="tuncike panel">
            <h3>
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#<?= sanitize_title($entry['name']); ?>"><?= $entry['name'] ?><span class="icon"></span>
              </a>
            </h3>
            <div class="conti collapse clearfix" id="<?= sanitize_title($entry['name']); ?>">
             <div class="belso">
               <?= apply_filters( 'the_content', $entry['content']  ) ?>
              </div><!-- /.belso -->
            </div>
          </div><!-- /.tuncike -->
      <?php endforeach; ?>
    </div><!-- /#accordion -->
  </section>
</div>


<section class="promoblock">
  <?php get_template_part('templates/promo','teszt'); ?>
</section>
<?php wp_reset_query(); ?>

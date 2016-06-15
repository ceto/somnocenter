<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
<section class="authorlead felteke">
  <figure class="authfig">
    <?php
    $ima = get_the_author_meta('_cmb_portre_id', $curauth->ID );
    $imci = wp_get_attachment_image_src( $ima, 'medium34');
    ?>
    <img src="<?php echo $imci[0]; ?>" width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" alt="<?= $curauth->display_name; ?>" class="orvos-thumb">
  </figure>
  <div class="authinf">
    <h1>
    <?= $curauth->display_name; ?><small>&mdash; <?= get_the_author_meta( '_cmb_titulus', $curauth->ID); ?></small>
    </h1>
    <!-- <p class="city"><?= get_the_author_meta('_cmb_city', $curauth->ID ); ?></p> -->
    <div class="lead"><?php echo get_the_author_meta('description') ?></div>
  </div>
</section>
<nav class="">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#arckep" data-toggle="tab">Arckép</a></li>
    <li class=""><a href="#cv" data-toggle="tab">Önéletrajz</a></li>
  </ul>
</nav>
<div class="tab-content">
  <section id="arckep" class="tab-pane fade active in">
    <?= get_the_author_meta('_cmb_arckep', $curauth->ID ); ?>
  </section>
  <section id="cv" class="tab-pane fade">
    <?= get_the_author_meta('_cmb_cv', $curauth->ID ); ?>
  </section>
</div>


<div class="page-header">
  <h2><?php echo roots_title(); ?></h2>
</div>
<?php if (!have_posts()) : ?>
<div class="alert alert-warning">
  <?php _e('Sorry, no results were found.', 'roots'); ?>
</div>
<?php get_search_form(); ?>
<?php endif; ?>
<div class="kockak">
  <?php $kockastyle="triplasor" ?>
  <?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
  <?php endwhile; ?>
</div>
<?php if ($wp_query->max_num_pages > 1) : ?>
<nav class="post-nav">
  <ul class="pager">
    <li class="previous"><?php next_posts_link(__('<i class="ion-ios7-arrow-thin-left"></i> '.'Korábbi cikkeink', 'roots')); ?></li>
    <li class="next"><?php previous_posts_link(__('Újabb cikkeink', 'roots').' <i class="ion-ios7-arrow-thin-right"></i>'); ?></li>
  </ul>
</nav>
<?php endif; ?>
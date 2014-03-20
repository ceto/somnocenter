<div class="author-block clearfix">
   <?php
        $ima = get_user_meta( get_the_author_meta('ID'), '_cmb_portre_id', true );
        $imci = wp_get_attachment_image_src( $ima, 'petit34');
      ?>
    <img src="<?php echo $imci[0]; ?>" width="<?php echo $imci[1]; ?>" height="<?php echo $imci[2]; ?>" alt="<?php echo $user->display_name; ?>" class="orvos-thumb">

<!-- <img src="http://placehold.it/120x120&text=Photo" alt=""> -->
<p class="byline author vcard">
	<?php echo __('By', 'roots'); ?> 
	<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">
		<?php echo get_the_author(); ?></a> &mdash; <em><?php echo get_user_meta( get_the_author_meta('ID'), '_cmb_titulus', true ); ?></em>
</p>
<?php echo get_the_author_meta('description') ?>
</div>
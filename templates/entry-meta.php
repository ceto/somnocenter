<div class="entry-meta-mini">
<p class="byline-mini author vcard">
	<?php echo __('Szerző:', 'roots'); ?>
	<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a>
	&mdash;
</p>Megjelent:
<time class="published-mini" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
</div>
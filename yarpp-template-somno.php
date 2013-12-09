<?php 
/*
YARPP Template: Simple Somno Related Posts
Author:Gábor Szabó
Description: A simple YARPP template for Somnocenter.
*/
?><h3><?php _e('Kapcsolódó írások','root') ?></h3>
<?php if (have_posts()):?>
<ol>
	<?php while (have_posts()) : the_post(); ?>
	<li class="related-item">
    <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><!-- (<?php the_score(); ?>)--></h3>
    <div class="conti"><?php the_excerpt(); ?></div>
  </li>
	<?php endwhile; ?>
</ol>
<?php else: ?>
<p>No related posts.</p>
<?php endif; ?>

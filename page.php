<?php if ( is_page(4) ) :?>
<nav class="nav-inner">
	<ul class="clearfix">
		<li><a href="#">Miért minket?</a></li>
		<li class=""><a href="#">Orvosok, szakértők</a></li>
		<li class="active"><a href="#">Központok</a></li>

	</ul>
</nav>
<?php endif; ?>
<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>
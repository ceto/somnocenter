<div class="container searchcont">
	<div class="row clearfix">
		<div class="searchblock">
			<h3 class="question">Többet szeretne tudni az alvászavarokról?<small>Használja keresőnket, vagy böngésszen a <a href="?page_id=22">Somno Life</a> alvásmagazinban.</small></h3>
			<?php get_template_part( 'templates/searchform'); ?>
		</div>
		<div class="past">
			<h3>Népszerű témák a látogatók körében</h3>
			<ul>
				<?php
					$tags = get_tags( array('number' => 12, 'orderby' => 'count', 'order' => 'DESC') );
					foreach ( (array) $tags as $tag ) {
						echo '<li><a href="' . get_tag_link ($tag->term_id) . '" rel="tag">' . $tag->name . '</a></li>';
					}
				?>
			</ul>
		</div>		
	</div>
</div><!-- /.searchcont-->
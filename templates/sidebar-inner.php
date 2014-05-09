<!--a href="<?php echo get_permalink( 22 ); ?>" class="lifelogo">
  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/somnolife_logo.png" alt="Somno Life - Az alvásmagazin">
</a -->

<h3 class="rovatfej">Rovatok</h3>
<ul class="rovatlista">
  <li class="cat-sl cat-item <?php echo (is_home())?'current-cat':''; ?>"><a href="<?php echo get_permalink( 22 ); ?>">Somo Life</a></li>
<?php wp_list_categories('orderby=name&use_desc_for_title=0&child_of=7&depth=1&title_li='); ?> 
</ul>
<section class="widget widget_test">
    <h3>Van e önnek alvászavara? <small>Tünetei alapján kiderítheti</small></h3>
    <a href="<?php echo get_permalink(1197); ?>" class="btn">1 perces alvásteszt</a>
</section>
<?php dynamic_sidebar('sidebar-featured'); ?>
<?php dynamic_sidebar('sidebar-inner'); ?>

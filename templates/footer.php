<footer class="content-info container" role="contentinfo">
  <div class="row">
    <?php // dynamic_sidebar('sidebar-footer'); ?>
    <p>
      &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | 
      <?php _e('Bejelentkezés:','roots'); ?> <a href="tel:0036205007993" class="telcsi">+36 20 500 7993</a> | 
      <?php _e('Honlap és Arculat','roots'); ?> <a href="http://hydrogene.hu" target="_blank">Hydrogene</a></p>
  </div>
</footer>

<?php wp_footer(); ?>


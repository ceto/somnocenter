<footer class="content-info container" role="contentinfo">
  <div class="row">
    <?php // dynamic_sidebar('sidebar-footer'); ?>
    <p class="footer__iso">
        <img src="<?= get_template_directory_uri().'/assets/img/iso.svg' ?>" alt="ISO Certified">
      </p>
    <p class="footer__copy">
      &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> &middot; Minden jog fenntartva &middot; <a href="<?= get_permalink(2837); ?>">Jogi nyilatkozat</a> &middot; <a href="<?= get_permalink(2843); ?>">Adatok védelme</a> &middot;
      <?php _e('Időpontfoglalás:','roots'); ?> <a href="tel:0036203443434" class="telcsi">+36 20 344 3434</a> <br>
      <?php _e('Kommunikáció és sajtókapcsolat:','roots'); ?> <a href="mailto:kommunikacio@somnocenter.hu">kommunikacio@somnocenter.hu</a> vagy <a href="tel:003614878065">+36 1 487 8065</a> &middot;
      <?php _e('Honlap és Arculat:','roots'); ?> <a href="http://hydrogene.hu/referencia/egeszsegugyi-kozpont-teljes-arculat-es-honlap/" target="_blank">Hydrogene</a></p>

  </div>
</footer>

<?php wp_footer(); ?>

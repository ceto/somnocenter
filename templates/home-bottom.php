

<section class="container home-bottom">
  <div class="content row">
    <div class="disc-blokk">
      <h3><?php _e('Terápiás megoldás<small>valamennyi alvászavarra</small>','roots'); ?></h3>
      <h4><?php _e('Központjainkban mintegy 90 féle alvászavart diagnosztizálunk és kezelünk Magyarországon egyedülálló szakértelemmel. Budapesten, Pécsen és Szegeden várjuk mindazokat, akik szeretnének újra kipihenten ébredni.','roots'); ?></h4>
      <ul class="pipas">
        <?php if ( get_post_meta( get_the_ID(), 'ads', true ) ) {
          $ads = get_post_meta( get_the_ID(), 'ads', true );
          $i=0;
          foreach ( (array) $ads as $key => $entry ) { ?>
            <li><a href="<?= $entry['url'] ?>"><?= $entry['title'] ?></a></li>
        <?php } } ?>
      </ul>
    </div>
  </div><!-- /.content -->
</section><!-- /.container .document -->
<aside class="footer-dark container">
  <div class="row">
    <section class="aboutus">
      <h3><?php _e('Kik vagyunk','roots'); ?></h3>
      <p><?php _e('A központjainkban mintegy 90 féle alvászavart diagnosztizálunk és kezelünk. Budapesten, Pécsen és Szegeden várjuk mindazokat, akik szeretnének újra kipihenten ébredni.','roots'); ?></p>
    </section>
    <section class="naplo-block">
      <h3><?php _e('Meghatalmazás','roots'); ?></h3>
      <p>
        <?php _e('Ezen meghatalmazással megbízottat feljogosítja, hogy a törvényben foglaltak értelmében az Ön (megbízó) nevében eljárjon, adott betegségével, terápiájával kapcsolatos egészségügyi dokumentációját megismerje, szükség esetén másolatot készítsen róla.','roots'); ?>
      </p>
      <a class="catmore" href="http://somnocenter.hu/wp-content/uploads/2017/09/MEGHATALMAZAS_eg_ugyi_-dokumentacio_megismeresere.pdf"><?php _e('Letöltés','roots'); ?></a>
    </section>
    <?php if (!is_page(1182)): ?>
      <section class="newsletter-block">
        <!-- Begin MailChimp Signup Form -->
          <div id="mc_embed_signup">
          <form action="http://somnocenter.us8.list-manage.com/subscribe/post?u=777cff0d0124c922c39447d01&amp;id=98f01fad7f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <h3><?php _e('Alvás hírlevél havonta','roots'); ?></h3>
            <p><?php _e('Hírlevelünkből értesülhet akcióinkról, alvással kapcsolatos írásainkról','roots'); ?></p>
            <div class="mc-field-group">
              <label for="mce-EMAIL"><?php _e('E-mail cím','roots'); ?></label>
              <input type="email" value="" placeholder="<?php _e('Adja meg e-mail címét','roots'); ?>" name="EMAIL" class="required email" id="mce-EMAIL">
              <input type="submit" value="<?php _e('Mehet','roots'); ?>" name="subscribe" id="mc-embedded-subscribe" class="button btn">
            </div>
            <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_777cff0d0124c922c39447d01_98f01fad7f" value=""></div>
          </form>
          </div>
      </section>
    <?php endif; ?>

  </div>
</aside>
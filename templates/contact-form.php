<?php
  $gtm_eventscript="<script>ga('send', 'event', 'Urlap', 'Jelentkezes', '".get_the_title()."' );</script>";
  //response generation function
  $response = "";

  //function to generate response
  // function generate_response($type, $message){

  //   global $response;

  //   if($type == "success") {$response = '<div class="success">'.$message.'</div>';}
  //   else {$response = '<div class="error">'.$message.'</div>';}

  // }

  //response messages
  $not_human       = __('Ellenőrzés sikertelen. Próbálkozzon újra!','roots');
  $missing_content = __('Név és Email megadása kötelező.','roots');
  $email_invalid   = __('Érvénytelen e-mail cím','roots');
  $message_unsent  = __('Üzenet küldése nem sikerült. Próbálkozzon újra!','roots');
  $message_sent    = __('Köszönjük! Üzenetét elküldtük.','roots');

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $center = $_POST['message_center'];
  $tel = $_POST['message_tel'];
  $message = $_POST['message_text'];
  $newsletter = $_POST['message_newsletter'];
  $page = $_POST['message_page'];
  $human = $_POST['message_human'];
  $subjecto = $_REQUEST['ap_id'];

  //php mailer variables
  //$to = get_option('admin_email');
  $to = 'szabogabi@gmail.com';
  $subject = $page." ".get_bloginfo('name');

  $headers = "From: " . strip_tags($email) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if(!$human == 0){
    if($human != 2) {
      $response = '<div class="error">'.$not_human.'</div>';
    }
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $response = '<div class="error">'.$email_invalid.'</div>';
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($email)){
          $response = '<div class="error">'.$missing_content.'</div>';
        }
        else //ready to go!
        {
          $message='Név: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Központ: '.$center.'<br />'.(($newsletter==1)?'Kér hírlevelet':'Nem kér hírlevelet').'<br />'.$message;
          $sent = wp_mail($to, $subject, $message, $headers);
            if($sent) {
              wp_mail('budapest@somnocenter.hu', $subject, $message, $headers);
              wp_mail($email, $subject, $message, $headers);

              $response = '<div class="success">'.$message_sent.$gtm_eventscrip.'</div>';
            } else {
              $response = '<div class="error">'.$message_unsent.'</div>';
            }
        }
      }
    }
  }
  else
    if ($_POST['submitted']) generate_response("error", $missing_content);

?>
<div id="respond" class="contact-wrap white-popup-block szaggat amfp-hide">
  <div id="infopan"><?php echo $response; ?></div>
  <h2 class="block-title"><?php _e('Jelentkezéshez töltse ki az alábbi űrlapot','roots'); ?></h2>

  <?php wp_reset_query(); the_post(); ?>
  <form id="form-<?= get_the_id(); ?>" class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>?signup=<?= get_the_id(); ?>" method="post">

    <div class="controls">
        <label for="message_name"><?php _e('Név','roots'); ?>*</label>
        <input required type="text" placeholder="<?php _e('Adja meg nevét','roots'); ?>*" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
    </div>

    <div class="controls">
        <label for="message_tel"><?php _e('Telefon','roots'); ?></label>
        <input type="text" placeholder="<?php _e('Adja meg telefonszámát','roots'); ?>" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
    </div>

    <div class="controls">
      <label for="message_email"><?php _e('E-Mail cím','roots'); ?>*</label>
      <input required type="email" placeholder="<?php _e('E-mail címe','roots'); ?>*" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
    </div>

    <div class="controls">
      <select id="message_center" name="message_center">
        <option value="0"><?php _e('Válasszon központot','roots'); ?></option>
        <option value="Budapest">Budapest</option>
        <?php if (get_the_id()!=2426) :?>
        <option value="Pécs" disabled="disabled">Pécs - Csak telefonon (+36 30 476 1400)</option>
        <option value="Szeged">Szeged</option>
        <?php endif; ?>
      </select>
    </div>

    <div class="controls">
        <label for="message_text"><?php _e('Üzenet','roots'); ?>*</label>
        <textarea placeholder="<?php _e('Ha kérdése van itt felteheti ...','roots'); ?>" rows="7" id="message_text" name="message_text"><?php if ($_POST['message_text']!='') {
            echo $_POST['message_text']; }?></textarea>
    </div>

    <div class="controls">
      <label for="message_newsletter" class="checklabel">
        <input type="checkbox" value="1" id="message_newsletter" name="message_newsletter" <?= ($_POST['message_newsletter']==1)?'checked="checked"':''; ?>>
        <?php _e('Feliratkozom hírlevélre','roots'); ?>
      </label>

    </div>

    <div class="actions">
      <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
      <input type="hidden" name="message_page" value="<?php the_title(); ?>">
      <input type="hidden" name="message_human" value="2">
      <input type="hidden" name="submitted" value="1">
      <input type="submit" class="btn submitbtn" value="<?php _e('Jelentkezem','roots'); ?>"></p>
      <div class="oki">* <?php _e('Online jelentkezés esetén telefonon felvesszük Önnel a kapcsolatot és szolgáltatásainkról részletes információkkal szolgálunk.','roots'); ?></div>
    </div>
  </form>
</div><!-- /.contact-wrap -->
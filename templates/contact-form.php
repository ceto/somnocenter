<?php
  //response generation function
  $response = "";

  //function to generate response
  // function generate_response($type, $message){
    
  //   global $response;

  //   if($type == "success") {$response = '<div class="success">'.$message.'</div>';}
  //   else {$response = '<div class="error">'.$message.'</div>';}
    
  // }

  //response messages
  $not_human       = "Ellenőrzés sikertelen. Próbálkozzon újra!";
  $missing_content = "Név és Email megadása kötelező.";
  $email_invalid   = "Érvénytelen e-mail cím";
  $message_unsent  = "Üzenet küldése nem sikerült. Próbálkozzon újra!";
  $message_sent    = "Köszönjük! Üzenetét elküldtük.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $center = $_POST['message_center'];
  $tel = $_POST['message_tel'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];
  $subjecto = $_REQUEST['ap_id'];

  //php mailer variables
  //$to = get_option('admin_email');
  $to = 'szabogabi@gmail.com';
  $subject = "Message from ".get_bloginfo('name');

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
          $message='Név: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Központ: '.$center.'<br />'.$message;
          $sent = wp_mail($to, $subject, $message, $headers);
            if($sent) {
              wp_mail('fulop.monika@somnocenter.hu', $subject, $message, $headers);
              wp_mail($email, $subject, $message, $headers);

              $response = '<div class="success">'.$message_sent.'</div>';
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
  <h2 class="block-title">Jelentkezzen online</h2>

  <?php wp_reset_query(); the_post(); ?>
  <form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

    <div class="controls">
        <label for="message_name">Név*</label>
        <input type="text" placeholder="Adja meg nevét*" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
    </div>

    <div class="controls">
        <label for="message_tel">Telefon</label>
        <input type="text" placeholder="Adja meg telefonszámát" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
    </div>

    <div class="controls">
      <label for="message_email">E-Mail cím*</label>
      <input type="email" placeholder="E-mail címe*" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
    </div>

    <div class="controls">
      <select id="message_center" name="message_center">
        <option value="0">Válasszon központot</option>
        <option value="Budapest">Budapest</option>
        <option value="Pécs">Pécs</option>
        <option value="Szeged">Szeged</option>
      </select>
    </div>

    <div class="controls">
        <label for="message_text">Üzenet*</label>
        <textarea placeholder="Ha kérdése van itt felteheti ..." rows="7" id="message_text" name="message_text"><?php if ($_POST['message_text']!='') {
            echo $_POST['message_text']; }?></textarea>
    </div>

    <div class="actions">
      <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
      <input type="hidden" name="message_human" value="2">
      <input type="hidden" name="submitted" value="1">
      <input type="submit" class="btn submitbtn" value="<?php _e('Jelentkezem','roots'); ?>"></p>
      <div class="oki">* Online jelentkezés esetén telefonon felvesszük Önnel a kapcsolatot és szolgáltatásainkról részletes információkkal szolgálunk.</div>
    </div>
  </form>
</div><!-- /.contact-wrap -->
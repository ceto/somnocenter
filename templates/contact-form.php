<?php
  //response generation function
  $response = "";

  //function to generate response
  function generate_response($type, $message){
    
    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";
    
  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $betreff = $_POST['message_betreff'];
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
    if($human != 2) generate_response("error", $not_human); //not human!
    else {
      
      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message) || empty($tel)){
          generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $message='Name: '.$name.'<br/>'.'Tel: '.$tel.'<br />'.'Subject: '.$betreff.'<br />'.$message;
          $sent = wp_mail($to, $subject, $message, $headers);
            if($sent) generate_response("success", $message_sent); //message sent!
            else generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  } 
  else 
    if ($_POST['submitted']) generate_response("error", $missing_content);

?>
<div id="respond" class="contact-wrap white-popup-block szaggat amfp-hide">
  <div id="infopan"></div>
  <h2 class="block-title">Jelentkezzen online</h2>
  <?php echo $response; ?>
  <?php wp_reset_query(); the_post(); ?>
  <form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

    <div class="controls">
        <label for="message_name">Név*</label>
        <input type="text" required placeholder="Adja meg nevét " id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
    </div>

    <div class="controls">
        <label for="message_tel">Telefon</label>
        <input type="text" required placeholder="Adja meg telefonszámát" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
    </div>

    <div class="controls">
      <label for="message_email">E-Mail cím*</label>
      <input type="email" required placeholder="E-mail címe" id="message_email" name="message_email" value="<?php echo $_POST['message_email']; ?>">
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
        <textarea required placeholder="Ha kérdése van itt felteheti ..." rows="7" id="message_text" name="message_text" value="<?php echo $_POST['message_text']; ?>"></textarea>
    </div>

    <div class="actions">
      <input type="hidden" name="ap_id" value="<?php echo $subjecto; ?>">
      <input type="hidden" name="message_human" value="2">
      <input type="hidden" name="submitted" value="1">
      <input type="submit" class="btn submitbtn" value="<?php _e('Elküldöm','roots'); ?>"> v. <span class="ion-android-call"></span> <a href="tel:0800221101">+36 70 7705653</a></p>
      <div class="oki">*Kitöltése kötelező</div>
    </div>
  </form>
</div><!-- /.contact-wrap -->
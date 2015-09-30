<?php
if($_POST)
{


  //check if its an ajax request, exit if not
  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

  //exit script outputting json data
  $output = json_encode(
  array(
    'type'=>'error',
    'text' => 'Request must come from Ajax'
  ));

  die($output);
  }

  //check $_POST vars are set, exit if any missing
  if(!isset($_POST["userName"]) || !isset($_POST["userEmail"]) || !isset($_POST["userCode"]))
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Jelölt mezők kitöltése kötelező!'));
    die($output);
  }

  //Sanitize input data using PHP filter_var().
  $user_Name = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
  $user_Email = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
  $user_Code = filter_var($_POST["userCode"], FILTER_SANITIZE_STRING);
  $user_Dlfilename = filter_var($_POST["userDlfilename"], FILTER_SANITIZE_STRING);
  $user_Dlfile = filter_var($_POST["userDlfile"], FILTER_SANITIZE_STRING);
  $user_Msg = filter_var($_POST["userMsg"], FILTER_SANITIZE_STRING);



  $to_Email = "szabogabi@gmail.com"; //Replace with recipient email address
  $subject = $user_Dlfilename." - SomnoCenter"; //Subject line for emails


  //$user_Message = str_replace("\&#39;", "'", $user_Message);
  //$user_Message = str_replace("&#39;", "'", $user_Message);

  //additional php validation
  if(strlen($user_Name)<4) // If length is less than 4 it will throw an HTTP error.
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Adja meg nevét!'));
    die($output);
  }
  if(!filter_var($user_Email, FILTER_VALIDATE_EMAIL)) //email validation
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Érvénytelen email cím!'));
    die($output);
  }
  if( (strlen($user_Code)!==5) || !ctype_digit($user_Code) ) //check emtpy message
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Pecsétszám érvénytelen!'));
    die($output);
  }

  //proceed with PHP email.
  $headers = 'From: '.$user_Email.'' . "\r\n" .
  'Reply-To: '.$user_Email.'' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();

  $sentMail = @mail($to_Email, $subject, $user_Name . "\r\n\n" . $user_Email . "\r\n" .$user_Code. "\r\n\n" . $user_Msg, $headers);

  if(!$sentMail)
  {
    $output = json_encode(array('type'=>'error', 'text' => 'Az üzenet elküldése nem sikerült.'));
    die($output);
  }else{

    //response email to the user, added by ceto
    $resp_headers = 'From: '.$to_Email.'' . "\r\n" .
    'Reply-To: '.$to_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $resp_text="Tisztelt ".$user_Name."\r\n\n".
    "Köszönjük érdeklődését"."\r\n\n".
    "A kért dokumentumot az alábbi linken töltheti le:"."\r\n".$user_Dlfile."\r\n\n".
    "Üdvözlettel"."\r\n"."SomnoCenter - Budapest"."\r\n"."Tel: +36 20 500 7993";

    @mail($user_Email, $subject, $resp_text, $resp_headers);


    $output = json_encode(array('type'=>'message', 'text' => 'Tisztelt '.$user_Name.'! A kért dokumentum letöltési linkjét emailben megküldtük. '));
    die($output);
  }
}
?>

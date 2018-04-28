<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

// require_once 'vendor/autoload.php';
//require_once 'Mail.php';

class Mails extends dbmodel
{

  private static $instance;
  private function __construct() {}
  private function __clone(){}

  public static function getInstance(){
    if(!self::$instance){
      self::$instance = new self();
    }
    return self::$instance;
  }


  public function send_verification_mail($guest_id, $unique_id, $guest_email){
      $link ='users/login.php?guestid='.$guest_id.'&uniqueid='.$unique_id;

      $msg = '

        <!Doctype html>
        <head>
          <title>New Message from Rischoola.com.ng</title>
        </head>

        <body>

      <div class="container-fluid">

        <div class="jumbotron">

          <h4> Please Click on the link below to verify your account!</h4>

        </div>

        <div class="container"><a href="'.$SITE_URL.$link.'" > Click Here to Verify</a></div>

      </div>
      </body>';

      $title = "ACCOUNT VERIFICATION";
      //header('Location: /old_rsschools.ng'.$link);
      $this->pretty_mail($guest_email, $title, $msg, 'null');
      return true;
  }


  private function pretty_mail($to,$title,$msg,$typeof){
    //header parameters
    $headers = "MIME-VERSION:1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . "Rischoola.com.ng". "\r\n";
    $headers .= "Cc: solomoneseme@gmail.com";
    //Regular variables
    $txt = "";
      if (isset($to) and isset($msg) and isset($typeof)){
        switch ($typeof) {
          case 'signup':
            $header_file =fopen('files/signup_header.html', 'r') or die("Required file is missing!");
            //read from the header file so that it will be concatinated with message and footer file
            while(!feof($header_file)) {
                $txt = fgets($header_file) . "<br>";
                $txt.=$msg . "<br>";
              }
            fclose($header_file);
              $footer_file =fopen('files/signup_footer.html', 'r') or die("Required file is missing!");
            while(!feof($footer_file)) {
                $txt .= fgets($footer_file);
              }
            fclose($footer_file);
            break;

            case 'null':
            $txt.=$msg.'<br />';
            break;
          
          default:	
            $header_file =fopen('files/default_header.html', 'r') or die("Required file is missing!");
            
            while(!feof($header_file)) {
                $txt = fgets($header_file) . "<br>";
                $txt.=$msg . "<br>";
              }
            fclose($header_file);
              $footer_file =fopen('files/default_footer.html', 'r');
            while(!feof($footer_file)) {
                $txt .= fgets($footer_file);
              }
            fclose($footer_file);
            break;
        }
        //send the Goddamn mail bitch!
        $mail = mail($to,$title,$txt,$headers);
      }
      echo $txt;
  }

}




























<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

// require_once 'vendor/autoload.php';
//require_once 'Mail.php';

class Mails
{

  function __construct()
  {


  }


  public function send_verification_mail($guest_id, $unique_id, $guest_email){
      $link ='/users/login.php?guestid='.$guest_id.'&uniqueid='.$unique_id;

      //mail();
      //header('Location: /old_rsschools.ng'.$link);
      return true;
  }

}




























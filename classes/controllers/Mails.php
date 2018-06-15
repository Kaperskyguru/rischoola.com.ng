<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
// require_once 'vendor/autoload.php';
//require_once 'Mail.php';

class Mails extends Logger
{

    private static $instance;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function send_verification_mail($guest_id, $unique_id, $guest_email)
    {
        try {
            $link = 'users/login.php?guestid=' . $guest_id . '&uniqueid=' . $unique_id;

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

        <div class="container"><a href="' . SITEURL . $link . '" > Click Here to Verify</a></div>

      </div>
      </body>';

            $title = "ACCOUNT VERIFICATION";
            if ($this->pretty_mail($guest_email, $title, $msg, 'null')) {
                return TRUE;
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return FALSE;
        }
    }

    private function pretty_mail($to, $title, $msg, $typeof)
    {
        try {
            //header parameters
            $headers = "MIME-VERSION:1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From:" . "Rischoola.com.ng" . "\r\n";
            $headers .= "Cc: rischoola@gmail.com";

            //Regular variables
            $txt = "";
            if (isset($to) and isset($msg)) {
                $txt .= $msg . '<br />';
            }

            //send the Goddamn mail bitch!
            return mail($to, $title, $txt, $headers);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return FALSE;
        }
    }

    private function __clone()
    {

    }

}

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

    function pretty_mail($to, $title, $msg)
        {
                // Create the Transport
            $transport = (new Swift_SmtpTransport('localhost', 25))
            ->setUsername('rischoo1')
            ->setPassword('@&KAP@&ERS@&KY11');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($title))
            ->setFrom(['info@haypko.com' => 'Info'])
            ->setTo([$to, 'info@haypko.com'])
            ->setBody($msg, 'text/html');

            // Send the message
            return $mailer->send($message);
        }

    function contact_mail($to, $title, $msg, $from, $name)
        {
            $mailbody = "The contact form has been filled out.\n\n"
                . "Name: " . $name . "\n"
                . "Email: " . $from. "\n"
                . "Message:\n" . $msg;
                
                // Create the Transport
                $transport = (new Swift_SmtpTransport('localhost', 25))
                ->setUsername('rischoo1')
                ->setPassword('@&KAP@&ERS@&KY11');

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            // Create a message
            $message = (new Swift_Message($title))
            ->setFrom(['info@haypko.com' => 'Info'])
            ->setTo('solomoneseme@gmail.com')
            ->setReplyTo(array($from => $name))
            ->setBody($mailbody, 'text/html');

            // Send the message
            return $mailer->send($message);
        }

    private function __clone()
    {

    }

}

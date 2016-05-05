<?php

/* ~ class.sendemail.php
  .---------------------------------------------------------------------------.
  |   must: open extension=php_openssl.dll|open ssl
  |                            |
  |   must: Send mail server to open SMTP service
  |
  '---------------------------------------------------------------------------'
 */


include("class.phpmailer.php");
include("class.smtp.php");

class sendmail {

    /**
     * Constructor
     * @param boolean $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = false) {
        $this->exceptions = ($exceptions == true);
    }

    public function send_email($from, $to, $subject, $send_body, $password) {
        // loop thru multiple email recipients if more than one listed  --- (esp for the admin's "Extra" emails)...
        foreach (explode(',', $to) as $key => $value) {
            $to = trim($value);
            $smtp = 'smtp.qq.com';
            $port = 465;
            $username = $from;

            $mail = new phpmailer();
            $mail->IsSMTP();

            //$mail->SMTPDebug = true;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = $smtp;
            $mail->Port = $port;
            $mail->CharSet = "UTF-8"; //字体
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->From = $from;
            $mail->FromName = $from;
            $mail->Subject = $subject;
            $mail->Body = $send_body;
            $mail->IsHTML(true);
            $mail->AddAddress($to);
            if (!$mail->Send()) {
                echo "error！" . $mail->ErrorInfo;die;
            }
//           else {
//                echo "success!";
//            }
//            die;
        }
    }

}
<?php

namespace system;

class Mail {

    public static function send ($toAddress, $function, $f=true) {

        if ($f)
            $getMailParam = Mysql::squery("SELECT * FROM mail_message WHERE function='$function'");
        else
            $getMailParam = $function;

        $mail = new PHPMailer();
        $mail->From = config::$email_from_adr;
        $mail->FromName = config::$email_title;
        $mail->addAddress($toAddress);

        $mail->isHTML(true);
        $mail->Subject = $getMailParam['title'];
        $mail->Body = $getMailParam['message'];
        $mail->CharSet = 'UTF-8';

        if(!$mail->send())
            return $mail->ErrorInfo;
        else
            return true;
    }

}
?>
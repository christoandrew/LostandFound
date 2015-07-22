<?php
require_once "vendor/autoload.php";

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0) return $min; // not so random...
    $log = log($range, 2);
    $bytes = (int)($log / 8) + 1; // length in bytes
    $bits = (int)$log + 1; // length in bits
    $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function getToken($length = 32)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function format_email($info, $format)
{

    //set the root
    $root = $_SERVER['DOCUMENT_ROOT'] . '/LostAndFound';;

    //grab the template content
    $template = file_get_contents($root . '/utils/signup_template.' . $format);

    //replace all the tags
    $template = ereg_replace('{USERNAME}', $info['username'], $template);
    $template = ereg_replace('{EMAIL}', $info['email'], $template);
    $template = ereg_replace('{KEY}', $info['key'], $template);
    $template = ereg_replace('{SITEPATH}', 'http://127.0.0.1/LostAndFound', $template);

    //return the html of the template
    return $template;

}

function format_verification_email($info, $format){

    //set the root
    $root = $_SERVER['DOCUMENT_ROOT'] . '/LostAndFound';;

    //grab the template content
    $template = file_get_contents($root . '/utils/verification.' . $format);

    //replace all the tags
    $template = ereg_replace('{CODE}', $info['token'], $template);


    //return the html of the template
    return $template;
}

function send_email($info)
{

    //format each email
    $body = format_email($info, 'html');
    $body_plain_txt = format_email($info, 'txt');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
    $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//    $mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//    $mail->Debugoutput = 'html';

//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "lostandfound256@gmail.com";

//Password to use for SMTP authentication
    $mail->Password = "1a2S3d4F#";

//Set who the message is to be sent from
    $mail->setFrom('lostandfound256@gmail.com', 'Lost And Found');

//Set an alternative reply-to address
    $mail->addReplyTo('lostandfound256@gmail.com', 'Lost And Found');

//Set who the message is to be sent to
    $mail->addAddress($info['email'], 'Hi '. $info['username']);

//Set the subject line
    $mail->Subject = 'Lost And Found';

   // $mail->Body($body);

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->msgHTML($body);

//Replace the plain text body with one created manually
 //   $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
   // $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }

}

function send_verification_email($info)
{

    //format each email
    $body = format_verification_email($info, 'html');
    //$body_plain_txt = format_email($info, 'txt');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
    $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//    $mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//    $mail->Debugoutput = 'html';

//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "lostandfound256@gmail.com";

//Password to use for SMTP authentication
    $mail->Password = "1a2S3d4F#";

//Set who the message is to be sent from
    $mail->setFrom('lostandfound256@gmail.com', 'Lost And Found');

//Set an alternative reply-to address
    $mail->addReplyTo('lostandfound256@gmail.com', 'Lost And Found');

//Set who the message is to be sent to
    $mail->addAddress($info['email'], 'Hi '. $info['username']);

//Set the subject line
    $mail->Subject = 'Lost And Found';

    // $mail->Body($body);

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->msgHTML($body);

//Replace the plain text body with one created manually
    //   $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
    // $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
    if (!$mail->send()) {
        //echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {
        //echo "Message sent!";
        return true;
    }

}

function send_multicast_email($info)
{

    //format each email
    $body = format_email($info, 'html');
    $body_plain_txt = format_email($info, 'txt');

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

//Tell PHPMailer to use SMTP
    $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//    $mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//    $mail->Debugoutput = 'html';

//Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
    $mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "lostandfound256@gmail.com";

//Password to use for SMTP authentication
    $mail->Password = "1a2S3d4F#";

//Set who the message is to be sent from
    $mail->setFrom('lostandfound256@gmail.com', 'Lost And Found');

//Set an alternative reply-to address
    $mail->addReplyTo('lostandfound256@gmail.com', 'Lost And Found');

//Set who the message is to be sent to
    $mail->addAddress($info['email'], 'Hi ' . $info['username']);

//Set the subject line
    $mail->Subject = 'Lost And Found';

    // $mail->Body($body);

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
    $mail->msgHTML($body);

//Replace the plain text body with one created manually
    //   $mail->AltBody = 'This is a plain-text message body';

//Attach an image file
    // $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }

}
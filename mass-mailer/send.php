<?php
/*
$host = "smtp.mailgun.org"; // SMTP host
$username = "postmaster@sandbox0aba5e5ed0924cf29c6320b98c41e0cd.mailgun.org"; //SMTP username
$password = "pass"; // SMTP password
*/
$host = "smtp.mailgun.org"; // SMTP host
$username = "postmaster@sandboxf0bf63082bfa43c9a905f99aae7fd9a7.mailgun.org"; //SMTP username
$password = "pass"; // SMTP password

require("class.phpmailer.php");

//$uploaddir = 'u';
//$key = 0;
//$tmp_name = $_FILES["userfile"]["tmp_name"][$key];
//        $name = $_FILES["userfile"]["name"][$key];
//        $sendfile = "$uploaddir/$name";
//move_uploaded_file($tmp_name, $sendfile);


//exit;


$to = $_POST['to'];
$addresses = array();

$addresses = explode("\n",$to);
//print_r($addresses);exit;

$name = $_POST['who'];
$email_subject = $_POST['subject'];
$Email_msg = $_POST['message'];
$Email_msg2 = str_replace("\n", "<br>", $Email_msg);;
//$Email_to = "you@YourSite.com"; // the one that recieves the email
$email_from = $_POST['from'];
//$dir = "uploads/$filename";
//chmod("uploads",0777);
$attachments = array();

//foreach ($addresses as $Email_to) { echo $Email_to."<br>"; }
//exit;

foreach ($addresses as $Email_to)
{



$mail = new PHPMailer();

$mail->IsSMTP();          // send via SMTP
$mail->Host     = $host; // SMTP servers
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = $username;  // SMTP username
$mail->Password = $password; // SMTP password

$mail->From     = $email_from;
$mail->FromName = $name;
$mail->AddAddress($Email_to);  
//$mail->AddReplyTo("info@example.com","Information");
//foreach($attachments as $key => $value) { //loop the Attachments to be added …
//$mail->AddAttachment(”uploads”.”/”.$value);
//}

//$mail->AddAttachment($sendfile);

$mail->WordWrap = 50;                              // set word wrap
$mail->IsHTML(true);                               // send as HTML

$mail->Subject  =  $email_subject;
$mail->Body     =  $Email_msg2;
$mail->AltBody  =  $Email_msg;

if(!$mail->Send())
{
   echo "Message was not sent <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message to $Email_to has been sent<br />";

}

?>

<?php
if(isset($_POST['send']))
{
  
  require 'PHPMailerAutoload.php';
  require 'credential.php';

$mail = new PHPMailer;
$emails = $_POST['aemail'];
$mail->SMTPDebug = 4;                               // Enable verbose debug output
$links = 'http://localhost/E-Appointment%20System/mail.php?email='.$emails.'';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'SKACASSAM.IN');
$mail->addAddress($_POST['aemail']);     // Add a recipient              // Name is optional
$mail->addReplyTo(EMAIL);

        
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your application has been approved. You Can take admission through this link';
$mail->Body    = $links;
$mail->AltBody = 'Please Click this Link';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
  //header("Refresh:0;fpassword1.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="mail.php" id="formSubmit" method="post">
<input type="text" name="aemail">
<input type="submit" name="send" value="send">
</form>
</body>
</html>
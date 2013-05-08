<?php
require_once "Swift/lib/swift_required.php";
session_start();
$con =  new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if (!$con) {
	die('Connect Error (' . mysqli_connect_errno() . ') '
		. mysqli_connect_error());
}

$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['hear'] = $_POST['hear'];


$email = $_SESSION['email'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$hear = $_SESSION['hear'];

$sql = "INSERT INTO users_temp (email, lname, fname, hear)
VALUES ('" . $email . "', '" . $lname . "', '" . $fname . "', '" . $hear ."')";

$con->query($sql);

/*$from = "YouFolio <postmaster@youfolio.com>";
$to = $email;
$subject = 'YouFolio Account Verification';
	'&fname=' . $fname . '&lname=' . $lname . '&org=' . $org;
$host = "smtp.mandrillapp.com";
$username = "youfolio@youfolio.com";
$password = "HlswP8vLxKR7jaFhPjCRmw";

$headers = array ('From' => $from,
	'To' => $to,
	'Subject' => $subject);
$headers["Reply-To"] = "support@youfolio.com";
$smtp = Mail::factory('smtp',
	array ('host' => $host,
		'auth' => true,
		'port' => '587',
		'username' => $username,
		'password' => $password));*/
		
		
		
$subject = 'YouFolio Account Verification';
$from = array('admin@youfolio.com' =>'YouFolio');
$to = array(
 $email  => $fname . ' ' . $lname,
);

$text = "Please click this link to verify and reserve your YouFolio account. http://www.youfolio.com/verifyEmail.php?email=" . $email;
$html = "Please click this link to verify and reserve your YouFolio account. http://www.youfolio.com/verifyEmail.php?email=" . $email;

$transport = Swift_SmtpTransport::newInstance('mail.youfolio.com', 25);
$transport->setUsername('admin@youfolio.com');
$transport->setPassword('BigThingsDaily33$');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
 echo '
 <!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]--><!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]--><!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]--><!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>YouFolio: Define Yourself</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script src="js/libs/head.min.js" type="text/javascript">

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.selectboxit/3.3.0/jquery.selectBoxIt.min.js"></script>
</script>
<script type="text/javascript">
//Load in all JS files for jQuery, Ember, MVC, etc.
head.js("js/resources.js");
</script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"><!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body style="text-align:center;">
 <h2>We\'ve just sent a confirmation email to ' . $email . '. It may take up to ten minutes to arrive.</h2><br/>Please check your email and click the confirmation link to verify your account.
 </body>
 </html>';
} else {
 echo "There was an error:\n";
 print_r($failures);
}
?>
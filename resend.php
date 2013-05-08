<?php
require_once "Swift/lib/swift_required.php";
session_start();
$con =  new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if (!$con) {
	die('Connect Error (' . mysqli_connect_errno() . ') '
		. mysqli_connect_error());
}


$sql = "SELECT * FROM users_temp WHERE email NOT IN (SELECT email FROM users)";

if($result = $con->query($sql))
{
$logger = new Swift_Plugins_Loggers_EchoLogger();
$transport = Swift_SmtpTransport::newInstance('mail.youfolio.com', 25);

$transport->setUsername('admin@youfolio.com');
$transport->setPassword('BigThingsDaily33$');

$swift = Swift_Mailer::newInstance($transport);

$swift->registerPlugin(new Swift_Plugins_ThrottlerPlugin(
  40, Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_MINUTE
));
$swift->registerPlugin(new Swift_Plugins_LoggerPlugin($logger));
while($row = mysqli_fetch_array($result))
{
$email = $row[0];
$fname = $row[1];
$lname = $row[2];
	
$subject = 'YouFolio Account Verification';
$from = array('admin@youfolio.com' =>'YouFolio');
$to = array(
 $email  => $fname . ' ' . $lname,
);

$text = "Please click this link to verify and reserve your YouFolio account. http://www.youfolio.com/verifyEmail.php?email=" . $email;
$html = "Please click this link to verify and reserve your YouFolio account. http://www.youfolio.com/verifyEmail.php?email=" . $email;



$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
 //echo 'Sent to ' . $email . '<br/>';
} else {
 echo "There was an error:\n";
 print_r($failures);
}
}
echo $logger->dump();
}
?>
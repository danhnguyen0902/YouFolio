<?php
session_start();
$con =  new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if (!$con) {
	die('Connect Error (' . mysqli_connect_errno() . ') '
		. mysqli_connect_error());
}

$sql = "UPDATE users SET resume='" . $_POST['resume'] . "', university='" . $_POST['university'] . "', boyerStudent='" . $_POST['boyerStudent'] . "', wertalikStudent='" . $_POST['wertalikStudent'] . "', major='" . $_POST['major'] . "', gradYear='" . $_POST['gradYear'] . "' WHERE email='" . $_SESSION['email'] . "'";
$result = $con->query($sql);

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
<h1>We appreciate your support! Follow us on <a href="http://www.twitter.com/youfolio">twitter</a> for updates.
</body>
';

?>
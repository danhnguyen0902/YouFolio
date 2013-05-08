<?php
session_start();
$con =  new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if (!$con) {
	die('Connect Error (' . mysqli_connect_errno() . ') '
		. mysqli_connect_error());
}
$email = $_GET['email'];
if($email)
{
$sql = "SELECT COUNT(*) FROM users WHERE email='" . $email . "'";
$result = $con->query($sql);
$row = $result->fetch_array(MYSQLI_NUM);
if($row[0] != 0)
{
echo 'This email has already been used to create an account!';
}
else{
$sql = "SELECT COUNT(*) FROM users_temp WHERE email='" . $email . "'";
$result = $con->query($sql);
$row = $result->fetch_array(MYSQLI_NUM);
if($row[0] <= 0)
{
echo 'This email has not started an account creation process yet. Please start over at <a href="http://www.youfolio.com/">youfolio.com</a>.';
}
else
{


$sql = "SELECT * FROM users_temp WHERE email='" . $email . "'";
$result = $con->query($sql);
$row = $result->fetch_array(MYSQLI_NUM);


$email = $row[0];
$fname = $row[1];
$lname = $row[2];
$hear = $row[4];

$_SESSION['email'] = $email;
$_SESSION['lname'] = $lname;
$_SESSION['fname'] = $fname;
$_SESSION['hear'] = $hear;

$sql = "INSERT INTO users (email, lname, fname, hear)
VALUES ('" . $email . "', '" . $lname . "', '" . $fname . "', '" . $hear ."')";


$result = $con->query($sql);


$html = '<!DOCTYPE html>
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
</head>';

$html .= '<body style="background-color:white;>

    <script type="text/x-handlebars" data-template-name="application">
     <form name="signupForm" id="signupForm" action="extraInfo.php" method="POST">
<div class="row-fluid" style="background-color:white; padding:5px; text-align:center;">
  <div class="span8 offset2" style="text-align:center;">
<h3>You\'re all signed up! Please provide us with some additional information so we can build your portfolio!</h3><br/>';
  
  /*if($org == "Boyer")
  {
	  $html .= 'Name of student from Boyer\'s class: <input type="text" name="boyerStudent" id="boyerStudent" placeholder="Student Name" style="padding-right:10px; width:400px; margin-right:10px;"/><br/><br/>';
  }
  if($org == "Donna Wertalik")
  {
	  $html .= 'Name of student from Wertalik\'s class: <input type="text" name="wertalikStudent" id="wertalikStudent" placeholder="Student Name" style="padding-right:10px; width:400px; margin-right:10px;"/><br/><br/>';
  }*/
  $html .=
  'Tell us your story: <br/><textarea name="resume" id="resume" placeholder="Describe your journey so far and tell us about your goals for the future" style="padding-right:10px; height:200px; width:80%;"></textarea><br/>
   What is your major?<br/> <input type="text" name="major" id="major" placeholder="Major" style="padding-right:10px; width:80%;"/><br/><br/>
   What year do you graduate?<br/> <input type="text" name="gradYear" id="gradYear" placeholder="2013" style="padding-right:10px; width:80%;"/><br/><br/>
   University:<br/> <input type="text" name="university" id="university" placeholder="College" style="padding-right:10px; width:80%;"/><br/><br/>
  <input type="button" value="Continue" onclick="validationCheck();" class="btn btn-primary btn-medium" style="font-size:10pt; margin-top:-10px; text-align:center; max-width:100%"/>
</div>
</div>
</form>
</script>
</body>';

echo $html;
}
}
}
else{
	echo 'You seem to have arrived here in error. Please return to <a href="http://www.youfolio.com/">youfolio.com</a> and try signing up again.';
}
?>

<script type="text/javascript">
function validationCheck()
{
if(document.getElementById('resume').value.length == 0)
{
alert("Your story cannot be blank.");
}
else if(document.getElementById('major').value.length == 0)
{
alert("Your major cannot be blank.");
}
else if(document.getElementById('gradYear').value.length == 0)
{
alert("Your graduation year cannot be blank.");
}
else if(document.getElementById('university').value.length == 0)
{
alert("Your university cannot be blank.");
}
else
{
document.forms["signupForm"].submit();
}
}
</script>
<?php
session_start();
$con =  new mysqli('localhost','youfolio_frat','password123', 'youfolio_fratcontest');
if (!$con) {
	die('Connect Error (' . mysqli_connect_errno() . ') '
		. mysqli_connect_error());
}




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
     <form name="signupForm" id="signupForm" action="SignupProc.php" method="POST">
<div class="row-fluid" style="background-color:white; padding:5px; text-align:center;">
<h3>Thanks for signing up! Please give us your name and tell us which organization you are with.</h3><br/>
  <div class="span6 offset3">

  First Name: <input type="text" name="fname" id="fname" placeholder="John" style="padding-right:10px; width:320px;"/><br/>
  Last Name: <input type="text" name="lname" id="lname" placeholder="Smith" style="padding-right:10px; width:320px;"/><br/>
  How did you hear about us?: <input type="text" name="hear" id="hear" placeholder="At an event" style="padding-right:10px;"/><br/>
  <!--Organization:
  <select id="org" name="org" style="width:212px;">
  <option value="none">none</option>
    <option value="Alpha Chi Omega">Alpha Chi Omega</option>
    <option value="Alpha Delta Pi">Alpha Delta Pi</option>
    <option value="Alpha Epsilon Pi">Alpha Epsilon Pi</option>
    <option value="Alpha Gamma Rho">Alpha Gamma Rho</option>
    <option value="Alpha Kappa Alpha">Alpha Kappa Alpha</option>
    <option value="Alpha Kappa Delta">Alpha Kappa Delta</option>
        <option value="Alpha Omega Epsilon">Alpha Omega Epsilon</option>
            <option value="Alpha Phi">Alpha Phi</option>
    <option value="Alpha Phi Alpha">Alpha Phi Alpha</option>
    <option value="Alpha Sigma Phi">Alpha Sigma Phi</option>
    <option value="Beta Theta Pi">Beta Theta Pi</option>
    <option value="Boyer">Boyer\'s Class</option>
    <option value="Chi Omega">Chi Omega</option>
    <option value="Delta Delta Delta">Delta Delta Delta</option>
    <option value="Delta Gamma">Delta Gamma</option>
    <option value="Delta Sigma Phi">Delta Sigma Phi</option>
    <option value="Delta Sigma Theta">Delta Sigma Theta</option>
    <option value="Delta Tau Delta">Delta Tau Delta</option>
    <option value="Delta Upsilon">Delta Upsilon</option>
    <option value="Donna Wertalik">Donna Wertalik</option>
    <option value="FarmHouse">FarmHouse</option>
    <option value="Gamma Phi Beta">Gamma Phi Beta</option>
    <option value="Hermandad de Sigma lota Alpha">Hermandad de Sigma lota Alpha</option>
    <option value="Kappa Alpha Order">Kappa Alpha Order</option>
    <option value="Kappa Alpha Psi">Kappa Alpha Psi</option>
    <option value="Kappa Delta">Kappa Delta</option>
    <option value="Kappa Delta Rho">Kappa Delta Rho</option>
    <option value="Kappa Kappa Gamma">Kappa Kappa Gamma</option>
    <option value="Lambda Chi Alpha">Lambda Chi Alpha</option>
    <option value="Lambda Phi Epsilon">Lambda Phi Epsilon</option>
    <option value="Lambda Sigma Upsilon">Lambda Sigma Upsilon</option>
    <option value="Mu Sigma Upsilon">Mu Sigma Upsilon</option>
    <option value="Pi Beta Phi">Pi Beta Phi</option>
    <option value="Omega Psi Phi">Omega Psi Phi</option>
    <option value="Phi Beta Sigma">Phi Beta Sigma</option>
    <option value="Phi Delta Theta">Phi Delta Theta</option>
    <option value="Phi Gamma Delta">Phi Gamma Delta</option>
    <option value="Phi Kappa Tau">Phi Kappa Tau</option>
    <option value="Phi Sigma Kappa">Phi Sigma Kappa</option>
    <option value="Pi Kappa Alpha">Pi Kappa Alpha</option>
    <option value="Pi Kappa Phi">Pi Kappa Phi</option>
    <option value="Pi Lambda Phi">Pi Lambda Phi</option>
    <option value="Sigma Alpha Epsilon">Sigma Alpha Epsilon</option>
    <option value="Sigma Chi">Sigma Chi</option>
    <option value="Sigma Gamma Rho">Sigma Gamma Rho</option>
    <option value="Sigma Kappa">Sigma Kappa</option>
    <option value="Sigma Nu">Sigma Nu</option>
    <option value="Sigma Phi Delta">Sigma Phi Delta</option>
    <option value="Sigma Phi Epsilon">Sigma Phi Epsilon</option>
    <option value="Sigma Psi Zeta">Sigma Psi Zeta</option>
    <option value="Sigma Tau Gamma">Sigma Tau Gamma</option>
    <option value="Tau Kappa Epsilon">Tau Kappa Epsilon</option>
    <option value="Theta Chi">Theta Chi</option>
    <option value="Theta Delta Chi">Theta Delta Chi</option>
    <option value="Theta Xi">Theta Xi</option>
    <option value="Zeta Phi Beta">Zeta Phi Beta</option>
    <option value="Zeta Tau Alpha">Zeta Tau Alpha</option>
    <option value="Zeta Psi">Zeta Psi</option>





  </select>-->


   <br/><br/>
  <input type="button" value="Continue" onclick="validationCheck();" class="btn btn-primary btn-medium" style="font-size:10pt; margin-top:-10px; text-align:center; width:295px;"/>
</div>
</div>
</form>
</script>
</body>';

if($_POST['email1'])
{
	$sql = "SELECT count(*) FROM users WHERE email ='" . $_POST['email1'] . "'";
	$result = $con->query($sql);
	$emailUsed = $result->fetch_array(MYSQLI_NUM);
	if($emailUsed[0] > 0)
	{
		echo "This email is already associated with an account!";
	}
	else
	{
	$_SESSION['email'] = $_POST['email1'];
		echo $html;
	}
}
else if($_POST['email2'])
	{
		$sql = "SELECT count(*) FROM users WHERE email ='" . $_POST['email2'] . "'";
		$result = $con->query($sql);
		$emailUsed = $result->fetch_array(MYSQLI_NUM);
		if($emailUsed[0] > 0)
		{
			echo "This email is already associated with an account!";
		}
		else
		{
		$_SESSION['email'] = $_POST['email2'];
			echo $html;
		}
	}

?>

<script type="text/javascript">
function validationCheck()
{
if(document.getElementById('fname').value.length == 0)
{
alert("First name cannot be blank.");
}
else if(document.getElementById('lname').value.length == 0)
{
alert("Last name cannot be blank.");
}
else
{
document.forms["signupForm"].submit();
}
}
</script>
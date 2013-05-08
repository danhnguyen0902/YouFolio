<?php

    $to = "crwirz@gmail.com";
	$subject = "mailtest.php Test Email";
	$body = "Sent from mailtest.php.  It gets sent 350x to crwirz@gmail.com";
	$headers = "From: youfolio@youfolio.com\r\n".
			"Reply-To: youfolio@youfolio.com\r\n";
	$cc = null;
	$bcc = "crwirz@youfolio.com";
	for ($n=1; $n<360; $n++){
		// $bcc .= ", crwirz@youfolio.com";
		// $to .= ", crwirz@gmail.com";
	}
	$return_path = "youfolio@youfolio.com";

	if (imap_mail($to, $subject, $body, $headers, $cc, $bcc, $return_path)){
		echo "sent";
	}
?>
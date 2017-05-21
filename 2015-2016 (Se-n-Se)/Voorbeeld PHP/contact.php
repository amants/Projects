<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css" type="text.css">
	<script src="../js/tinymce/tinymce.min.js"></script>
</head>
<body>
	<div class="wrapper">
	<?php
include "includes/global.php";
include "head_2.php";
	if (isset($_POST["post"])) {
		if (!empty($_POST["message"]) && !empty($_POST["lname"]) && !empty($_POST["fname"]) && !empty($_POST["email"])) {
			$data = array(
				sanitize($_POST['lname']),
				sanitize($_POST['fname']),
				sanitize($_POST['message']),
				sanitize($_POST['email']),
			);
			$mail = "First name: " . $data[1] . "<br />Last name: " . $data[0] . "<br />Email: " . $data[3] . "<hr><br />" . $data[2];
			$to = "amants@visocloud.org";
			$subject = "PHP mail";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to,$subject,$mail,$headers);
			echo "We've received your message";
			exit;
			
		} else {
			echo "Fill in all forms please.";
		}
	}
	echo '
		<form method="post" action="">
			<label for="fname">First name</label>
			<input id="fname" type="text" name="fname" placeholder="First name"><br />
			<label for="lname">Last name</label>
			<input id="lname" type="text" name="lname" placeholder="Last name"><br />
			<label for="email">Email</label>
			<input id="email" type="email" name="email" placeholder="Email"><br />
			<label for="message">Your message</label>
			<textarea name="message" id="message"></textarea><br />
			<input type="submit" value="Submit form" name="post">
		</form>';		
		
		
?>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="../js/main.js"></script>
</body>
</html>
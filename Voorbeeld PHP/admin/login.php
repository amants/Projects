<?php
include "../includes/global.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
include "../head_1.php";
if (!isset($_REQUEST["do"])) {
	if (!loginCheck()) {
		echo '<form method="POST" action="">
			<input type="text" name="username">
			<input type="password" name="password">
			<input type="submit" name="login">
		</form>';
	} else {
		echo "You're already logged in!";
	}
	if (isset($_POST["login"])) {
		if (isset($_POST["username"]) && isset($_POST["password"])) {
			if (loginCMS($_POST["username"], $_POST["password"])) {
				echo "works";
			}
		}
	}
} else {
	if ($_REQUEST["do"] == "logout") {
		// Destroy sessions = log out user
		session_destroy();
		
		
		// Code to register your account
	}
}
	
	
	
	?>
</body>
</html>
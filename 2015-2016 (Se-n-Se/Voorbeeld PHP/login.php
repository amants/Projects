<?php
include "includes/global.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
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
	} else if ($_REQUEST["do"] == "register") {
		// Check if no one is logged in already
		if (!loginCheck()) {
			echo '<form method="POST" action="">
				<input type="text" placeholder="Username" name="username" required><br>
				<input type="password" placeholder="Password" name="password" required><br>
				<input type="password" placeholder="Confirm password" name="password2" required><br>
				<input type="email" placeholder="Email" name="email" required><br>
				<input type="email" placeholder="Confirm email" name="email2" required><br>
				<input type="submit" value="Register" name="register">
			</form>';
			if (isset($_POST["register"])) {
				if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST["email"]) && isset($_POST["email2"])) {
					
					// Check if entered passwords match.
					if ($_POST["password"] == $_POST["password2"]) {
						$passMatch = true;
					} else {
						$passMatch = false;
						echo "Passwords do not match.";
					}
					
					//Check if entered emails match.
					if ($_POST["email"] == $_POST["email2"]) {
						$emailMatch = true;
					} else {
						$emailMatch = false;
						echo "Emails do not match.";
					}
					if ($passMatch && $emailMatch) {
						// Call the register function.
						registerCMS($_POST["username"], $_POST["password"], $_POST["email"], $_POST["register"]);
					}
				}
			}
		} else {
		echo "You're already logged in!";
		}
	}
}
	
	
	
	?>
</body>
</html>
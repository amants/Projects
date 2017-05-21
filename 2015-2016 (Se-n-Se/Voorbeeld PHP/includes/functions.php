<?php
function sanitize($string) {
	global $db;
	$return = htmlspecialchars(mysqli_real_escape_string($db, $string));
	return $return;
}

function loginCMS($un, $pw) {
	global $db;
	if (isset($_SESSION["username"])) {
		echo "You're already logged in.";
		return false;
	} else {
		$login = array(
			md5($pw),
			sanitize($un)
		);
		if (isset($un) && isset($pw)) {
			$query = mysqli_query($db, "SELECT * FROM users WHERE username = '{$login[1]}' AND password ='{$login[0]}'");
			if(mysqli_num_rows($query) == 1)
			{
				while ($raw = mysqli_fetch_array($query)) {
					$_SESSION["ugroup"] = $raw["ugroup"];
				}
				$_SESSION["username"] = $login[1];
				echo "Logged in";
				return true;
			} else {
				echo "Wrong username or password";
				return false;
			}
		} else {
			echo "Not all requirements are met.";
			return false;
		}
	}
}

function loginCheck() {
	if (!empty($_SESSION["username"])) {
		return true;
	} else {
		return false;
	}
}

function registerCMS($un, $pw, $email, $sub) {
	global $db;
	$un = sanitize($un);
	$pw = md5($pw);
	$email = sanitize($email);
	if (isset($sub)) {
		if (isset($un) && isset($pw) && isset($email)) {
			$queryUn = mysqli_query($db, "SELECT * FROM users WHERE username = '{$un}'");
			if (mysqli_num_rows($queryUn) < 1){
				$userExist = false;
			} else {
				$userExist = true;
				echo "Username already used<br />";
			}
			$queryEmail = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}'");
			if (mysqli_num_rows($queryEmail) < 1){
				$emailExist = false;
			} else {
				$emailExist = true;
				echo "Email already used<br />";
			}
			if (!$emailExist && !$userExist) {
				echo "Unique username and email!";
				mysqli_query($db, "INSERT INTO users (username, password, email, ip) VALUES ('$un', '$pw', '$email', '{$_SERVER["REMOTE_ADDR"]}');");
				$_SESSION["username"] = $un;
				$_SESSION["ugroup"] = 1;
				header("location: index.php");
			}
		}
	}
}
?>
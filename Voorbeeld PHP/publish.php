<?php
include "includes/global.php";
$mess = $_POST["comment"];
$message = mysqli_real_escape_string($db, $mess);
$query = mysqli_query($db, "SELECT * FROM users WHERE username = '{$_SESSION["username"]}'");
while ($row = mysqli_fetch_array($query)) {
	$id = $row["id"];
}

mysqli_query($db, "INSERT INTO `shouts` (	`poster`, `message`) VALUES ('{$id}','{$message}')") or die(mysqli_error($db));

?>
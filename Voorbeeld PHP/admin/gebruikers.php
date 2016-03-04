<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css" type="text.css">
</head>
<body>
	<div class="wrapper">
		<ul>
<?php
include "../includes/global.php";
include "../head_1.php";
if (isset($_SESSION["username"]) && $_SESSION["ugroup"] == 2) {
	$query = mysqli_query($db, "SELECT * FROM users");
	while ($i = mysqli_fetch_array($query)) {
		echo "<li>" . $i["username"] . " (<a href='deleteusr.php?id=" . $i["id"] . "'>delete user</a>)</li>";
		
	}
}		
?>
		</ul>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
</body>
</html>
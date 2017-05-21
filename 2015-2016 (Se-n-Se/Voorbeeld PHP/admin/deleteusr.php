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
	$id = mysqli_real_escape_string($db, $_REQUEST["id"]);
	
	$query = mysqli_query($db, "DELETE FROM users WHERE id = {$id}");
	echo "User with id {$id} successfuly deleted.";
}		
?>
		</ul>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
</body>
</html>
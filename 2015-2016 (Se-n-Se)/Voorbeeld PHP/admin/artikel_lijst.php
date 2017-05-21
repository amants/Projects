<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css" type="text.css">
</head>
<body>
	<div class="wrapper">
<?php
include "../includes/global.php";
include "../head_1.php";
if (isset($_SESSION["username"]) && $_SESSION["ugroup"] == 2) {
	$query = mysqli_query($db, "SELECT * FROM articles WHERE hidden = 0 ORDER BY position ASC");
	while ($i = mysqli_fetch_array($query)) {
		echo "<h3>" . $i["title"] . "</h3>";
		echo "<p>" . $i["message"] . "</p><hr>";
	}
}		
		
		
?>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
</body>
</html>
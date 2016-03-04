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
include "../includes/global.php";
include "../head_1.php";
if (isset($_SESSION["username"]) && $_SESSION["ugroup"] == 2) {
	echo '
		<form method="post" action="">
			<label for="title">Title</label>
			<input id="title" type="text" name="title" placeholder="title"><br />
			<label for="cat">Category</label>
			<select id="cat" name="category">
				<option value="1">Products</option>
				<option value="2">News</option>
				<option value="3">Other</option>
			</select><br />
			<label for="order">Display order</label>
			<select id="order" name="order">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select><br />
			<label for="hidden">Hide article</label>
			<select id="hidden" name="hidden">
				<option value="2">No</option>
				<option value="1">Yes</option>
			</select><br />
			<textarea name="message"></textarea>
			<input type="submit" value="Post article" name="post">
		</form>';
	if (isset($_POST["post"])) {
		if (isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["order"]) && !empty($_POST["message"])) {
			if (isset($_POST["hidden"]) && $_POST["hidden"] == 2 ){
				$hidden = 0;
			} else {
				$hidden = 1;
			}
			$data = array(
				sanitize($_POST['title']),
				sanitize($_POST['category']),
				sanitize($_POST['order']),
				sanitize($hidden),
				$_POST['message']
			);
			mysqli_query($db, "INSERT INTO articles (title, category, position, hidden, message) VALUES ('{$data[0]}', '$data[1]', '$data[2]', '$data[3]', '$data[4]')");
		} else {
			echo "Fill in all forms please.";
		}
	}
	
}		
		
		
?>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="../js/main.js"></script>
</body>
</html>
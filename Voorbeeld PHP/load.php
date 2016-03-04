<?php
include "includes/global.php";


$uid = array();
$message = array();
$result = array();
$query = mysqli_query($db, "SELECT * FROM shouts ORDER BY id DESC LIMIT 20");

while ($i = mysqli_fetch_array($query)) {
	$posttime = $i["date"];
	$newDate = date("H:i", strtotime($posttime));
	$query2 = mysqli_query($db, "SELECT * FROM users WHERE id = {$i["poster"]}");
	while ($row = mysqli_fetch_array($query2)) {
		$un = $row["username"];
	}
	
	$object = (object) [
		'uid' => $un,
		'message' => $i["message"],
		'posttime' => $newDate,
	];
	$result[] = $object;
}
echo json_encode($result);

?>
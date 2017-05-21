<?php
$dbserver = array(
	"localhost",
	"root",
	"",
	"cms"
);
$db = mysqli_connect($dbserver[0], $dbserver[1], $dbserver[2]);
if ($db) {
} else {
	echo "ERROR: Couldn't connect to the database server.";
}
$db2 = mysqli_select_db($db, $dbserver[3]);
if ($db2) {
} else {
	echo "ERROR: Couldn't select the database";
}
	
?>
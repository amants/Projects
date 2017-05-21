<?php
include "includes/global.php";
include "head_2.php";
if (isset($_SESSION["username"])) {
	echo "Welcome, " . $_SESSION["username"] . ".";
}
?>
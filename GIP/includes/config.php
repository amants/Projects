<?php


$db = array(
    "localhost",
    "root",
    "",
    "gip"
);

$GLOBALS["conn"] = new mysqli($db[0], $db[1], $db[2], $db[3]);

?>

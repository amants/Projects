<?php
function logged($session) {
    $session1 = $GLOBALS["conn"]->real_escape_string($session);
    if ($result = $GLOBALS["conn"]->query("SELECT * FROM `sessions` WHERE hash = '$session1'")) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }    
}
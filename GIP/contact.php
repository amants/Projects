<?php
include "global.php";

    if (isset($_POST["name"]) && isset($_POST["subject"]) && isset($_POST["message"]) && isset($_POST["email"])) {
        $data = array(
            $conn->real_escape_string(htmlspecialchars($_POST["name"])),
            $conn->real_escape_string(htmlspecialchars($_POST["subject"])),
            $conn->real_escape_string(htmlspecialchars($_POST["message"])),
            $conn->real_escape_string(htmlspecialchars($_SERVER["REMOTE_ADDR"])),
            $conn->real_escape_string(htmlspecialchars($_POST["email"])),
        );
        if (!filter_var($data[4], FILTER_VALIDATE_EMAIL)) {
            echo "invalid email";
        } else {
            $conn->query("INSERT INTO `contact` (name, title, message, ip, email) VALUES ('{$data[0]}', '{$data[1]}', '{$data[2]}', '{$data[3]}', '$data[4]')");

            $mail = "Name: " . $data[0] . "<br />Email: " . $data[4] . "<br />Title: " . $data[1] . "<hr><br />" . $data[2];
            $to = "amants@visocloud.org";
            $subject = "GIP Contact mail";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to,$subject,$mail,$headers);
        }
    }

?>
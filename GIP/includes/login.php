<?php

include "../global.php";
if (isset($_COOKIE["session"])) 
{
    $cookie = $_COOKIE["session"];
} else {
    $cookie="";
}


if (logged($cookie) == false) 
{
    if (isset($_REQUEST["do"])) 
    {
        if ($_REQUEST["do"] == "login") //Login start -- do=login
        {            
            if (isset($_POST["login"]))    //submitted
            {
                if (!empty($_POST["un"])&&!empty($_POST["pw"])) //Check if empty
                {
                    $un = htmlspecialchars($GLOBALS["conn"]->real_escape_string($_POST["un"])); // patching un for xss/sqli
                    $result = $GLOBALS["conn"]->query("SELECT * FROM users WHERE username = '$un'"); //Getting salt from said username
                    if ($result->num_rows > 0) {
                        while ($i = $result->fetch_object())
                        {
                            $encpass = hash("sha512", md5($_POST["pw"]) . sha1($i->salt)); // Encrypt password for database lookup
                        }
                        $query = $GLOBALS["conn"]->query("SELECT * FROM `users` WHERE `username` = '" . $un . "' and `password` = '" . $encpass . "';") or die(mysql_error()); //Query for database lookup
                        if ($query->num_rows > 0) //Check if combination exists
                        {
                            while ($form = $query->fetch_object()) 
                            {
                                $sessionhash = md5(sha1($form->username) . sha1($form->id + rand(0,1000000))); // Encrypt sessionhash
                                $ip = $_SERVER["REMOTE_ADDR"];
                                $GLOBALS["conn"]->query("Insert into `sessions` (`userid`, `hash`, `ip`) values ('$form->id', '$sessionhash', '$ip')") or die(mysql_error()); // Insert sessionhash in the database
                                if (isset($_POST["stay"])) {
                                    setcookie("session", $sessionhash, time()+60*60*24*365); // set the cookie
                                } else
                                {
                                    setcookie("session", $sessionhash);
                                }
                                echo "logged in";
                                echo "<meta http-equiv='refresh' content='2;url=forum.php' />";
                            }
                        } else 
                        {
                            echo "Wrong username or password";           
                        }
                    } else 
                    {
                        echo "Wrong username or password";   
                    }
                } else
                {
                    echo "fill in all forms pls";   
                }
            } else 
            {
                echo "something went wrong";   
            }
			
        } else if ($_REQUEST["do"] == "register") { // do=register
            if (isset($_POST["register"]))  // Check if button was pressed
            {
                if (isset($_POST["username"]) //Check if all fields are filled
                    &&isset($_POST["password"])
                    &&isset($_POST["password2"])
                    &&isset($_POST["email"])
                    &&isset($_POST["email2"])) 
                {
                    if (isset($_POST["tos"])) {
                        $register = array( //Array with the entered information
                            htmlspecialchars($GLOBALS["conn"]->real_escape_string($_POST["username"])),
                            $_POST["password"],
                            $_POST["password2"],
                            htmlspecialchars($GLOBALS["conn"]->real_escape_string($_POST["email"])),
                            htmlspecialchars($GLOBALS["conn"]->real_escape_string($_POST["email2"])),
                            $_SERVER["REMOTE_ADDR"]
                        );

                        if ($_POST["password"] == $_POST["password2"]) //Check if passwords match
                        {
                            if ($_POST["email"] == $_POST["email2"]) //check if emails match
                            {
                                $query5 = $GLOBALS["conn"]->query("SELECT * FROM users WHERE email = '$register[3]'");
                                if ($GLOBALS["conn"]->num_rows($query5) > 0) //Check if emails is unique in db
                                {
                                    echo "Email already used";
                                } else 
                                {
                                    $query2 = $GLOBALS["conn"]->query("SELECT * FROM users WHERE username = '$register[0]'");
                                    if ($query2->num_rows() > 0)  // check if username is unique
                                    {
                                        echo "Username taken";
                                    } else
                                    {                         
                                        $rand = rand(0,100000); //Generate salt
                                        $encpass = hash("sha512", md5($register[1]) . sha1($rand));
                                        $GLOBALS["conn"]->query("INSERT INTO `users` (`username`, `password`, `salt`, `email`, `ip`, `ugroupid`) VALUES ('$register[0]', '$encpass', '$rand', '$register[3]', '$register[5]', '5')"); //Register the user in the database 
                                        $searchquery = $GLOBALS["conn"]->query("SELECT * FROM `users` WHERE `username` = '$register[0]'");
                                        while ($form = $searchquery->fetch_object()) 
                                        {
                                            $sessionhash = md5(sha1($form->username) . sha1($form->id + rand(0,1000000))); // generate session hash
                                            $ip = $_SERVER["REMOTE_ADDR"];
                                            $GLOBALS["conn"]->query("Insert into `sessions` (`userid`, `hash`, `ip`) values ('$form->id', '$sessionhash', '$ip')"); // Register session in the database (sign in)
                                            setcookie("session", $sessionhash, time()+60*60*24*365); // set the cookie
                                            echo "Registered";
                                        }
                                    }
                                }
                            } else 
                            {
                                echo "emails don't match";   
                            }
                        } else
                        {
                            echo "passwords don't match";   
                        } 
                    } else
                    {
                        echo "<script>alert('You must agree to the terms of service.')</script>";   
                    }
                } else {
                    echo "Fill in all forms please";
                }
            } else 
            {
                echo "Something went wrong";   
            }
        }
    } else 
    {
        echo "Something went wrong";   
    }
} else {
    if ($_REQUEST['do'] == "logout") {
        setcookie("session", "", time()-60*60*24*365); // reset the active cookie (logout)
        echo "Successfully logged out";
        echo "<meta http-equiv='refresh' content='2;url=forum.php' />";
    } else
    {
        echo "You're already signed in."; 
        echo "<meta http-equiv='refresh' content='2;url=forum.php' />";
    }
}

?>
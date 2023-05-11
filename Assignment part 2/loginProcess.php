<?php
    include("settings.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $required = array('Username', 'Password');
        $error = false;

        foreach($required as $field) {
            if (empty($_POST[$field])) {
                $error = "Please enter a " . $field;
                break;
            }
        }

        $validCredentials = findCredentials($_POST["Username"], $_POST["Password"]);
        if($validCredentials[0] == true){
            login(true, $validCredentials[2]);
        } else {
            $error = $validCredentials[1];
        }

    } else {
        $error = "No Post, Redirecting to login page";
    }
    cleanup($error, array("login.php", "index.php"))
?>

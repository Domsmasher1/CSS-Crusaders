<?php
    include("header.inc");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $required = array('Username', 'Password', 'ConfirmPassword', 'Email', 'EmailConfirm');
        $error = [];

        foreach($required as $field) {
            if (empty($_POST[$field])) {
                $error[] = "Please enter a " . $field;
                break;
            }
        }
        if ($_POST["Password"] != $_POST["ConfirmPassword"]) {
            $error[] = "Passwords do not match";
        }
        if ($_POST["Email"] != $_POST["EmailConfirm"]) {
            $error[] = "Emails do not match";
        }
        $findUsername = findFromTable("Username", $_POST["Username"], "UserData");
        if(!empty($findUsername)){
            $error[] = "That username is already taken";
        }

        if (!$error) {
            $field_names = array('Username', 'Password', 'Email');

            $register_data = array();

            $index = 0;
            $fields = count($field_names);

            while($index < $fields){
                $register_data[$index] = sanitiesInputs($_POST[$field_names[$index]]);
                $index = $index + 1;
            }

            $query = "INSERT INTO UserData (Email, Password, Username) VALUES (?, ?, ?)";
            $preparedQuery = mysqli_prepare($_SESSION["Connection"], $query);
            mysqli_stmt_bind_param($preparedQuery, 'sss', $register_data[2], $register_data[1], $register_data[0]);
            mysqli_stmt_execute($preparedQuery);
            mysqli_stmt_close($preparedQuery);

            echo "Data inserted successfully!";
        }
        cleanup(implode("<br/>", $error), ["register.php", "login.php"], $oldPost = array("Username", "Password"));
    } else {
        header("Location: login.php");
    }

?>

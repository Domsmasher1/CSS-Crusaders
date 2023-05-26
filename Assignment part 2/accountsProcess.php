<?php
    include("header.inc");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $errors = [];
       // Check first name
        if ($_POST["FirstName"] and !preg_match("/^[A-Za-z]{1,20}$/", $_POST["FirstName"])) {
            $errors[] = "First Name should contain max 20 alphabetical characters.";
        }
        // Check last name
        if ($_POST["LastName"] and !preg_match("/^[A-Za-z]{1,20}$/", $_POST["LastName"])) {
            $errors[] = "Last Name should contain max 20 alphabetical characters.";
        }
        // Check email address
        if ($_POST["Email"] and !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
        }
        // Check phone number
        $phone = preg_replace("/\s+/", "", $_POST["PhoneNumber"]); // Remove spaces from phone number
        if ($_POST["PhoneNumber"] and !preg_match("/^\d{8,12}$/", $phone)) {
            $errors[] = "Phone number should contain 8 to 12 digits.";
        }
        // Check street address
        if (strlen($_POST["StreetAddress"]) > 40) {
            $errors[] = "Street Address should contain max 40 characters.";
        }
        // Check suburb/town
        if (strlen($_POST["SuburbTown"]) > 40) {
            $errors[] = "Suburb/Town should contain max 40 characters.";
        }
        // Check state
        $validStates = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
        if ($_POST["StateTeritory"] != "Select" and !in_array($_POST["StateTeritory"], $validStates)) {
            $errors[] = "Invalid state selected.";
        }
        // Check postcode
        if ($_POST["PostCode"] and !preg_match("/^\d{4}$/", $_POST["PostCode"])) {
            $errors[] = "Invalid postcode.";
        }
        if (!$errors) {
            $autoFillData = array("FirstName" => "", "LastName" => "", "Email" => "", "PhoneNumber" => "", "StreetAddress" => "", "SuburbTown" => "", "StateTeritory" => "", "PostCode" => "");
            $currentAutofillData = unserialize(findFromTable("UserID", $_SESSION["UserId"], "UserData")[0]["AutofillData"]);
            if (!empty($currentAutofillData)){
                foreach ($autoFillData as $key => $data){
                    if ($currentAutofillData[$key]){
                        $autoFillData[$key] = $currentAutofillData[$key];
                    }
                }
            }

            foreach ($autoFillData as $key => $data) {
                if($_POST[$key] and $_POST[$key] != "Select"){
                    echo "$key $_POST[$key] <br>";
                    $autoFillData[$key] = $_POST[$key];
                }
            }
            $serializedData = serialize($autoFillData);
            $query = "UPDATE UserData SET AutofillData = ? WHERE UserID = ?";
            $preparedQuery = mysqli_prepare($_SESSION["Connection"], $query);
            mysqli_stmt_bind_param($preparedQuery, 'ss', $serializedData, $_SESSION['UserId']);
            mysqli_stmt_execute($preparedQuery);
            mysqli_stmt_close($preparedQuery);

            echo "Data inserted successfully!";
        }
        cleanup(implode("<br/>", $error), ["register.php", "login.php"]);
    } else {
        header("Location: login.php");
    }
?>

<?php
    if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { // If the file has been accessed directly, return them to the index page
        header("Location: index.php");
        exit;
    }

    session_start(); //Starts the session, allowing use of session variables
    include("functions.php"); //Has all the functions for all the pages

    $username = 's104560728'; //Username for database
    $password = '270904'; //Password for database
    $database = $username . '_db'; //Database name
    $variables = array("Username", "Password", "Error", "UserId"); //Variables to be initialised
    $_SESSION["Connection"] = mysqli_connect('feenix-mariadb.swin.edu.au', $username, $password) or die('Could not connect: ' . mysqli_error($_SESSION["Connection"]));

    mysqli_select_db($_SESSION["Connection"], $database) or die('Could not select database, please try again later or contact a developer');

    intialiseSessionVariables($variables);
?>

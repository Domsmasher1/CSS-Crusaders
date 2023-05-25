<?php
    if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { // If the file has been accessed directly, return them to the index page
        header("Location: index.php");
        exit;
    }

    /**
     * Runs though all the session variables provided and makes sure they exist
     * @param array $variables - a array full of all the variables you are initializing
     * @return string - Message to tell that it worked for debuging
     * Author - Dominic White
     */
    function intialiseSessionVariables($variables){
        foreach($variables as $variable){
            if(!isset($_SESSION[$variable])){
                unset($_SESSION[$variable]);
            }
        }
        return "All Variables initalised <br>";
    }

    /**
     * Removes the specified item from the table
     * @param string $dataName - Name of the column, eg UserId
     * @param string $dataValue - Name of data value, eg 3
     * @param string $table - Table to be accessed, eg UserData
     * @return string - Returns if the query was a success or not
     * Author - Dominic White
     */
    function deleteFromTable($dataName, $dataValue, $table) {
        $query = "DELETE FROM $table WHERE $dataName = '$dataValue'";
        $result = mysqli_query($_SESSION["Connection"], $query);

        if ($result){
            $result = "Entries were sucsessfuly deleted";
        } else {
            $result = "Query failed " . mysqli_error($_SESSION["Connection"]);
        }
        return $result;
    }

    /**
     * Finds if there is the specifed item in the table
     * @param string $dataName - Name of the column, eg UserId
     * @param string $dataValue - Name of data value, eg 3
     * @param string $table - Table to be accessed, eg UserData
     * @return array|string - Will either return an error message, or the table with the data needed
     * Author - Dominic White and Jack Spong
     */
    function findFromTable($dataName, $dataValue, $table) {
        $connection = $_SESSION["Connection"];
        $output = array();
        $dataValue = sanitiesInputs($dataValue);

        if ($dataName == "*" and $dataValue == "*") {
            $query = "SELECT * FROM $table";
        } else {
            $query = "SELECT * FROM $table WHERE $dataName = ?";
        }

        $statement = mysqli_prepare($connection, $query); //Binds the query to a statement, which can have values edited before accessing the database for proventing sql injection

        if (!$statement) {
            $output = "Query preparation failed " . mysqli_error($connection);
            return $output;
        }
        if ($dataName != "*" and $dataValue != "*") {
            mysqli_stmt_bind_param($statement, 's', $dataValue); //Specifies that input is a string
        }

        mysqli_stmt_execute($statement); //Runs the query
        $result = mysqli_stmt_get_result($statement);

        if (!$result) {
            $output = "Query execution failed " . mysqli_error($connection);
            return $output;
        }
        while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            array_push($output, $row);
        }
        mysqli_stmt_close($statement);
        return $output;
    }

    /**
     * Checks if the username and password of the user is in the database
     * @param string $username - User's inputed username
     * @param string $password - User's inputed password
     * @return array - returns a success or fail msg with extra data depending on what happens
     * Author - Dominic White
     */
    function findCredentials($username, $password){
        $sqlData = findFromTable("Username", $username, "UserData");
        $inputCredentials = array("Username" => $username, "Password" => $password);

        if(isset($sqlData) and $sqlData != ""){
            $sqlData = $sqlData[0];
            foreach($inputCredentials as $key => $field){
                if($sqlData[$key] == $inputCredentials[$key]) {
                    if($key == "Password"){
                        return array(true, "Credentials are valid", $sqlData["UserID"]);
                    }
                } else break;
            }
            return array(false, "Failed to login, Username or Password is incorrect");
        }
        return array(false, "Please enter a username and password");
    }

    /**
     * Processes errors and unsets variables
     * @param string $error - Holds the error encounterd when going though the page
     * @param array $location - Where to send the user if there is an error or success (first is error, seccond is success)
     * @param array $oldPost - An array of the required post fields, by default equal to username and password
     * @return void
     * Author - Dominic White
     */
    function cleanup($error, $location, $oldPost = array("Username", "Password")){
        foreach($oldPost as $field){
            unset($_POST[$field]);
        }

        mysqli_close($_SESSION["Connection"]);

        if ($error) {
            $_SESSION["Error"] = $error;
            header("Location: {$location[0]}");
            exit;
        }
        else {
            header("Location: {$location[1]}");
            exit;
        }
    }

    /**
     * Logs the user in, and sets their user id to the session
     * @param bool $inOrOut - logs the user in or logs them out depending if its true or false, logs out by default
     * @param string $userId - The userid of the user, null by default
     * @return void
     * Author - Dominic White
     */
    function login($inOrOut = false, $userId = null){
        $error = false;
        if($inOrOut){
            $sqlUserId = findFromTable("UserID", $userId, "UserData")[0];
            if(isset($sqlUserId["UserID"]) and $sqlUserId["UserID"] != ""){
                $_SESSION["UserId"] = $sqlUserId["UserID"];
            } else {
                $error = "User does not exist";
            }
            cleanup($error, array("login.php", "index.php"));
        } else {
            if(isset($_SESSION["UserId"])){
                unset($_SESSION["UserId"]);
                cleanup("Logging out", array("index.php", "index.php"));
            }
        }
    }

    /**
     * Verifies the user id, and if they cant be verified, sends them to the login page
     * @return void - if the user id does not match, sends them to the login page
     * Author - Dominic White
     */
    function verifyUserId()
    {
        if(isset($_SESSION["UserId"])){
            $sqlUserId = findFromTable("UserID", $_SESSION["UserId"], "UserData")[0];
            if(!isset($sqlUserId["UserID"]) or $sqlUserId["UserID"] != $_SESSION["UserId"]){
                echo "Redirecting to login page";
                cleanup("No valid user found, please login again", array("login.php", "index.php"));
            }
        }
    }

     /**
     * Removes special characters from input
     * @param string $value - The input to be sanitiesed
     * @return string - returns the sanitied value
     * Author - Dominic White
     */
    function sanitiesInputs($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    /**
     * Checks if the key exists in the $_POST array
     * @param string $name - The name of the field to check
     * @param string $key - The field to check
     * @param string $value - The value to return if the field is found
     * @return mixed - Returns the value of the field if it exists, void otherwise
     * Author - Dominic White
     */
    function keyCheck($name, $key, $value){
        if ($key == $name) {
            return $value;
        }
    }

    ?>

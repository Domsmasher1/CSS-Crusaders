<?php
//Imports the sign in info and connection
require_once "settings.php";
// Create a mysqli connection
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Creates the EOI table
$EOI_table = "CREATE TABLE EOI (
    EOInumber INT(10) AUTO_INCREMENT PRIMARY KEY,
    JobRefNum INT(10),
    FirstName VARCHAR(250),
    LastName VARCHAR(250),
    StreetAddress VARCHAR(250),
    Suburb VARCHAR(250),
    State VARCHAR(250),
    Postcode INT(4),
    Email VARCHAR(250),
    Phone VARCHAR(250),
    Skills VARCHAR(250),
    OtherSkills VARCHAR(250),
    Status VARCHAR(250)
)";

// Execute the query to check if table has or hasn't been created
if (mysqli_query($conn, $EOI_tab)) {
    echo "Table EOI created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>

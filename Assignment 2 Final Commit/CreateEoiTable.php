<?php
//Imports the sign in info and connection
include 'header.inc';
// Create a mysqli connection
$conn = $_SESSION["Connection"];

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Creates the EOI table
$EOI_table = "CREATE TABLE EOI (
    EOInumber INT(10) AUTO_INCREMENT PRIMARY KEY,
    JobRefNum VARCHAR(5),
    FirstName VARCHAR(250),
    LastName VARCHAR(250),
    DOB VARCHAR(20),
    Gender VARCHAR(10),
    StreetAddress VARCHAR(250),
    Suburb VARCHAR(250),
    State VARCHAR(10),
    Postcode INT(4),
    Email VARCHAR(250),
    Phone VARCHAR(250),
    Skills VARCHAR(250),
    OtherSkills VARCHAR(250),
    Stat VARCHAR(20)
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

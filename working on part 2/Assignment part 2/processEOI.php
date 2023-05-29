<?php
include 'header.inc';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Validate and sanitize the form data
  $skillNames = [
    "Adaptable",
    "openMind",
    "Confident",
    "Cooperative",
    "Dependable",
    "Determined",
    "Efficient",
    "Flexible",
    "Hardworking",
    "Honest",
    "Independent",
    "Motivated",
    "Optimistic",
    "Organised",
    "Patient",
    "Productive",
    "Reliable",
    "Resourceful",
    "Responsible",
    "Versatile"
  ];
  $skills = [];
  foreach ($skillNames as $skill){
    if(isset($_POST[$skill])){
      array_push($skills, $skill);
    }
  }
  $skills = implode(", ", $skills);
  $allData = [
    "jobrefnum" => '',
    "FirstName" => '',
    "LastName" => '',
    "Email" => '',
    "PhoneNumber" => '',
    "DateOfBirth" => '',
    "gender" => '',
    "StreetAddress" => '',
    "SuburbTown" => '',
    "StateTeritory" => '',
    "PostCode" => '',
    "Skills" => $skills,
    "Extra_Skills" => '',
    "About_You" => ''
  ];
  foreach($_POST as $key => $value) {
    if(isset($value) and isset($allData[$key])){
      $value = sanitiesInputs($value);
      $allData[$key] = $value;
    }
  }

  // Perform server-side data format checking
  $errors = [];

  // Check job reference number
  if (!preg_match("/^[A-Za-z0-9]{5}$/", $allData["jobrefnum"])) {
    $errors[] = "Job Reference Number should be exactly 5 alphanumeric characters.";
  }

  // Check first name
  if (!preg_match("/^[A-Za-z]{1,20}$/", $allData["FirstName"])) {
    $errors[] = "First Name should contain max 20 alphabetical characters.";
  }

  // Check last name
  if (!preg_match("/^[A-Za-z]{1,20}$/", $allData["LastName"])) {
    $errors[] = "Last Name should contain max 20 alphabetical characters.";

  }

  // Check email address
  if (!filter_var($allData["Email"], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
  }

  // Check phone number
  $phone = preg_replace("/\s+/", "", $allData["PhoneNumber"]); // Remove spaces from phone number
  if (!preg_match("/^\d{8,12}$/", $phone)) {
    $errors[] = "Phone number should contain 8 to 12 digits.";
  }

  // Check date of birth
  if (!validateDate($allData["DateOfBirth"])) {
    $errors[] = "Date of Birth should be between 15 and 80 years ago in dd/mm/yyyy format.";
  }

  // Check gender
  if ($allData["gender"] !== "Male" and $allData["gender"] !== "Female" and $allData["gender"] !== "Other") {
    $errors[] = "Invalid gender selected.";
}

  // Check street address
  if (strlen($allData["StreetAddress"]) > 40) {
    $errors[] = "Street Address should contain max 40 characters.";
  }

  // Check suburb/town
  if (strlen($allData["SuburbTown"]) > 40) {
    $errors[] = "Suburb/Town should contain max 40 characters.";
  }

  // Check state
  $validStates = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
  if (!in_array($allData["StateTeritory"], $validStates)) {
    $errors[] = "Invalid state selected.";
  }

  // Check postcode
  if (!preg_match("/^\d{4}$/", $allData["PostCode"]) and !checkPostcodeMatchesState($allData["PostCode"], $allData["StateTeritory"])) {
    $errors[] = "Invalid postcode.";
  }

  // Check other skills if checkbox selected
  if (!isset($allData["Skills"])) {
    $errors[] = "Other Skills must be provided if checkbox selected.";
  }
  // If there are validation errors, display an error page
  if (!empty($errors)) {
    displayErrorPage($errors);
  } else {
    $query = "INSERT INTO EOI (JobRefNum, FirstName, LastName, DOB, Gender, StreetAddress, Suburb, State, Postcode, Email, Phone, Skills, OtherSkills)
    VALUES ('$allData[jobrefnum]', '$allData[FirstName]', '$allData[LastName]', '$allData[DateOfBirth]', '$allData[gender]', '$allData[StreetAddress]', '$allData[SuburbTown]', '$allData[StateTeritory]', '$allData[PostCode]',
    '$allData[Email]', '$allData[PhoneNumber]', '$allData[Skills]', '$allData[Extra_Skills]')";

    $error = sqliInsert($query);
    if($error){
      echo "Ran into the following error: <br>" . $error;
    } else {
      header("location: index.php");
    }
  }
} else {
  // Redirect users who directly access the script
  header("Location: index.php");
  exit();
}

// Function to validate the date within a specified range
function validateDate($dateOfBirth) {
  $today = new DateTime();
  $dob = DateTime::createFromFormat('Y-m-d', $dateOfBirth);

  if ($dob === false) {
    return false;
  }
  $age = $dob->diff($today)->y;

  if ($age < 15 || $age > 80) {
    return false;
  }
  return true;
}


function sqliInsert($query){
  $statement = mysqli_prepare($_SESSION["Connection"], $query); //Binds the query to a statement, which can have values edited before accessing the database for proventing sql injection

  if (!$statement) {
    $output = "Query preparation failed " . mysqli_error($_SESSION["Connection"]);
    return $output;
  }

  mysqli_stmt_execute($statement); //Runs the query
}

// Function to check if the postcode matches the selected state
function checkPostcodeMatchesState($postcode, $state) {
  // Implement your logic here to validate the postcode based on the state
  // For example, you could check against a database of valid postcodes for each state

  return true; // Placeholder implementation, replace with your validation logic
}

// Function to display an error page
function displayErrorPage($errors) {
  echo "We ran into the following errors: <br>";
  foreach ($errors as $error) {
    echo "$error <br>";
  }
}

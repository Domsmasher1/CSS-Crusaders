<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Daniel F">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>Accounts</title>
    <?php
	include 'header.inc';
	verifyUserId();
    $autoFillData = array("FirstName" => "", "LastName" => "", "Email" => "", "PhoneNumber" => "", "StreetAddress" => "", "SuburbTown" => "", "StateTeritory" => "", "PostCode" => "");
    $currentAutofillData = unserialize(findFromTable("UserID", $_SESSION["UserId"], "UserData")[0]["AutofillData"]);
    if (!empty($currentAutofillData)){
        foreach ($autoFillData as $key => $data){
            if ($currentAutofillData[$key]){
                $autoFillData[$key] = $currentAutofillData[$key];
            }
        }
    }
    $selectedState = $autoFillData["StateTeritory"];
    ?>
    </head>

    <body class="background">
        <header>
            <?php include 'menu.inc' ?>
        </header>
        <article class="main">
            <form method="post" action="accountsProcess.php">
                <div class="headingGray">
                    <h1 class="centerText">Account Information</h1>
                    <p class="centerText">Here you can enter personal information to be autofilled into the application form.</p>
                </div><br>

                <p class="centerBox centerText">
                    <span>

                    <label for="FirstName">First Name:</label>
                    <input class="inputBox input" type="text" id="FirstName" name="FirstName" pattern="[A-Za-z].{,20}" value = "<?php echo $autoFillData["FirstName"]?>"><br>

                    <label for="LastName">Last Name:</label>
                    <input class="inputBox input" type="text" id="LastName" name="LastName" pattern="[A-Za-z].{,20}" value = "<?php echo $autoFillData["LastName"]?>"><br>

                    <label for="Email">Email:</label>
                    <input class="inputBox input" type="email" id="Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value = "<?php echo $autoFillData["Email"]?>"><br>

                    <label for="PhoneNumber">Phone Number:</label>
                    <input class="inputBox input" type="tel" id="PhoneNumber" name="PhoneNumber" minlength="8" maxlength="12" pattern="[0-9]+" value = "<?php echo $autoFillData["PhoneNumber"]?>"><br>

                    </span>
                </p><br><br>

                <div class="centerBox centerText">
                    <span>
                        <label for="StreetAddress">Street Address:</label>
                        <input class="inputBox input" type="text" id="StreetAddress" name="StreetAddress" pattern="{40}" value = "<?php echo $autoFillData["StreetAddress"]?>"><br>

                        <label for="SuburbTown">Suburb/Town:</label>
                        <input class="inputBox input" type="text" id="SuburbTown" name="SuburbTown" pattern="{40}" value = "<?php echo $autoFillData["SuburbTown"]?>"><br>

                        <label for="StateTeritory">Select a State or Territory:</label>
                        <select class="inputBox input" id="StateTeritory" name="StateTeritory">
                            <option value="Select" class="input" <?php if ($selectedState === "Select") echo "selected"; ?>>SELECT</option>
                            <option value="VIC" class="input" <?php if ($selectedState === "VIC") echo "selected"; ?>>VIC</option>
                            <option value="NSW" class="input" <?php if ($selectedState === "NSW") echo "selected"; ?>>NSW</option>
                            <option value="ACT" class="input" <?php if ($selectedState === "ACT") echo "selected"; ?>>ACT</option>
                            <option value="SA" class="input" <?php if ($selectedState === "SA") echo "selected"; ?>>SA</option>
                            <option value="QLD" class="input" <?php if ($selectedState === "QLD") echo "selected"; ?>>QLD</option>
                            <option value="WA" class="input" <?php if ($selectedState === "WA") echo "selected"; ?>>WA</option>
                            <option value="NT" class="input" <?php if ($selectedState === "NT") echo "selected"; ?>>NT</option>
                        </select><br>

                        <label for="PostCode">Post Code:</label>
                        <input class="inputBox input" type="text" id="PostCode" name="PostCode" maxlength="4" pattern="[0-9]+" value = "<?php echo $autoFillData["PostCode"]?>"><br>
                    </span>
                </div><br>

                <div class = "wrap50">
                    <div class="floatLeft padding10">
                        <a href="logout.php" class="buttonGeneral elementLeft">Logout</a>
                    </div>
                    <div class="floatRight padding10">
                        <input type="submit" value="Submit" class="buttonGeneral elementRight">
                    </div>
                </div>

        </form>
        <div class = "wrap50">
            <br>
            <div class ="floatLeft padding10">
                <a href="manage_form.php" class="buttonGeneral">Management</a>
            </div>
            <div class="floatRight padding10">
                <a href="CreateEoiTable.php" class="buttonGeneral elementRight">Create EOI</a>
            </div>
        </div>
        </article>
        <footer>
            <?php include 'footer.inc' ?>
        </footer>
    </body>
</html>

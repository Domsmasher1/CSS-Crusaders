<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Daniel F">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>Accounts</title> 
    <?php include 'header.inc' ?>
    </head> 

    <body class="background">
        <header>
            <?php include 'menu.inc' ?>
        </header>
        <article class="main">
            <form method="post" action="account_proccess.php">
                <div class="headingGray">
                    <h1 class="centerText">Account Information</h1>
                    <p class="centerText">Here you can enter personal information to be autofilled into the application form.</p>
                </div><br>

                <p class="centerBox centerText">
                    <span>

                    <label for="FirstName">First Name:</label>
                    <input class="inputBox input" type="text" id="FirstName" name="FirstName" required pattern="[A-Za-z].{,20}"><br>

                    <label for="LastName">Last Name:</label>
                    <input class="inputBox input" type="text" id="LastName" name="LastName" required pattern="[A-Za-z].{,20}"><br>

                    <label for="Email">Email:</label>
                    <input class="inputBox input" type="email" id="Email" name="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>

                    <label for="PhoneNumber">Phone Number:</label>
                    <input class="inputBox input" type="tel" id="PhoneNumber" name="PhoneNumber" minlength="8" maxlength="12" required pattern="[0-9]"><br>

                    </span>
                </p><br><br>

                <div class="centerBox centerText">
                    <span>
                        <label for="StreetAddress">Street Address:</label>
                        <input class="inputBox input" type="text" id="StreetAddress" name="StreetAddress" required pattern="{40}"><br>

                        <label for="SuburbTown">Suburb/Town:</label>
                        <input class="inputBox input" type="text" id="SuburbTown" name="SuburbTown" required pattern="{40}"><br>

                        <label for="StateTeritory">Select a State or Territory:</label>
                        <select class="inputBox input" id="StateTeritory" name="StateTeritory" required>
                            <option value="Select" class="input">SELECT</option>
                            <option value="VIC" class="input">VIC</option>
                            <option value="NSW" class="input">NSW</option>
                            <option value="ACT" class="input">ACT</option>
                            <option value="SA" class="input">SA</option>
                            <option value="QLD" class="input">QLD</option>
                            <option value="WA" class="input">WA</option>
                            <option value="NT" class="input">NT</option>
                        </select><br>

                        <label for="PostCode">Post Code:</label>
                        <input class="inputBox input" type="text" id="PostCode" name="PostCode" maxlength="4" required pattern="[0-9]"><br>
                    </span>
                </div><br>

                <div class = "wrap50">
                    <div class="floatLeft padding10">
                        <button class="buttonGeneral">Back</button>
                    </div>
                    <div class="floatRight padding10">
                        <input type="submit" value="Submit" class="buttonGeneral elementRight">
                    </div>
                </div>

        </form>
        </article>
        <footer>
            <?php include 'footer.inc' ?>
        </footer>
    </body>
</html>

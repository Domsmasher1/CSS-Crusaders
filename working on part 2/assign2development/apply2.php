<head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Dominic and Jack">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>Apply</title> <!--Put your webpage title here-->
</head>

    <body class="background">

      <header>
          <?php include 'menu.inc' ?>
      </header>
        <article class="main">
            <form method="post" action="https://mercury.swin.edu.au/it000000/formtest.php" novalidate="novalidate">
                <div class="headingGray">
                    <h1 class="centerText">Personal information</h1>
                    <p class="centerText">Personal information that can be used for contact and offical documentation</p>
                </div><br>

                <div class="centerText centerElements">
                    <p class="inputBox">
                        <label for="jobrefnum">Job Reference Number:</label>
                        <input  type="text" id="jobrefnum" name="jobrefnum" pattern="{5}"><br>
                    </p>
                </div><br>

                <p class="centerBox">
                    <span>

                    <label for="FirstName">First Name:</label>
                    <input class="inputBox input" type="text" id="FirstName" name="FirstName" required pattern="[A-Za-z].{,20}"><br>

                    <label for="LastName">Last Name:</label>
                    <input class="inputBox input" type="text" id="LastName" name="LastName" required pattern="[A-Za-z].{,20}"><br>

                    <label for="Email">Email:</label>
                    <input class="inputBox input" type="email" id="Email" name="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>

                    <label for="PhoneNumber">Phone Number:</label>
                    <input class="inputBox input" type="tel" id="PhoneNumber" name="PhoneNumber" required pattern="[0-9]+{8,12}"><br>

                    </span>
                </p><br><br>

                <div class="centerBox">
                    <div class="wrap100">
                        <div class="floatLeft centerText">
                            <label for="DateOfBirth"><h1>Date of birth:</h1></label>
                            <input type="date" id="DateOfBirth" name="DateOfBirth" required><br>
                        </div>
                        <div class="floatRight centerText">
                            <h1>Gender:</h1>
                            <label for="male">Male</label>
                            <input type="radio" id="male" name="gender" value="Male">

                            <label for="female">Female</label>
                            <input type="radio" id="female" name="gender" value="Female"><br>

                            <label for="other">Other</label>
                            <input type="radio" id="other" name="gender" value="Other">

                            <label for="prefnosay">Prefer not to say</label>
                            <input type="radio" id="prefnosay" name="gender" value="Prefer not to say">
                        </div>
                    </div>
                </div><br><br>

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
                        <input class="inputBox input" type="text" id="PostCode" name="PostCode" required pattern="[0-9]+{4}"><br>
                    </span>
                </div><br><br>

                <div class="headingGray">
                    <h1 class="centerText">Your Skills</h1>
                    <p class="centerText">Skills that relate to you, or you think may benifit us.</p>
                </div><br><br>
                <div class="centerBox">
                    <div class = "wrap250">
                        <div class="floatLeft">
                            <input type="checkbox" id="adaptable" name="Adaptable" value="Adaptable">
                            <label for="adaptable">Adaptable</label><br>
                            <input type="checkbox" id="openMinded" name="Open Minded" value="Open-Minded">
                            <label for="openMinded">Open-Minded</label><br>
                            <input type="checkbox" id="confident" name="Confident" value="Confident">
                            <label for="confident">Confident</label><br>
                            <input type="checkbox" id="cooperative" name="Cooperative" value="Cooperative">
                            <label for="cooperative">Cooperative</label><br>
                            <input type="checkbox" id="dependable" name="Dependable" value="Dependable">
                            <label for="dependable">Dependable</label><br>
                            <input type="checkbox" id="determined" name="Determined" value="Determined">
                            <label for="determined">Determined</label><br>
                            <input type="checkbox" id="efficient" name="Efficient" value="Efficient">
                            <label for="efficient">Efficient</label><br>
                            <input type="checkbox" id="flexible" name="Flexible" value="Flexible">
                            <label for="flexible">Flexible</label><br>
                            <input type="checkbox" id="hardworking" name="Hardworking" value="Hardworking">
                            <label for="hardworking">Hardworking</label><br>
                            <input type="checkbox" id="honest" name="Honest" value="Honest">
                            <label for="honest">Honest</label><br>
                        </div>
                        <div class="floatRight">
                            <input type="checkbox" id="independent" name="Independent" value="Independent">
                            <label for="independent">Independent</label><br>
                            <input type="checkbox" id="motivated" name="Motivated" value="Motivated">
                            <label for="motivated">Motivated</label><br>
                            <input type="checkbox" id="optimistic" name="Optimistic" value="Optimistic">
                            <label for="optimistic">Optimistic</label><br>
                            <input type="checkbox" id="organised" name="Organised" value="Organised">
                            <label for="organised">Organised</label><br>
                            <input type="checkbox" id="patient" name="Patient" value="Patient">
                            <label for="patient">Patient</label><br>
                            <input type="checkbox" id="productive" name="Productive" value="Productive">
                            <label for="productive">Productive</label><br>
                            <input type="checkbox" id="reliable" name="Reliable" value="Reliable">
                            <label for="reliable">Reliable</label><br>
                            <input type="checkbox" id="resourceful" name="Resourceful" value="Resourceful">
                            <label for="resourceful">Resourceful</label><br>
                            <input type="checkbox" id="responsible" name="Responsible" value="Responsible">
                            <label for="responsible">Responsible</label><br>
                            <input type="checkbox" id="versatile" name="Versatile" value="Versatile">
                            <label for="versatile">Versatile</label><br>
                        </div>
                    </div>
                </div><br><br>

                <div class="centerBox">
                    <textarea name="Extra Skills" id="extraSkill"  placeholder="Any extra skills that are not listed above..."></textarea>
                </div><br><br>

                <div class="headingGray">
                    <h1 class="centerText">About You</h1>
                    <p class="centerText">Write a few sentences describing why you would be perfect for this job.</p>
                </div><br><br>

                <div class="centerBox">
                    <textarea name="About You" id="aboutYou"  placeholder="Tell us why we should pick you..."></textarea>
                </div><br><br>

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

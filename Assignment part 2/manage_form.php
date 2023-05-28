<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Daniel F">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>Manage</title> 
    <?php include 'header.inc' ?>
</head>

<body class="background">
        <header>
            <?php include 'menu.inc' ?>
        </header>
        <article class="main">

        <div class="centerBox centerText">

        <form method="post" action="manage_results.php">

            <h1>Select option to generate your report<h1><br>

            <h3>          
                <label>Display all EOIs </label><input type="checkbox" name="manageselection" value="allEOI"><br>

                <label>Specify a position to view any EOIs for it</label><input type="text" name="specifyposition" required pattern="{5}"><br>

                <label>Specify a applicant to view their EOIs</label><input type="text" name="specifyapplicant" required pattern="[A-Za-z].{,20}"><br>

                <label>Specify a position to delete any EOIs for it  </label><input type="text" name="positiondeletion" required pattern="{5}"><br>

                <label>Enter a Job Reference Number and select its new status:</label>
                <input type="text" name="jobrefnum" required pattern="{5}"><br>

                <input type ="radio" name="stat" value="new" id="new" >
                <label for="new">New</label><br>
                <input type ="radio" name="stat"value="current" id="current" >
                <label for="current">Current</label><br>s
                <input type ="radio" name="stat" value="final" id="final" >
                <label for="final">Final</label><br>

                <div class="wrap50 padding10">
                <input type="submit" value="Submit" class="buttonGeneral">
                </div>
            </h3>
        </form>

        </div>      

        </article>
        <footer>
            <?php include 'footer.inc' ?>
        </footer>
</body>
</html>

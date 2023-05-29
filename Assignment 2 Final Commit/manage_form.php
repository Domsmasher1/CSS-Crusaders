<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Daniel F">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>Manage</title>
    <?php include 'header.inc'?>
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

                <label>What would you like to do with the EOI table:</label><br>
                    <label for="view">View </label>
                    <input type="radio" name="doing" value="view" id="view">

                    <label for="delete">Delete</label>
                    <input type="radio" name="doing" value="delete" id="delete">

                    <label for="update">Update Status</label>
                    <input type="radio" name="doing" value="update" id="update"><br><br>

                <label>If you are viewing or deleting, which method would you like to use:</label><br>
                    <label for="JobRefNumber">Job Reference Number </label>
                    <input type="radio" name="using" value="JobRefNumber" id="JobRefNumber">

                    <label for="name">&emsp;&emsp; Name </label>
                    <input type="radio" name="using" value="name" id="name"><br><br>

                <p class="centerText">Only select the one you are using:</p>
                <label for="name">Name: </label>
                <select name="name" id="name">
                <?php
                    $i = 0;
                    $users = getAllApplicats();
                    foreach ($users[0] as $option) {
                        echo '<option value="' . $users[1][$i] . '">' . $option . '</option>';
                        $i ++;
                    } ?>
                </select><br>

                <label for="jobRefNum">Job Reference Number: </label>
                <select name="jobRefNum" id="jobRefNum">
                <?php
                    foreach (getAllEOIs() as $option) {
                        echo '<option value="' . $option . '">' . $option . '</option>';
                    } ?>
                </select><br><br>

                <label>Status to update (Only use if using update status)<label><br>
                <input type ="radio" value="new" id="new" name="status">
                <label for="new">New </label>
                <input type ="radio" value="current" id="current" name="status">
                <label for="current">Current </label>
                <input type ="radio" value="final" id="final" name="status">
                <label for="final">Final</label>
                <br><br>
                <div class="wrap50 padding10">
                <input type="submit" value="Submit" class="buttonGeneral">
                </div><br>
            </h3>
        </form>

        </div>

        </article>
        <footer>
            <?php include 'footer.inc' ?>
        </footer>
</body>
</html>


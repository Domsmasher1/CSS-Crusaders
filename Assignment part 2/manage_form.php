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

                <label>Job Reference Number </label>
                <select name="jobRefNum" id="jobRefNum">
                <?php
                    foreach (getAllEOIs() as $option) {
                        echo '<option value="' . $option . '">' . $option . '</option>';
                    } ?>
                </select><br>

                <label>What would you like to do with the EOI table</label><br>
                    <label for="option1">View</label>
                    <input type="radio" name="option" value="option1" id="option1" required>

                    <label for="option2">Delete</label>
                    <input type="radio" name="option" value="option2" id="option2" required>

                    <label for="option3">Update Status</label>
                    <input type="radio" name="option" value="option3" id="option3" required><br>

                <label>Specify a applicant to view their EOIs (Only use if using View)</label><br>
                <select name="option" id="option">
                <?php
                    foreach (getAllApplicats() as $option) {
                        echo '<option value="' . $option . '">' . $option . '</option>';
                    } ?>
                </select><br>

                <label>Status to update (Only use if using update status)<label><br>
                <input type ="radio" value="new" id="new" name="status">
                <label for="new">New </label>
                <input type ="radio" value="current" id="current" name="status">
                <label for="current">Current </label>
                <input type ="radio" value="final" id="final" name="status">
                <label for="final">Final</label>

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

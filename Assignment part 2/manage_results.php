<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Daniel F">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>login</title> 
    <?php include 'header.inc' ?>
    <?php $table = false;
    $mysqli_msg = ""; 
    $comf_messg = "";

    if (isset($_POST["manageselection"]) and $_POST["manageselection"] == "allEOI") {
        $result = listAll();
        $table = true;
       

    } elseif ($_POST["specifyposition"] != "") {
        $position = $_POST["specifyposition"]; 
        $result = listPosition($position);
        $table = true;

    } elseif ($_POST["specifyapplicant"] != "") {
        $name = $_POST["specifyapplicant"];  
        $result = listApplicant($name);
        $table = true;
    } elseif ($_POST["positiondeletion"] != "") {
        $desired_position = "desired_position";
        $result = listPosition($desired_position);
        deleteEntry($_POST["positiondeletion"]);
        $comf_messg = "Entry deleted succesfuly "; 
        $table = false;

    } elseif ($_POST["jobrefnum"] != "") {
        
        $JRN = $_POST["jobrefnum"]; 

        if (isset($_POST["new"]) and $_POST["new"] == "new")
        {
            $stat = "New";
            statusChange($JRN, $stat); 
            $comf_messg = "Job: $JRN has been succsessfuly updated to New";

        }

        elseif(isset($_POST["current"]) and $_POST["current"] == "current")
        {
            $stat = "Current";
            statusChange($JRN, $stat); 
            $comf_messg = "Job: $JRN has been succsessfuly updated to Current";
        }

        elseif(isset($_POST["final"]) and $_POST["final"] == "final")
        {
            $stat = "Final";
            statusChange($JRN, $stat); 
            $comf_messg = "Job: $JRN has been succsessfuly updated to Final";
        }

        else {
        
            $comf_messg = "an error has occured, please ensure that your job reference number was entered correctly and that a new value was selected";
        }

        $table = false;
    } else {
        $table = false;
    }
    ?>

</head>
<body class="background">
    <header>
        <?php include 'menu.inc' ?>
    </header>
    <article class="main">
    <h2>EOI Table</h2>
    <?php 
    echo $mysqli_msg . $comf_messg; 
    if ($table == true) { ?>
    <table>
        <thead> 
            <tr>
                <?php foreach (array_keys($result[0]) as $header) { ?>
                    <th><?php echo $header; ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <?php foreach ($row as $value) { ?>
                        <?php if (is_array($value)) { ?>
                            <td>
                                <table>
                                    <?php foreach ($value as $innerValue) { ?>
                                        <tr>
                                            <td><?php echo $innerValue; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                        <?php } else { ?>
                            <td><?php echo $value; ?></td>
                        <?php } ?>
                    <?php } ?>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <?php } ?>
    </article>
    <footer>
        <?php include 'footer.inc' ?>
    </footer>
</body>
</html>






 
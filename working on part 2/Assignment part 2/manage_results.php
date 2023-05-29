<!DOCTYPE html>
    <head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Daniel F">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>login</title> 
    <?php include 'header.inc'; 
    $table = false;
    $mysqli_msg = []; 
    $comf_messg = [];


    if($_POST["using"] == "JobRefNumber")
    {
        $jobrefnum = $_POST["jobRefNum"];
        $EOIArray= findFromTable("JobRefNum", $jobrefnum, "EOI");
        $EOInums = [];
        foreach($EOIArray as $Array)
        {
        $EOInums[] = $Array["EOInumber"];
        }

        

    }
    elseif($_POST["using"] == "name")
    {
        $EOInum = $_POST["name"];
        $jobrefnumArray= findFromTable("EOInumber", $EOInum, "EOI");
        $jobrefnum = $jobrefnumArray[0]["JobRefNum"]; 
        $EOInums = []; 
        $EOInums[] = $EOInum; 
        
    }


    if (isset($_POST["manageselection"]) and $_POST["manageselection"] == "allEOI") {
        $result = listAll();
        $table = true;


    } elseif ($_POST["doing"] == "view") {
        $result = [];
        foreach($EOInums as $Array)
        {
        $result_temp = listPosition($Array);
        $result[] = $result_temp[0];
        }
        $table = true;
        
    } elseif ($_POST["doing"] == "delete") {
        $comf_messg = [];
        foreach($EOInums as $Array)
        {
        deleteEntry($Array);
        }

        $comf_messg[] = "Entries were sucsessfuly deleted";

        $table = false;

    } elseif ($_POST["doing"] == "update") {
        

        if ($_POST["status"] == "new")
        {

            $stat = "New";
            foreach($EOInums as $Array)
            {
            statusChange($Array, $stat);
            }
            $comf_messg[] = "Job: $jobrefnum has been succsessfuly updated to New";

            
        }

        elseif($_POST["status"] == "current")
        {
            $stat = "Current";
            foreach($EOInums as $Array)
            {
            statusChange($Array, $stat);
            }
            $comf_messg[] = "Job: $jobrefnum has been succsessfuly updated to Current";

        }

        elseif($_POST["status"] == "final")
        {
            $stat = "Final";
            foreach($EOInums as $Array)
            {
            statusChange($Array, $stat);
            }
            $comf_messg[] = "Job: $jobrefnum has been succsessfuly updated to Final";
        }

        else {
        
            $comf_messg = "an error has occured, please ensure that your job reference number was entered correctly and that a new value was selected";
        }

        $table = false;
    } else {
        $table = false;
        $comf_messg = "Error, you failed to select an option";
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
    foreach($comf_messg as $msg)
    {
        echo $msg; 
    }
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














 

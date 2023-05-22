<?php
echo "
<nav>
    <ol id='navbar'>
        <li class='buttonHeader'><a href='index.php'><img src='styles/images/complogo.png' id='navbar-image' alt='Company Logo'></a></li>
        <li class='buttonHeader'><a href='index.php'><h2>Home</h2></a></li>
        <li class='buttonHeader'>
            <div class='dropdown'>
                <a href='jobs.php'><h2>Jobs</h2></button>
                    <div class = 'dropdownContent'>
                        <a href='jobs.php'>Web Developer</a>
                        <a href='jobs.php'>Cybersecurity Analyst</a>
                    </div>
            </div>
        </a></li>
        <li class='buttonHeader'><a href='apply2.php'><h2>Apply</h2></a></li>
        <li class='buttonHeader'><a href='about.php'><h2>About</h2></a></li>
        <li class='buttonHeader'><a href='enhancements.php'><h2>Enhancements</h2></a></li>
        <li class='buttonHeader'><a href='mailto:csscrusaders@gmail.com'><h2>Contact Us</h2></a></li>
        <li class='buttonHeader'>";

        if (isset($_SESSION['UserId'])) {
            $username = findFromTable('UserId', $_SESSION['UserId'], 'UserData')[0]['Username'];

            if ($username == ''){
               echo "<a href=login.php><h2>Login";
            }
            else {
                echo "<a href='accounts.php'><h2>Logged in as $username";
            }
        } else {
            echo "<a href=login.php><h2>Login";
        }

    echo "</h2></a></li> </ol>
</nav>
";

?>

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
    </head> 

    <body class="background">
        <header>
            <?php include 'menu.inc' ?>
        </header>
        <article class="main">
                <form method="post" action="loginProcess.php">
                    <div class="centerBox centerText">
                        <h1>Login to the Website</h1>
                        <br>
                        <h3>
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="Username"><br>
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="Password"><br>
                            <div class="wrap50 padding10">
                                <input type="submit" value="Login" class="buttonGeneral">
                            </div>
                            <?php
                                if(isset($_SESSION["Error"])){
                                    echo($_SESSION["Error"] . "<br>");
                                    unset($_SESSION["Error"]);
                                }
                            ?>
                        </h3>
                        <br>
                        <p class="centerText">If you are new to the CSS Crusaders, please register for an account</p>
                        <br>
                        <p class="centerText"><a href="register.php">Sign Up</a></p>
                    </div>
                </form>
        </article>
        <footer>
            <?php include 'footer.inc' ?>
        </footer>
    </body>
</html>

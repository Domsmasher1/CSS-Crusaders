<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="test website for inquiry project">
  <meta name="keywords" content="HTML5, tags">
  <meta name="author" content="Daniel F"><!--Put your name here-->
  <meta name ="Viewport" content="width=device-width, initial scale=1.0">
  <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
  <title>Sign Up</title> <!--Put your webpage title here-->
  <?php include 'header.inc' ?>
</head>

<body class="background">

    <header>
        <?php include 'menu.inc' ?>
	</header>

	<article class="main">
        <!--Put the content of your webpage here-->
        <form method="post" action="registerProcess.php">
            <div class="centerBox centerText">
                <h1>Sign Up For an Account</h1>
                <br>
                <h3>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="Email"><br>
                    <label for="email_confirm">Confirm Email</label>
                    <input type="text" id="email_confirm" name="EmailConfirm"><br>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="Username"><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="Password"><br>
                    <label for="password__confirm">Confirm Password:</label>
                    <input type="password" id="password_confirm" name="ConfirmPassword"><br>
                    <?php
                        if(isset($_SESSION["Error"])){
                            echo("The following errors were encountered: <br>" . $_SESSION["Error"] . "<br>");
                            unset($_SESSION["Error"]);
                        }
                    ?>
                    <div class="wrap50 padding10">
                        <input type="submit" value="Sign Up" class="buttonGeneral">
                    </div>
                </h3>
                <br>
                <p class="centerText">If you already have an account, please return to the login page</p>
                <br>
                <p class="centerText"><a href="login.php">Login</a></p>
            </div>
        </form>
    </article>

    <footer>
        <?php include 'footer.inc' ?>
    </footer>

</body>
</html>

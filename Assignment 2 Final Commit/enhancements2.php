<head>
    <meta charset="utf-8">
    <meta name="description" content="test website for inquiry project">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Dominic and Jack">
    <meta name ="Viewport" content="width=device-width, initial scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
    <title>Apply</title>
    <?php include 'header.inc' ?>
</head>

    <body class="background">

      <header>
          <?php include 'menu.inc' ?>
      </header>
        <article class="main">

        <h2>Enhancements</h2>

        <p>This page contains descriptions of all of the Enhancements that the group has implemented in Part 2 of the assignment. Please check the older version of this page for details on the first half of the project.</p>
        <br>
        <h3>Login System</h3>
        <p>The website has been enhanced with a login and accounts system. This allows the user to either login to an already existing account, create a new account, and from their,
            gain access to new webpages such as accounts.php and manage.php. An admin account called Admin has already been created. This system required the expansion of the back end
            database as well as several new webpages being created in order to facilitate this system.
        </p>
        <br>
        <h3>Autofill System</h3>
        <p>The website has also been enhanced with the addition of an autofill system. Some of the fields in the application form are going to need to be re used if the same user makes
            multiple applications. In order to streamline this proccess, a logged in user can use the accounts.php webpage in order to create a series of generic autofill data for them
            such as their name and place of residence. This will then be autofilled into the apply form when the start an application.
        </p> <br/><br/><br/>
        <p><a href="enhancements.php">This links to the original enhancements page</a></p>
        </article>
        <footer>
            <?php include 'footer.inc' ?>
        </footer>
    </body>
</html>

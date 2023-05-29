<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="website for inquiry project">
        <meta name="keywords" content="HTML5, tags">
        <meta name="author" content="Charlie O">
        <meta name ="Viewport" content="width=device-width, initial scale=1.0">
        <link rel="stylesheet" href="styles/styles.css" media="screen and (max-width: 1920px)">
        <title>Open Positions</title>
        <?php include 'header.inc';?>
    </head>
    <body class="background">
        <header>
            <?php include 'menu.inc' ?>
        </header>
          <article class="main">
            <div class="headingGray">
                <h1 class="centerText">Open Positions</h1>
                <p class="centerText">Positions we are currently hiring.</p>
            </div><br><br>
            <section>
                <a href="apply2.php?id=WBD01" class="revertA" id="textdeco">
                    <div class="job_listing padding10">
                        <br><h2 class="centerText">Web developer</h2>
                        <sub>Reference number: WBD01 </sub><br>
                            <img class="listing_icon" src="images/job1icon.png" alt="A series of stylised digital devices.">
                            <h3>Job description:</h3>
                            <p>In this role you will work alongside our team of experts to develop sleak and modern web pages for our clients</p><br>
                            <aside>
                                <h3 class="centerText">Manager:</h3>
                                <p class="centerText">Projects Manager</p><br>
                            </aside>
                            <h3>Salary range:</h3>
                            <p>$70-90k</p><br>

                            <h3>Key responsibilities</h3>
                            <ol>
                                <li>Front end development</li>
                                <li>Back end development</li>
                                <li>Communication with clients</li>
                            </ol><br>
                            <h3>Required qualifications, skills, knowledge and attributes.</h3>
                            <ul>
                                <li>Knowledge on how to use HTML5</li>
                                <li>Knowledge on how to use CSS</li>
                                <li>Customer service skills</li>
                            </ul><br>
                    </div>
                </a>
            </section><br><br>

            <section>
                <a href="apply2.php?id=CSA02" class="revertA" id="textdeco">
                    <div class="job_listing padding10">
                        <br><h2 class="centerText">Cyber security analyst</h2>
                        <sub>Reference number: CSA02 </sub><br>
                            <img class="listing_icon" src="images/job2icon.png" alt="A stylised image of a hacker.">
                            <h3>Job description:</h3>
                            <p>In this role you will work alongside our team of experts to explore and manage cyber security risks to our clients to ensure their online safety</p><br>
                            <aside>
                                <h3 class="centerText">Manager:</h3>
                                <p class="centerText">Projects Manager</p><br>
                            </aside>
                            <h3>Salary range:</h3>
                            <p>$80-100k</p><br>

                            <h3>Key responsibilities</h3>
                            <ol>
                                <li>Active reasearch of cyber security threats</li>
                                <li>Implementation of cyber secuirty measures on projects</li>
                                <li>Communication with clients</li>
                            </ol><br>
                            <h3>Required qualifications, skills, knowledge and attributes.</h3>
                            <ul>
                                <li>Prior experience in cyber secuirty</li>
                                <li>A relevant course with a cyber security component</li>
                                <li>Customer service skills</li>
                            </ul><br>
                    </div>
                </a>
            </section>
        </article>

        <footer>
            <?php include 'footer.inc' ?>
        </footer>
    </body>
</html>

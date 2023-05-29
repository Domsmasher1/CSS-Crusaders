<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="test website for inquiry project">
  <meta name="keywords" content="HTML5, tags">
  <meta name="author" content="Daniel Frankish">
  <meta name ="Viewport" content="width=device-width, initial scale=1.0">
  <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
  <title>Enhancements</title>
</head>

<body class="background">

    <header>
        <?php include 'menu.inc' ?>
	</header>
    	
	<article class="mainAlt">
        <h1>Enhancements to the Website</h1>
        <br>
        <p>
            Over the course of the project our group has made several enhancements to the website which demonstrate our unique skills.
            Thesse enhancements include:
        </p>
        <ul>
            <li><h3>Responsive Design</h3>
                <p>The navigation bar presesnted on each of our webpages has been upgraded with the addition of responsive design. This allows this feature of each webpage to adapt to 
                    users with different screen sizes, such as tablet or mobile phone users. At first, all elements of the navbar are presented in a single line, as is typical of most webpages
                    After the screen is resized to the shape of a tablet, the navbar will double up in order to make the text more readable. It then proceeds to presenting three items on
                    each row when the screen is resized to that of a phone.
                </p>
            </li>
            <li><h3>Hyperlink Animation</h3>
                <p>Every hyperlink on each page has been upgraded with animations for when they are hovered over. This effect primarily consists of the links being darkened in an area 
                    around them after being moused over. This is present in the navigation bar, footer, and in every other hyperlink in the text body of each page. This feature was achieved
                    through the intergration of several unqiue css properties which enable transitions.
                </p>
            </li>
        </ul>
    </article>
    
    <footer>
        <?php include 'footer.inc' ?>
    </footer>
        
</body>
</html>

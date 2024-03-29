<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="test website for inquiry project">
  <meta name="keywords" content="HTML5, tags">
  <meta name="author" content="Ahnaf">
  <meta name ="Viewport" content="width=device-width, initial scale=1.0">
  <link href="styles/styles.css" rel="stylesheet" media="screen and (max-width: 1920px)">
  <title>About</title>
  <?php include 'header.inc';?>
</head>

<body class="background">

    <header>
        <?php include 'menu.inc' ?>
	</header>

	<article class="main">
    <div class="top-sections">
      <section>
          <h2>Group Information</h2>
          <dl>
              <dt>Group Name:</dt>
              <dd>CSS Crusaders</dd>
              <dt>Group ID:</dt>
              <dd>Enter your group ID here</dd>
              <dt>Tutor's Name:</dt>
              <dd>Ru Jia</dd>
              <dt>Course:</dt>
              <dd>COS10026 Computing Technology Inquiry Project</dd>
          </dl>
      </section>

      <section>
          <h2>Group Photo</h2>
          <figure>
              <img src="images/group-photo.jpg" alt="Image of the founding CSS Crusaders">
              <figcaption>Our Group Photo</figcaption>
          </figure>
      </section>

      <section>
          <h2>Timetable</h2>
          <table>
              <thead>
                  <tr>
                      <th>Day</th>
                      <th>Time</th>
                      <th>Course Code</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>Monday</td>
                      <td>9:00 AM - 11:00 AM</td>
                      <td>COS10026</td>
                  </tr>
                  <tr>
                      <td>Tuesday</td>
                      <td>11:00 AM - 1:00 PM</td>
                      <td>COS10026</td>
                  </tr>
                  <tr>
                      <td>Wednesday</td>
                      <td>2:00 PM - 4:00 PM</td>
                      <td>COS10026</td>
                  </tr>
                  <tr>
                      <td>Thursday</td>
                      <td>10:00 AM - 12:00 PM</td>
                      <td>COS10026</td>
                  </tr>
                  <tr>
                      <td>Friday</td>
                      <td>1:00 PM - 3:00 PM</td>
                      <td>COS10026</td>
                  </tr>
              </tbody>
          </table>
      </section>

      <section>
          <h2>Contact Us</h2>
          <p>You can reach our group by emailing at <a href="mailto:csscrusaders@gmail.com">csscrusaders@gmail.com</a>.</p>
      </section>

      <section>
          <h2>Group Profile</h2>
          <p>Here is some extra information about our group:</p>
          <ul>
              <li>Our group consists of 5 members from different parts of the world including Dominic, Jack, Charlie, Ahnaf and Daniel.</li>
              <li>We all have a passion for programming and have some experience in web development.</li>
              <li>Some of our interests include coding, books and outdoor adventure.</li>
          </ul>
      </section>
    </div>
  </article>
    <footer>
        <?php include 'footer.inc' ?>
    </footer>

  </body>
</html>

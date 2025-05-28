<!doctype html>

<!-- HOMEPAGE FOR THE WEBSITE-->
<?php
  include 'header.inc';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="The Homepage of the Website" />
    <meta name="keywords" content="Assignment 1" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />

    <title>Home Page</title>
  </head>
  <body>
    <main>
      <section id="swinova-introduction" class="homepage-sections">
        <h2>Welcome to Swinova Tech – Where Innovation Meets Talent</h2>
        <p>
          At Swinova Tech, we are passionate about pushing the boundaries of
          technology. As a leading IT solutions provider, we specialise in
          software development, data analytics, cybersecurity, and cloud
          computing. Our team thrives on creativity, collaboration, and
          cutting-edge solutions that shape the digital future.
        </p>
      </section>

      <section class="homepage-sections">
        <h3>Join Our Team</h3>
        <p>
          Are you ready to make an impact? Join our innovative team at Swinova
          Tech! We are always on the lookout for talented individuals to
          contribute to exciting projects.
        </p>
        <p>
          Explore the <a class="homepage-link" href="jobs.php">Careers</a> page
          to view our current job openings and find a role that suits your
          skills and passion. If you're ready to take the next step, visit the
          <a class="homepage-link" href="apply.php">Apply</a> page to submit
          your application.
        </p>
      </section>
    </main>
  </body>
</html>

<?php
include 'footer.inc';
?>
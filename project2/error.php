<!-- This will be a generic error page that the user is sent to
every time there is something wrong with the connection, form data,
etc. It should be structured like our other pages (header, footer, etc included)
and contain a simple "something went wrong. please try again later" message. -->

<?php
// error.php – A generic error page
?>

<!doctype html>

<?php
  include 'header.inc';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="errorpage" />
    <meta name="keywords" content="Assignment 2" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />

<body>
  <main class="main">
    <div class="error-container">
        <h1>Oops! Something went wrong.</h1>
        <p>Please try again later.</p>
    </div>
  </main>

    <?php include_once('footer.inc'); ?>
</body>
</html>

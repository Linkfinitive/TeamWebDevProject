<?php
// enhancements.php
include "header.inc";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="TeamWebDev" />
  <meta name="description" content="Enhancements made for Assignment 2" />
  <meta name="keywords" content="Assignment 2, Enhancements, Optional Features" />
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/layout.css" />
  <title>Enhancements</title>
</head>
<body>
  <main>
    <h2>Enhancements Implemented</h2>
    <ol>
      <li>
        <strong>Other Skills Validation:</strong>  
        Server-side validation ensures that when the "Other Skills" checkbox is selected, the corresponding text field must not be empty.  
        This prevents incomplete or inconsistent data from being submitted.  
        (Note: Logic checks for checkbox value, typically "8", rather than a text string.)
      </li>

      <li>
        <strong>Dynamic Job Reference Dropdown:</strong>  
        On the <code>apply.php</code> page, the job reference dropdown is populated dynamically from the database rather than using hard-coded values.  
        This allows job listings to be updated in one place (the database), ensuring consistency and reducing maintenance.
      </li>
    </ol>

    <h3>Key Enhancement Features</h3>
    <ul>
      <li>Server-side validation for the "Other Skills" field</li>
      <li>Database-driven dynamic form elements</li>
      <li>Proper form validation and user-friendly error handling</li>
      <li>Secure database operations using prepared statements to prevent SQL injection</li>
    </ul>
  </main>
</body>
</html>

<?php
include "footer.inc";
?>

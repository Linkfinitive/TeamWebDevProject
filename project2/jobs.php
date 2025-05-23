<!doctype html>

<!-- THIS PAGE CONTAINS THE DETAILS FOR OUR OPEN JOB POSITIONS AND LINKS TO APPLY (CG) -->
<?php
  include 'header.inc';
  include 'settings.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="Explore current job openings at Swinova Tech" />
    <meta name="keywords" content="Jobs, Careers" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />

    <title>Jobs</title>
  </head>
  <body>
    <main id="jobs-page-main">
      <aside>
        <p>
        <strong>Fun Facts:</strong><br /><br />
        • The term "Data Scientist" was coined in 2008 and has become one of the most in-demand roles in tech.<br /><br />
        • Data analytics is used in conservation to track koala populations through satellite imaging and machine learning models.<br /><br />
        • Excel is still used in over 80% of businesses for data handling—even in high-tech industries.<br /><br />
        • In Australia, demand for data-related roles has outpaced supply by over 3:1.<br /><br />
        • A hacker attack happens every 39 seconds—over 2,200 attacks per day globally.<br /><br />
        • The term "hacker" originally referred to people who loved exploring and improving systems—not breaking them.<br /><br />
        • Over 95% of cybersecurity breaches are caused by human error.<br /><br />
        • The Australian Cyber Security Centre receives one cybercrime report every 6 minutes.
        </p>
        <!-- Prompt message: Can you give me some fun facts realted to data analyst and cybersecurity specialist in Australia-->
      </aside>
      <div id="title-and-sections">
        <h2>Open Positions</h2>
        <hr />
        <?php
          // Check if database connection exists
          if (!isset($conn) || !$conn) {
            echo "<p>Error: Database connection not established. Please check your settings.php file.</p>";
            echo "<p>Make sure your MySQL/Apache server is running.</p>";
          } else {
            $query = "SELECT * FROM jobs ORDER BY job_id";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
              echo "<p>Error executing query: " . mysqli_error($conn) . "</p>";
              echo "<p>Make sure the 'jobs' table exists in your database.</p>";
            } else if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<section>";
                echo "<h3>" . htmlspecialchars($row['job_title']) . "</h3>";
                echo "<h4>Position Reference Number: " . htmlspecialchars($row['job_ref']) . "</h4>";
                echo "<p>Salary: <strong>" . htmlspecialchars($row['salary']) . "</strong></p>";
                echo "<p>" . nl2br(htmlspecialchars($row['description'])) . "</p>";
                echo "<h3>Key Responsibilities</h3><ul>";
                foreach (json_decode($row['key_responsibility'], true) as $item) {
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
                echo "</ul>";
        
                echo "<h3>Essential Qualifications</h3><ul>";
                foreach (json_decode($row['essential_qualifications'], true) as $item) {
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
                echo "</ul>";
        
                echo "<h3>Preferred Qualifications</h3><ul>";
                foreach (json_decode($row['preferred_qualifications'], true) as $item) {
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
                echo "</ul><hr>";
              }
            } else {
              echo "<p>No job listings available at this time.</p>";
              echo "<p>Make sure you have data in your 'jobs' table.</p>";
            }
            mysqli_close($conn);
          }
        ?>
      </div>
    </main>

    </main>
    <!-- Footer with apply link -->
    <footer id="jobs-page-footer">
      <a href="apply.php">Apply for the Jobs listed above.</a>
    </footer>
  </body>
</html>

<?php
include 'footer.inc';
?>
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
            echo "<p>Database connected successfully!</p>"; // Debug line - remove this later
            
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
                
                // Since your current table only has basic info, we'll add static content for now
                echo "<p><strong>Key responsibilities for the position include:</strong></p>";
                echo "<ol>";
                if ($row['job_ref'] == 'JVC27-6498') { // Data Analyst
                    echo "<li>Collect, clean, and analyse large datasets from various sources</li>";
                    echo "<li>Create comprehensive reports and visualizations for stakeholders</li>";
                    echo "<li>Develop and maintain automated reporting systems</li>";
                    echo "<li>Collaborate with teams to identify key performance indicators</li>";
                    echo "<li>Present findings and recommendations to management</li>";
                } else { // Cybersecurity Specialist  
                    echo "<li>Monitor network traffic and security logs for suspicious activity</li>";
                    echo "<li>Conduct vulnerability assessments and penetration testing</li>";
                    echo "<li>Implement and maintain security tools and technologies</li>";
                    echo "<li>Develop and update security policies and procedures</li>";
                    echo "<li>Respond to and investigate security incidents</li>";
                }
                echo "</ol>";
                
                // Display essential qualifications
                echo "<p><strong>Essential qualifications for this position include:</strong></p>";
                echo "<ul>";
                if ($row['job_ref'] == 'JVC27-6498') { // Data Analyst
                    echo "<li>Bachelor's degree in Statistics, Mathematics, Computer Science, or related field</li>";
                    echo "<li>Proficiency in SQL and database management</li>";
                    echo "<li>Experience with data visualization tools (Tableau, Power BI, or similar)</li>";
                    echo "<li>Strong analytical and problem-solving skills</li>";
                    echo "<li>Knowledge of statistical analysis and modeling techniques</li>";
                } else { // Cybersecurity Specialist
                    echo "<li>Bachelor's degree in Cybersecurity, Information Technology, or related field</li>";
                    echo "<li>Knowledge of network security protocols and technologies</li>";
                    echo "<li>Experience with security tools (firewalls, SIEM, antivirus, etc.)</li>";
                    echo "<li>Understanding of risk assessment and management</li>";
                    echo "<li>Strong analytical and problem-solving abilities</li>";
                }
                echo "</ul>";
                
                // Display preferred qualifications
                echo "<p><strong>Our ideal candidate would also possess the following qualifications:</strong></p>";
                echo "<ul>";
                if ($row['job_ref'] == 'JVC27-6498') { // Data Analyst
                    echo "<li>Master's degree in a quantitative field</li>";
                    echo "<li>Experience with Python or R for data analysis</li>";
                    echo "<li>Knowledge of machine learning algorithms</li>";
                    echo "<li>Experience with cloud platforms (AWS, Azure, Google Cloud)</li>";
                } else { // Cybersecurity Specialist
                    echo "<li>Professional security certifications (CISSP, CEH, CISM, etc.)</li>";
                    echo "<li>Experience with penetration testing tools and techniques</li>";
                    echo "<li>Knowledge of compliance frameworks (ISO 27001, NIST, etc.)</li>";
                    echo "<li>Experience with cloud security (AWS, Azure security services)</li>";
                }
                echo "</ul>";
                
                $reports_to = ($row['job_ref'] == 'JVC27-6498') ? 'Head of Data and Analytics' : 'Chief Information Security Officer';
                echo "<p><strong>This position reports directly to:</strong> " . htmlspecialchars($reports_to) . "</p>";
                echo "</section><hr />";
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
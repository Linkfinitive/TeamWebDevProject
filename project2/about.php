<!--This is the about page, -->
<!doctype html>
<?php include "header.inc"; ?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="About the team" />
    <meta name="keywords" content="Team web dev" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />

    <title>About Us</title>
  </head>
  <body>
    <main class="main">
      <h2>About Us</h2>
      <!-- Photo of the team -->
      <div id="team-photo">
        <h2>Our Team</h2>
        <figure>
          <img src="./images/team.png" alt="A photo of the team" />
          <figcaption>
            Jacob &lpar;left&rpar;, Vidhi &lpar;center&rpar;, and Cliff
            &lpar;right&rpar;.
          </figcaption>
        </figure>

        <!-- Student IDs go here, right below the image -->
        <ul id="student-ids">
          <li>Vidhi Anand - 104094557</li>
          <li>Cliff Giddings - 105933295</li>
          <li>Jacob Raffa - 105919981</li>
        </ul>
      </div>
      <!-- Team name -->
      <h3>Team Web Dev</h3>
      <h3>Class - Friday 10:30 to 12:30</h3>
      <!-- Tutor section -->
      <h3>Tutor - Enrique Nicolás Ketterer (Nick)</h3>
      <!--List of members and their responsibilities-->
      <h2>Project Contributions</h2>
      <ol>
        <li>
          Vidhi
          <ul>
            <li>
              Part 1
              <ul>
                <li>Sprint 0: Set up communication channel, Jira project and Sprint planning </li>
                <li>Sprint 1: The base of Home page</li>
                <li>Sprint 2: Code validation and Contact for the website</li>
                <li>Throughout the project: Manages the Jira Project, asks questions on Canvas, reviews code and Merge Pull Requests </li>
              </ul>
            </li>
            <li>
              Part 2
              <ul>
                <li>Task 6 – Added search job form enhancements such as dropdowns and field validation.</li>
                <li>Task 7 – Modified the search process script to filter and display results based on new criteria.</li>
                <li>Task 8 – Sorted job listings by closing date, displaying future jobs first.</li>              </ul>
            </li>
          </ul>
        </li>
        <li>
          Cliff
          <ul>
            <li>
              Part 1
              <ul>
                <li>Sprint 0: Set up GitHub for the group and team agreement</li>
                <li>Sprint 1: The base of Jobs page</li>
                <li>Sprint 2: CSS code and Work on accessibility principles</li>
                <li>Throughout the project: Makes sure all project requirements are fulfilled and GitHub is managed properly </li>
              </ul>
            </li>
            <li>
              Part 2
              <ul>
                <li>Task 3 – Created the job application form with HTML5 validation and a POST method to EOI submission.</li>
                <li>Task 4 – Wrote PHP code to process submitted EOIs and insert them into the database securely.</li>
                <li>Task 5 – Validated server-side logic for field inputs, ensured required values were captured, and implemented error handling.</li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          Jacob 
          <ul>
            <li>
              Part 1
              <ul>
                <li>Sprint 0: Created the roles and responsibilties document. </li>
                <li>Sprint 1: The base of Application form</li>
                <li>Sprint 2: Working on accessibility of the website</li>
                <li> Throughout the project: Manages the Jira Project, asks questions on Canvas, reviews code and Merge Pull Requests </li>
              </ul>
            </li>
            <li>
              Part 2
              <ul>
                <li>Task 1 – Modularised the website using PHP by extracting common elements (header, footer, and navigation) into separate .inc files and including them using PHP include statements. </li>
                <li>Task 2 – Created a settings.php file to store database connection credentials and included it in all PHP scripts that connect to the MySQL database.</li>
                <li>Presentation – Assisted in designing and delivering the final group presentation, outlining the team’s contributions and project outcomes.</li>
              </ul>
            </li>
          </ul>
        </li>
      </ol>
      

      <!--Members and their interests-->
      <section class="interests-table">
        <h2>Our Interests</h2>
        <table>
          <tr>
            <th scope="row" id="nameV">Vidhi</th>
            <td>Dancing</td>
            <td>Designing</td>
            <td>Reading</td>
          </tr>
          <tr>
            <th scope="row" id="nameC">Cliff</th>
            <td>Music</td>
            <td>Cooking</td>
            <td>Reading</td>
          </tr>
          <tr>
            <th scope="row" id="nameJ">Jacob</th>
            <td>Video Games</td>
            <td>Music</td>
            <td>Working Out</td>
          </tr>
        </table>
      </section>
    </main>
  </body>
</html>

<?php include "footer.inc";
?>

<!--This is the about page, -->
<!doctype html>
<?php
  include 'header.inc';
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="WRITE DESCRIPTION HERE" />
    <meta name="keywords" content="WRITE KEYWORDS HERE" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />

    <title>About Us</title>
  </head>
  <body>
    <main id="about-page-main">
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
      <h2>Group Responsibilities</h2>
      <dl>
        <dt>Vidhi</dt>
        <dd>
          Tasks
          <ul>
            <li>
              Sprint 0: Set up communication channel, Jira project and Sprint
              planning
            </li>
            <li>Sprint 1: The base of Home page</li>
            <li>Sprint 2: Code validation and Contact for the website</li>
            <li>
              Throughout the project: Manages the Jira Project, asks questions
              on Canvas, reviews code and Merge Pull Requests
            </li>
          </ul>
        </dd>

        <dt>Cliff</dt>
        <dd>
          Tasks
          <ul>
            <li>Sprint 0: Set up GitHub for the group and team agreement</li>
            <li>Sprint 1: The base of Jobs page</li>
            <li>Sprint 2: CSS code and Work on accessibility principles</li>
            <li>
              Throughout the project: Makes sure all project requirements are
              fulfilled and GitHub is managed properly
            </li>
          </ul>
        </dd>

        <dt>Jacob</dt>
        <dd>
          Tasks
          <ul>
            <li>
              Sprint 0: Set up communication channel, Jira project and Sprint
              planning
            </li>
            <li>Sprint 1: The base of Home page</li>
            <li>Sprint 2: Code validation and Contat for the website</li>
            <li>
              Throughout the project: Manages the Jira Project, asks questions
              on Canvas, reviews code and Merge Pull Requests
            </li>
          </ul>
        </dd>
      </dl>

      <!--Members and their interests-->
      <section id="interests-table">
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

<?php
include 'footer.inc';
?>
<!--This is the apply page, -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="WRITE DESCRIPTION HERE" />
    <meta name="keywords" content="WRITE KEYWORDS HERE" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />
    <title>Swinburne Data Solutions</title>
  </head>
  <body>
    <!--This is the teams image and links to the other pages-->
    <header>
      <img id="logo" src="./images/logo.png" alt="The Team Web Dev Logo" />
      <h1>Swinova Tech</h1>
      <nav>
        <a href="index.html">Home</a>
        <a href="jobs.html">Careers</a>
        <a href="apply.html">Apply</a>
        <a href="about.html">About</a>
        <a href="mailto:info@swinovatech.com.au">Email Us</a>
      </nav>
    </header>
    <!--This is the form thats filled and displayed in another page -->
    <main id="apply-page-main">
      <h2>Application Form</h2>
      <form
        action="process_eoi.php"
        method="post"
      >
        <!--Dropdown box-->
        <fieldset>
          <legend>Job Reference Number</legend>
          <label for="refnum">Job Reference Number:</label>
          <select id="refnum" name="RefNum" required>
            <option value="">Please Select</option>
            <option value="6498">JVC27-6498</option>
            <option value="4755">JVC27-4755</option>
          </select>
        </fieldset>
        <!--Textbox for first, last name and date of birth -->
        <fieldset>
          <legend>Personal Information</legend>
          <label for="name">First Name:</label>
          <input
            type="text"
            id="name"
            name="Name"
            maxlength="20"
            pattern="^[A-Za-z\d]*$"
            required
          />

          <label for="lname">Last Name:</label>
          <input
            type="text"
            id="lname"
            name="Lname"
            maxlength="20"
            pattern="^[A-Za-z\d]*$"
            required
          />
          <br />

          <label for="dob">Date of Birth:</label>
          <input type="date" id="dob" name="DOB" required />
        </fieldset>
        <!--Radio buttons for gender -->
        <fieldset>
          <legend>Gender</legend>
          <input type="radio" id="male" name="Gender" value="Male" checked />
          <label for="male">Male</label>

          <input type="radio" id="female" name="Gender" value="Female" />
          <label for="female">Female</label>

          <input type="radio" id="other" name="Gender" value="Other" />
          <label for="other">Other</label>
        </fieldset>
        <!--Drop down box for state -->
        <fieldset>
          <legend>Address</legend>
          <label for="state">State:</label>
          <select id="state" name="State">
            <option value="">Please Select</option>
            <option value="vic">Victoria</option>
            <option value="nsw">New South Wales</option>
            <option value="qld">Queensland</option>
            <option value="nt">Northern Territory</option>
            <option value="wa">Western Australia</option>
            <option value="sa">South Australia</option>
            <option value="tas">Tasmania</option>
            <option value="act">Australia Capital Territory</option>
          </select>
          <!--Textbox for postcode, address and town-->
          <label for="pc">Postcode:</label>
          <input
            type="text"
            id="pc"
            name="PCode"
            placeholder="0000"
            maxlength="4"
            minlength="4"
            pattern="^(0[289][0-9]{2}|[1-9][0-9]{3})$"
            required
          />
          <!-- This regex pattern was devised with the help of this stack overflow article -->
          <!-- https://stackoverflow.com/questions/6319799/regex-for-validating-postcode-and-phone-number -->
          <!-- It allows numbers 0200-0299, 0800-0999 and 1000-9999 which is based on Auspost requirements-->

          <label for="adr">Address:</label>
          <input type="text" id="adr" name="Address" required maxlength="40" />

          <label for="town">Town or Suburb:</label>
          <input type="text" id="town" name="Town" required maxlength="40" />
        </fieldset>
        <!--Textbox for email address and phone number-->
        <fieldset>
          <legend>Details</legend>
          <label for="email">Email:</label>
          <input
            type="text"
            id="email"
            name="Email"
            placeholder="example@example.com"
            required
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
          />

          <label for="pnum">Phone Number:</label>
          <input
            type="text"
            id="pnum"
            name="PNum"
            placeholder="0000000000"
            required
            pattern="[0-9\s]{8,12}"
          />
        </fieldset>
        <!--Checkbox for qualifications-->
        <fieldset>
          <legend>Qualifications</legend>
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual2"
              value="1"
              checked
            />

            A Bachelor's degree in a relevant field</label
          ><br />
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual3"
              value="2"
            />
            Proficiency in basic job tools (e.g., SQL, Python, cybersecurity
            tools)</label
          ><br />
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual4"
              value="3"
            />
            Valid Professional certification (CISSP, CEH, etc.)</label
          ><br />
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual5"
              value="4"
            />
            Experience with cloud-based solutions (AWS, Azure, Google
            Cloud)</label
          ><br />
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual6"
              value="5"
            />
            Strong analytical and problem-solving skills</label
          ><br />
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual8"
              value="6"
            />
            Familiarity with data visualisation tools (only for Data
            Analyst)</label
          ><br />
          <label
            ><input
              type="checkbox"
              name="qualifications[]"
              id="qual9"
              value="7"
            />
            Experience with penetration testing (only for Cybersecurity
            Specialist)</label
          ><br />

          <br />
          <!--Textbox for other skills -->
          <label for="extra">Other Skills:</label><br />
          <textarea
            id="extra"
            name="Extra"
            rows="6"
            cols="30"
            placeholder="Write any additional skills you have..."
          ></textarea>
          <br />
        </fieldset>
        <!--Submit and reset buttons-->
        <input id="submit-button" type="submit" value="Submit" />
        &nbsp;
        <input id="reset-button" type="reset" value="Reset" />
      </form>
    </main>
    <footer>
      <a
        href="https://team-web-dev.atlassian.net/jira/software/projects/TWD/boards/2?atlOrigin=eyJpIjoiYmU1MWY3MDQ3MGNlNDljZTlkZTlkYzkzYTRhNjA2MzQiLCJwIjoiaiJ9"
      >
        Visit our Jira workspace to find out more about our project management.
      </a>
    </footer>
  </body>
</html>

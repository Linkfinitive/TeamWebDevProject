<!--This is the apply page, -->
<!DOCTYPE html>
<html lang="en">
  
<?php include "header.inc"; 
require_once("settings.php"); 

// Fetch all jobs from database for dropdown
$query = "SELECT job_id, job_ref FROM jobs";
$result = mysqli_query($conn, $query);

$jobs = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row['job_ref'];
    }
}
mysqli_close($conn);
?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="application form" />
    <meta name="keywords" content="jobs, applicants" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />
    <title>Swinburne Data Solutions</title>
  </head>
  <body>
    <!--This is the form thats filled and displayed in another page -->
    <main id="apply-page-main">
      <h2>Application Form</h2>
      <form
        action="process_eoi.php"
        method="post"
      >       
        <!-- Job Reference Selection -->
        <fieldset>
          <legend>Job Details</legend>
          <label for="refnum">Job Reference Number:</label>
          <select name="refnum" id="refnum" required>
            <option value="">-- Select Job Reference --</option>
            <?php foreach ($jobs as $jobRef): ?>
              <option value="<?= htmlspecialchars($jobRef) ?>">
                <?= htmlspecialchars($jobRef) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </fieldset>

        <!-- Personal Information Fields -->
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

        <!-- Gender Selection -->
        <fieldset>
          <legend>Gender</legend>
          <input type="radio" id="male" name="Gender" value="Male" checked />
          <label for="male">Male</label>

          <input type="radio" id="female" name="Gender" value="Female" />
          <label for="female">Female</label>

          <input type="radio" id="other" name="Gender" value="Other" />
          <label for="other">Other</label>
        </fieldset>

        <!-- Address Information -->
        <fieldset>
          <legend>Address</legend>
          <label for="state">State:</label>
          <select id="state" name="State">
            <option value="">Please Select</option>
            <?php 
            // Define Australian states
            $states = [
                'VIC' => 'Victoria',
                'NSW' => 'New South Wales', 
                'QLD' => 'Queensland',
                'NT' => 'Northern Territory',
                'WA' => 'Western Australia',
                'SA' => 'South Australia',
                'TAS' => 'Tasmania',
                'ACT' => 'Australia Capital Territory'
            ];
            // Generate state options
            foreach ($states as $code => $name):
            ?>
            <option value="<?= $code ?>">
              <?= $name ?>
            </option>
            <?php endforeach; ?>
          </select>

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

          <label for="adr">Address:</label>
          <input type="text" id="adr" name="Address" required maxlength="40" />

          <label for="town">Town or Suburb:</label>
          <input type="text" id="town" name="Town" required maxlength="40" />
        </fieldset>

        <!-- Contact Details -->
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

        <!-- Static Qualifications Section -->
        <fieldset>
          <legend>Qualifications</legend>
          <label>
            <input type="checkbox" name="qualifications[]" id="qual1" value="1" checked />
            A Bachelor's degree in a relevant field
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual2" value="2" />
            Proficiency in basic job tools (e.g., SQL, Python, cybersecurity tools)
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual3" value="3" />
            Valid Professional certification (CISSP, CEH, etc.)
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual4" value="4" />
            Experience with cloud-based solutions (AWS, Azure, Google Cloud)
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual5" value="5" />
            Strong analytical and problem-solving skills
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual6" value="6" />
            Familiarity with data visualisation tools (only for Data Analyst)
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual7" value="7" />
            Experience with penetration testing (only for Cybersecurity Specialist)
          </label><br />
          <label>
            <input type="checkbox" name="qualifications[]" id="qual8" value="8" />
            Other skills (please specify below)
          </label><br />

          <!-- Additional Skills Text Area -->
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

        <!-- Form Submission Buttons -->
        <input id="submit-button" type="submit" name="submit_application" value="Submit" />
        &nbsp;
        <input id="reset-button" type="reset" value="Reset" />
      </form>
    </main>
  </body>
</html>

<?php include "footer.inc"; ?>
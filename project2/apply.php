<!--This is the apply page, -->
<!doctype html>
<?php include "header.inc"; 
require_once("settings.php");

// Fetch job reference numbers
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Database connection failure.");
}

$query = "SELECT job_id, job_ref, essential_qualifications FROM jobs";
$result = mysqli_query($conn, $query);

$jobs = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $decoded = json_decode($row['essential_qualifications'], true);
      $jobs[$row['job_ref']] = is_array($decoded) ? $decoded : [];
      
    }
}
mysqli_close($conn);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="Apply for a role" />
    <meta name="keywords" content="application, jobs" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />
    <title>Swinburne Data Solutions</title>
    <script>
    const jobQualifications = <?php echo json_encode($jobs); ?>;

    function updateQualifications() {
      const refNum = document.getElementById("refnum").value;
      const wrapper = document.getElementById("qualifications-wrapper");
      wrapper.innerHTML = "";

      if (refNum && jobQualifications[refNum]) {
        const quals = jobQualifications[refNum];
        if (quals.length > 0) {
          quals.forEach((qual, index) => {
            const checkboxId = "qual" + index;
            wrapper.innerHTML += `
              <label><input type="checkbox" name="qualifications[]" id="${checkboxId}" value="${qual.trim()}"> ${qual.trim()}</label><br />
            `;
          });
        } else {
          wrapper.innerHTML = "<p>No qualifications listed for this job.</p>";
        }
      } else {
        wrapper.innerHTML = "<p>Please select a Job Reference Number.</p>";
      }
    }
  </script>
  </head>

  <body>
    <!--This is the form thats filled and displayed in another page -->
    <main id="apply-page-main">
      <h2>Application Form</h2>
      <form
        action="process_eoi.php"
        method="post"
      >
        <!--Dropdown box-->
        <fieldset>
        <legend>Job Details</legend>
        <label for="refnum">Job Reference Number:</label>
        <select name="refnum" id="refnum" required onchange="updateQualifications()">
          <option value="">-- Select Job Reference --</option>
          <?php foreach ($jobs as $jobRef => $quals): ?>
            <option value="<?= htmlspecialchars($jobRef) ?>"><?= htmlspecialchars($jobRef) ?></option>
          <?php endforeach; ?>
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
        <legend>Qualifications</legend>
        <div id="qualifications-wrapper">
          <p>Please select a Job Reference Number to view qualifications.</p>
        </div>
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
  </body>
</html>

<?php include "footer.inc";
?>

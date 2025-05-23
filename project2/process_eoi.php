<?php
//Check if we got here through the form.
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: error.php");
    exit();
}

//Getting the data
$reference = sanitise_input($_POST["RefNum"]);
$first_name = sanitise_input($_POST["Name"]);
$surname = sanitise_input($_POST["Lname"]);
$street_address = sanitise_input($_POST["Address"]);
$suburb = sanitise_input($_POST["Town"]);
$state = sanitise_input($_POST["State"]);
$postcode = sanitise_input($_POST["PCode"]);
$email = sanitise_input($_POST["Email"]);
$phone = sanitise_input($_POST["PNum"]);
$extended_skills = sanitise_input($_POST["Extra"]);

// Getting the data from arrays
$skills = isset($_POST["qualifications"])
    ? implode(", ", array_map("sanitise_input", $_POST["qualifications"]))
    : "";

//Validation
if (!form_data_is_valid()) {
    header("Location: error.php");
    exit();
}

//Opening the connection
require_once "../settings.php";

//Creating the table if it doesn't already exist
$query = "CREATE TABLE IF NOT EXISTS `eoi` (
    `id` int(11) NOT NULL,
    `reference` int(11) NOT NULL,
    `first_name` varchar(50) NOT NULL,
    `surname` varchar(50) NOT NULL,
    `street_address` varchar(50) NOT NULL,
    `suburb` varchar(50) NOT NULL,
    `state` varchar(50) NOT NULL,
    `postcode` int(11) NOT NULL,
    `email` varchar(50) NOT NULL,
    `phone` int(11) NOT NULL,
    `skills` varchar(50) NOT NULL,
    `extended_skills` text DEFAULT NULL,
    `status` varchar(50) NOT NULL DEFAULT 'New'
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

if (!($result = mysqli_query($conn, $query))) {
    header("Location: error.php");
    exit();
}

//Inserting the new value into the DB
$stmt = $conn->prepare(
    "INSERT INTO eoi (reference, first_name, surname, street_address, suburb, state, postcode, email, phone, skills, extended_skills)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
);

if (!$stmt) {
    header("Location: error.php");
    exit();
}

$bind_success = $stmt->bind_param(
    "isssssisiss",
    $reference,
    $first_name,
    $surname,
    $street_address,
    $suburb,
    $state,
    $postcode,
    $email,
    $phone,
    $skills,
    $extended_skills
);

if (!$bind_success) {
    header("Location: error.php");
    exit();
}

$success = $stmt->execute();
$stmt->close();
mysqli_close($conn);

//Processing
if (!$success) {
    header("Location: error.php");
    exit();
}
header("Location: success.php");
exit();

//Functions
function sanitise_input($data)
{
    $data = trim($data);
    //These are not required since we are using a prepared sql query
    // $data = stripslashes($data);
    // $data = htmlspecialchars($data);
    return $data;
}

function form_data_is_valid()
{
    return false; //Coming soon.
}
?>

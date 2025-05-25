<?php

//Check if we got here through the form.
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: error.php");
    exit();
}

//Getting the data
$reference = sanitise_input($_POST["refnum"]);
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
if (
    !form_data_is_valid(
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
    )
) {
    header("Location: error.php");
    exit();
}

//Opening the connection
require_once "settings.php";

//Creating the table if it doesn't already exist
$query = "CREATE TABLE IF NOT EXISTS `eoi` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `reference` int(11) NOT NULL,
    `first_name` varchar(50) NOT NULL,
    `surname` varchar(50) NOT NULL,
    `street_address` varchar(50) NOT NULL,
    `suburb` varchar(50) NOT NULL,
    `state` varchar(50) NOT NULL,
    `postcode` int(11) NOT NULL,
    `email` varchar(50) NOT NULL,
    `phone` varchar(50) NOT NULL,
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
    "isssssissss",
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

function form_data_is_valid(
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
) {
    if (empty($reference)) {
        return false;
    }
    if (
        empty($first_name) ||
        strlen($first_name) > 20 ||
        preg_match("/^[A-Za-z\d]*$/", $first_name) == 0
    ) {
        return false;
    }
    if (
        empty($surname) ||
        strlen($surname) > 20 ||
        preg_match("/^[A-Za-z\d]*$/", $surname) == 0
    ) {
        return false;
    }
    if (empty($street_address) || strlen($street_address) > 40) {
        return false;
    }
    if (empty($suburb) || strlen($suburb) > 40) {
        return false;
    }
    if (
        empty($state) ||
        ($state != "VIC" &&
            $state != "NSW" &&
            $state != "TAS" &&
            $state != "QLD" &&
            $state != "ACT" &&
            $state != "WA" &&
            $state != "SA" &&
            $state != "NT")
    ) {
        return false;
    }
    if (empty($postcode) || !postcode_matches_state($state, $postcode)) {
        return false;
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    if (
        empty($phone) ||
        strlen($phone) > 12 ||
        strlen($phone) < 8 ||
        preg_match("/^[0-9\s]{8,12}$/", $phone) == 0
    ) {
        return false;
    }
    if (empty($skills)) {
        return false;
    }

    $skills_array = explode(", ", $skills);
    $count = count($skills_array);
    if (
        $skills_array[$count - 1] == "Other (please specify)" &&
        empty($extended_skills)
    ) {
        return false;
    }

    return true;
}

function postcode_matches_state($state, $postcode)
{
    // Postcode ranges come from:
    // https://en.wikipedia.org/wiki/Postcodes_in_Australia
    switch ($state) {
        // Directly use $state as it's already lowercase
        case "VIC":
            if (
                ($postcode >= 3000 && $postcode <= 3996) ||
                ($postcode >= 8000 && $postcode <= 8999)
            ) {
                return true;
            }
            break;
        case "NSW":
            if (
                ($postcode >= 1000 && $postcode <= 2599) ||
                ($postcode >= 2619 && $postcode <= 2899) ||
                ($postcode >= 2921 && $postcode <= 2999)
            ) {
                return true;
            }
            break;
        case "TAS":
            if ($postcode >= 7000 && $postcode <= 7999) {
                return true;
            }
            break;
        case "ACT":
            if (
                ($postcode >= 200 && $postcode <= 299) ||
                ($postcode >= 2600 && $postcode <= 2618) ||
                ($postcode >= 2900 && $postcode <= 2920)
            ) {
                return true;
            }
            break;
        case "WA":
            if ($postcode >= 6000 && $postcode <= 6999) {
                return true;
            }
            break;
        case "SA":
            if ($postcode >= 5000 && $postcode <= 5999) {
                return true;
            }
            break;
        case "NT":
            if ($postcode >= 800 && $postcode <= 999) {
                return true;
            }
            break;
        case "QLD":
            if (
                ($postcode >= 4000 && $postcode <= 4999) ||
                ($postcode >= 9000 && $postcode <= 9999)
            ) {
                return true;
            }
            break;
    }
    return false;
}
?>

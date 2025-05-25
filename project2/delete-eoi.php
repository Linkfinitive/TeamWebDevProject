<?php

//Check if we got here through the form.
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: error.php");
    exit();
}

//Getting the data
$reference = sanitise_input($_POST["reference"]);

//Opening the connection
require_once "settings.php";

//DB Query
$stmt = $conn->prepare("DELETE FROM eoi WHERE reference = ?");

if (!$stmt) {
    header("Location: error.php");
    exit();
}

$bind_success = $stmt->bind_param("i", $reference);

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
header("Location: manager.php");
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
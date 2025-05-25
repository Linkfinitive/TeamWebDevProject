<?php

//Check if we got here through the form.
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: error.php");
    exit();
}

//Getting the data
$id = sanitise_input($_POST["id"]);
$status = sanitise_input($_POST["status"]);

//Validation
if (empty($id) || empty($status)) {
    header("Location: error.php");
    exit();
}

//Opening the connection
require_once "settings.php";

//Updating the DB
$stmt = $conn->prepare("UPDATE eoi SET status = ? WHERE id = ?");

if (!$stmt) {
    header("Location: error.php");
    exit();
}

$bind_success = $stmt->bind_param("si", $status, $id);

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

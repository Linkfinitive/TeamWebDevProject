<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reference = sanitise_input($_POST["RefNum"]);
    $first_name = sanitise_input($_POST["Name"]);
    $surname = sanitise_input($_POST["Lname"]);
    $street_address = sanitise_input($_POST["Address"]);
    $suburb = sanitise_input($_POST["Town"]);
    $state = sanitise_input($_POST["State"]);
    $postcode = sanitise_input($_POST["PCode"]);
    $email = sanitise_input($_POST["Email"]);
    $phone = sanitise_input($_POST["PNum"]);
    $skills = sanitise_input($_POST["qualifications"]);
    $extended_skills = sanitise_input($_POST["Extra"]);

    //Validation
    if (!vaildate_form_data()) {
        header("Location: error.php");
        exit();
    }

    //Inserting into the db
    require_once "settings.php";
    $stmt = $conn->prepare(
        "INSERT INTO eoi (reference, first_name, surname, street_address, suburb, state, postcode, email, phone, skills, extended_skills) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
    );
    $stmt->bind_param(
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
    $stmt->execute();
    $result = $stmt->get_result();
    mysqli_close($conn);

    //Processing
    if (!$result) {
        header("Location: error.php");
        exit();
    }
}

function sanitise_input($data)
{
    //Function created by Atie Kia.
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

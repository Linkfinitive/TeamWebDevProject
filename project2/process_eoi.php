<?php
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reference = $_POST["RefNum"];
    $first_name = $_POST["Name"];
    $surname = $_POST["Lname"];
    $street_address = $_POST["Address"];
    $suburb = $_POST["Town"];
    $state = $_POST["State"];
    $postcode = $_POST["PCode"];
    $email = $_POST["Email"];
    $phone = $_POST["PNum"];
    $skills = $_POST["qualifications"];
    $extended_skills = $_POST["Extra"];

    //Validation
    //(Coming soon!)

    //Inserting into the db
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
    if ($result) {
    }
}
?>

<!DOCTYPE html>

<?php if (!$_SERVER["HTTP_REFERER"]) {
    header("Location: error.php");
    exit();
} ?>

<?php include "header.inc"; ?>

<body>
    <p>Your item was submited successfully!</p>
    <p>Your EOI is: </p>
</body>

<?php
    require_once 'process_eoi.php';
    $result = mysqli_query($conn,"SELECT MAX(id) AS id FROM eoi");
    $eoid = mysqli_fetch_row($result);
    echo[$eoid];
?>

<?php include "footer.inc"; ?>



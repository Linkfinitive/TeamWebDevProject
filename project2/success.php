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

<?php include "footer.inc"; ?>



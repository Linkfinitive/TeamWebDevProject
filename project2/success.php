<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="TeamWebDev" />
        <meta name="description" content="successpage" />
        <meta name="keywords" content="Assignment 2" />
        <link rel="stylesheet" href="./styles/styles.css" />
        <link rel="stylesheet" href="./styles/layout.css" />
    </head>

    <?php if (!$_SERVER["HTTP_REFERER"]) {
        header("Location: error.php");
        exit();
    } ?>

    <body>
        <?php include "header.inc"; ?>
        <main class="main">
            <p>Your item was submited successfully!</p>
            <p>Your EOI ID Number is: </p>

            <?php
            require_once "settings.php";
            $result = mysqli_query($conn, "SELECT MAX(id) AS id FROM eoi");
            mysqli_close($conn);

            if (!$result) {
                header("Location: error.php");
                exit();
            }

            $row = mysqli_fetch_assoc($result);
            echo $row["id"];
            ?>

        </main>
        <?php include "footer.inc"; ?>
    </body>
<html>


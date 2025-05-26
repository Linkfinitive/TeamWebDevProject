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
            <p>Your EOI is: </p>
        


            <?php
            //I removed this because it broke the website - this page can't call process_eoi because it will have already been executed. Did you mean require_once "settings.php"; ? -Cliff

            // require_once 'process_eoi.php';
            // $result = mysqli_query($conn,"SELECT MAX(id) AS id FROM eoi");
            // $eoid = mysqli_fetch_row($result);
            // echo[$eoid];
            ?>
        </main>
        <?php include "footer.inc"; ?>
    </body>
<html>


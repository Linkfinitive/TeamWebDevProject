<!doctype html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="TeamWebDev" />
    <meta name="description" content="Page for Managers to Manage EOIs" />
    <meta name="keywords" content="Assignment 2" />
    <link rel="stylesheet" href="./styles/styles.css" />
    <link rel="stylesheet" href="./styles/layout.css" />

    <title>EOI Manager</title>
  </head>
  <body>
  <?php include "header.inc"; ?>
    <main class="main">
        <h2>Manager</h2>
        <h4>Search EOIs</h4>
        <form method="GET" action="manager.php">
            <label for="search">Applicant Name or Job Reference </label>
            <input id="search" type="text" name="search" placeholder="Name or Reference">
            <input type="submit" value="Go">
        </form>
        <br />
        <h4>Delete EOIs by Job Reference</h4>
        <form method="POST" action="delete-eoi.php">
            <label for="reference">Job Reference </label>
            <input id="reference" type="text" placeholder="Job Reference" name="reference" required>
            <input type="submit" value="Delete">
        </form>
        <br />
        <h4>Update EOI Status</h4>
        <form method="POST" action="update-eoi-status.php">
            <label for="id">EOI ID</label>
            <input id="id" type="text" placeholder="EOI ID" name="id" required>
            <label for="status"><br /><br />Updated Status</label>
            <select id="status" name="status">
            <option value="">Select</option>
                <option value="new">New</option>
                <option value="current">Current</option>
                <option value="final">Final</option></select>
            <input type="submit" value="Update">
        </form>
        <br />
        <br />
        <?php
        require_once "settings.php";

        //Setting and executing the query
        if (isset($_GET["search"])) {
            $stmt = $conn->prepare(
                "SELECT * FROM eoi WHERE reference LIKE ? OR first_name LIKE ? OR surname LIKE ?"
            );

            if (!$stmt) {
                $stmt->close();
                mysqli_close($conn);
                header("Location: error.php");
                exit();
            }

            $param = "%" . trim($_GET["search"]) . "%";

            $bind_success = $stmt->bind_param("sss", $param, $param, $param);

            if (!$bind_success) {
                $stmt->close();
                mysqli_close($conn);
                header("Location: error.php");
                exit();
            }

            $success = $stmt->execute();
            if (!$success) {
                $stmt->close();
                mysqli_close($conn);
                header("Location: error.php");
                exit();
            }
            $result = $stmt->get_result();
            $stmt->close();
        } else {
            $query = "SELECT * FROM eoi";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                mysqli_close($conn);
                header("Location: error.php");
                exit();
            }
        }
        mysqli_close($conn);

        //Displaying the table
        if (mysqli_num_rows($result) > 0) {
            echo "<div class=\"interests-table\">";
            echo "<table>";
            echo "<tr>
            <th>EOI ID</th>
            <th>Job Reference</th>
            <th>Applicant Name</th>
            <th>Applicant Address</th>
            <th>Applicant Email</th>
            <th>Applicant Phone</th>
            <th>Applicant Skills</th>
            <th>Other Skills</th>
            <th>EOI Status</th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                $extended_skills =
                    $row["extended_skills"] == ""
                        ? "None specified"
                        : $row["extended_skills"];
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["reference"] . "</td>";
                echo "<td>" .
                    $row["first_name"] .
                    " " .
                    $row["surname"] .
                    "</td>";
                echo "<td>" .
                    $row["street_address"] .
                    ", " .
                    $row["suburb"] .
                    ", " .
                    $row["state"] .
                    " " .
                    $row["postcode"] .
                    "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["skills"] . "</td>";
                echo "<td>" . $extended_skills . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo " There are no EOI's to display.";
        }

        mysqli_close($conn);
        ?>
    </main>
    <?php include "footer.inc"; ?>
  </body>
</html>



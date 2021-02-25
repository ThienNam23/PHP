<?php

if (isset($_REQUEST['p']) && $_REQUEST['p'] == "libTN23") {
    $db_servername = ""; // ex: localhost
    $db_name = ""; // db name
    $db_username = ""; // db user name
    $db_password = ""; // db user password

    error_reporting(0);
    // Create connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        echo "<p class='error-mess'>*Connection failed: " . $conn->connect_error . "</p>";
    }
} else {
    header("Location: ../login.php");
}

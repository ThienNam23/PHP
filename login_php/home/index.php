<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/home.css">
    <title>Document</title>
</head>

<body>
    <?php
    $homepath = "../";
    if (!isset($_SESSION['username'])) {
        echo   "<div id=\"header-box\">
                        <div class=\"user-header-box\">
                        <a href=\"". $homepath ."login.php\">Login</a>/<a href=\"". $homepath ."login.php\">Register</a>
                    </div>
                    </div>
                        <div class=\"index-mess border-red\">
                            You're not logged in. 
                            <a href=\"". $homepath ."login.php\">Login now</a> to view more resources!
                    </div>";
    } else {
        $username = $_SESSION['username'];
        echo   "<div id=\"header-box\">
                    <div class=\"user-header-box\">".
                        $username .
                        "<!-- <button class=\"profile-btn\">></button> -->
                    </div>
                </div>
                <div class=\"index-mess border-green\">
                    Wellcome " . $username . ". 
                    <a href=\"./resources/\">Click here</a> to see what we have! 
                    <a href=\"". $homepath ."logout.php\">Click here</a> to logout.
                </div>";
    }
    ?>

</body>
<script src="test.js"></script>

</html>
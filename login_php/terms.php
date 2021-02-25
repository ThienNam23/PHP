<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$homepath = "./";
echo "This is Terms and Conditions page!<br>";
if (isset($_SESSION['username'])) {
    echo "Hello " . $_SESSION['username'];
}
else {
    echo "You're not logged in!";
}
?>
<?php
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (isset($_SESSION['username'])) {
    header("Location: ./home/");
}
$homepath = "./";
$_REQUEST['p'] = "libTN23";
require_once("./lib/loginController.php");
require_once("./lib/registerController.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Document</title>
</head>

<body>
    <div id="lr-box">
        <div id="toggle-btn-box">
            <div id="btn-box"></div>
            <button id="login-btn" class="toggle-btn" onclick="login()">Login</button>
            <button id="register-btn" class="toggle-btn" onclick="register()">Register</button>
        </div>
        <form action="login.php" id="login-form" method="post" class="lr-form" autocomplete="off">
            <input type="text" name="username" placeholder="User Name" required>
            <input type="password" name="userpass" placeholder="Password" required>
            <div class="cb-container">
                <input type="checkbox" name="rememberpass" id="cb-pass" class="cb">
                <label for="rememberpass">Remember Password?</label>
            </div>
            <?php
                if (isset($_REQUEST['logerr']) && $_REQUEST['logerr'] != "") {
                    echo "<p class='error-mess'>" . $_REQUEST['logerr'] . "</p>";
                    $_REQUEST['logerr'] = "";
                }
            ?>
            <button type="submit" class="lr-btn" name="login-btn">Login</button>
        </form>
        <form action="login.php?q=register" id="register-form" method="post" class="lr-form" autocomplete="off">
            <input type="text" name="username" placeholder="User Name" required>
            <input type="text" name="usermail" id="usermail" placeholder="Email" required>
            <input type="password" name="userpass" placeholder="Password" required>
            <div class="cb-container">
                <input type="checkbox" name="terms" id="cb-terms" class="cb" required>
                <label for="terms">I agree to the <a href="terms.php">Terms & Conditions</a></label>
            </div>
            <?php
                if (isset($_REQUEST['regerr']) && $_REQUEST['regerr'] != "") {
                    echo "<p class='error-mess'>" . $_REQUEST['regerr'] . "</p>";
                    $_REQUEST['regerr'] = "";
                }
            ?>
            <button type="submit" class="lr-btn" name="register-btn">Register</button>
        </form>
    </div>
</body>
<script src="./scripts/LoginToggleMode.js"></script>
</html>
<?php
    if (isset($_REQUEST['q']) && $_REQUEST['q'] == "register") {
        echo "<script type=\"text/javascript\">register();</script>";
    }
?>
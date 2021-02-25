<?php
if (isset($_REQUEST['p']) && $_REQUEST['p'] == "libTN23") {
    function usernameValid($string)
    {
        if (preg_match("/[^a-zA-Z0-9_]/", $string))
            return true;
        return false;
    }
    if (isset($_POST['register-btn'])) {
        $username = $_POST['username'];
        $usermail = $_POST['usermail'];
        $password = $_POST['userpass'];
        if (usernameValid($username)) {
            $_REQUEST['regerr'] = "*Username contains only alphanumeric characters and underscores";
        } elseif (!filter_var($usermail, FILTER_VALIDATE_EMAIL)) {
            $_REQUEST['regerr'] = "*Invalid email";
        } else {
            require_once("connection.php");
            $username = strip_tags($username);
            $username = addslashes($username);
            $usermail = strip_tags($usermail);
            $usermail = addslashes($usermail);
            $password = strip_tags($password);
            $password = addslashes($password);

            // Verify email

            // Check if username or email existed
            $sql = "SELECT * FROM userlogin WHERE username='$username' OR usermail='$usermail' ";
            $result = $conn->query($sql);
            $rows = $result->num_rows;
            if (!$result || $rows == 0) {
                // Start registering
                $sql = "INSERT INTO userlogin (username, userpass, usermail) VALUES ('$username','$password', '$usermail') ";
                $result = $conn->query($sql);
                header('Location: login.php');
            } else {
                $_REQUEST['regerr'] = "*Username or email is already taken";
            }
        }
    }
} else {
    header("Location: ../login.php");
}

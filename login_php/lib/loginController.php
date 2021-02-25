<?php
if (isset($_REQUEST['p']) && $_REQUEST['p'] == "libTN23") {
    if (isset($_POST['login-btn'])) {
        $username = $_POST['username'];
        $password = $_POST['userpass'];
        if ($username == "" || $password == "") {
            $_REQUEST['logerr'] = "*Username or password cannot be empty";
        } else {
            require_once("connection.php");
            if (!$conn->connect_error) {
                $username = strip_tags($username);
                $username = addslashes($username);
                $password = strip_tags($password);
                $password = addslashes($password);

                $sql = "SELECT * FROM userlogin WHERE username='$username' AND userpass='$password' ";
                $result = $conn->query($sql);
                $rows = $result->num_rows;

                if (!$result || $rows == 0) {
                    $_REQUEST['logerr'] = "*Username or Password is incorrect!";
                } else {
                    $_SESSION['username'] = $username;
                    header("Location: ./home/");
                }
            }
        }
    }
} else {
    header("Location: ../login.php");
}

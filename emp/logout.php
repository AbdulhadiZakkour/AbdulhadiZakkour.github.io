<?php
/*session_start();

    if (isset($_SESSION['admin_id'])) {

        unset($_SESSION["email"]);
        unset($_SESSION["password"]);
        session_destroy();
        header("Location:login.php");
}*/


session_start();
unset($_SESSION['email']);
unset($_SESSION['password']);
session_destroy();

header("Location: login.php");
exit;


<?php
function isAuthenticate() {
    if (isset($_SESSION['login']) && $_SESSION['login'] !== true) {
        $_SESSION['error'] = "You must be logged In";
        header('Location: ../user/login.php ');
        exit;
    }
}


?>
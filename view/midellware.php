<?php
session_start();

function isAuthenticate() {
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        return true;
    }
    return false;
}


?>
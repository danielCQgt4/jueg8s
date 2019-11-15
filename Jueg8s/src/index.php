<?php
include './Models/sessionUser.php';
include './external.html';
include './Controller/connection.php';
$session = new Session();
$connection = new Conection();

if (!empty($_SESSION['user']) && !empty($_SESSION['pass'])) {
    if ($session->getUser() == 5) {
        header('Location: ./Views/admin.php');
    } else {
        header('Location: ./Views/');
    }
}

include './login.php';

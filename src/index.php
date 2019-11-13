<?php
include './Models/sessionUser.php';
include './external.html';
include './Controller/connection.php';
$session = new Session();
$connection = new Conection();

if (!empty($_SESSION['user']) && !empty($_SESSION['pass'])) {
    if ($session->getUser() == 5) {
        header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/admin.php');
    } else {
        header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
    }
}

include './login.php';

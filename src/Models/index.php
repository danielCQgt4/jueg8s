<?php

include './sessionUser.php';

$session = new Session();
$session->closeSession();
if (empty($_SESSION['user']) || empty($_SESSION['pass'])) {
    header('Location: http://' . $session->getHost() . '/');
}

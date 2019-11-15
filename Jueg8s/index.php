<?php
include './src/Models/sessionUser.php';
header('Location: http://' . $session->getHost() . '/');

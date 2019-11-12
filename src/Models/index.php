<?php

include './Jueg8s/sessionUser.php';

$session = new Session();

header('Location: http://'.$session.getHost());
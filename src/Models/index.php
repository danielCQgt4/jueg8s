<?php

include './Jueg8s/src/Models/sessionUser.php';

$session = new Session();

header('Location: http://' . $session . getHost());

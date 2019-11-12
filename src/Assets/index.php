<?php

include './sessionUser.php';

$session = new Session();

header('Location: http://'.$session.getHost());
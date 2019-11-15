<?php
include './src/Models/sessionUser.php';
include './src/external.html';
include './src/Controller/connection.php';
include './src/Controller/general.php';
$session = new Session();
$connection = new Conection();
$data = $_POST;

if (isset($data['start'])) {
    $session->setUser($data['pass'], $data['idGroup']);
    if (accept($session->getUser(), $session->getPassword())) {
        if ($data['idGroup'] == 5) {
            header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/admin.php');
        } else {
            header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
        }
    } else {
        $session->setError('Sin acceso');
        header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
    }
} else if (isset($data['evaluate-list'])) {
    include './Jueg8s/src/Controller/lista.php';
} else if (isset($data['create-crucigrama'])) {
    $admin = true;
    include './Jueg8s/src/Controller/crucigrama.php';
} else if (isset($data['evaluate-crucigrama'])) {
    $admin = false;
    include './Jueg8s/src/Controller/crucigrama.php';
} else if (isset($data['btn-evaluate'])) {
    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/resultados.php');
} else {
    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
}

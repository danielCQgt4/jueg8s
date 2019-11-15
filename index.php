<?php
include './Jueg8s/src/Models/sessionUser.php';
include './Jueg8s/src/external.html';
include './Jueg8s/src/Controller/connection.php';
include './Jueg8s/src/Controller/general.php';
$session = new Session();
$connection = new Conection();
$data = $_POST;

if (isset($data['start'])) {
    $session->setUser($data['pass'], $data['idGroup']);
    if (accept($session->getUser(), $session->getPassword())) {
        if ($data['idGroup'] == 5) {
            header('Location: ./Jueg8s/src/Views/admin.php');
        } else {
            header('Location: ./Jueg8s/src/Views/');
        }
    } else {
        $session->setError('Sin acceso');
        header('Location: ./Jueg8s/src/Views/');
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
    header('Location: ./Jueg8s/src/Views/resultados.php');
} else {
    header('Location: ./Jueg8s/src/Views/');
}

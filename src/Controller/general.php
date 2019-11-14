<?php

function accept($usu, $pass)
{
    try {
        global $connection, $session;
        $sql = "select count(*) as valido from grupo where activo = false and idGrupo = $usu and contra = '$pass'";
        $stmt = $connection->getConexion()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            return $row['valido'] == 1;
        }
    } catch (\Throwable $th) {
        $session->setError('Error inesperado');
        return false;
    }
}

function onlyOne($user)
{
    global $connection, $session;
    try {
        $sql = "update grupo set activo = true where idGrupo = $user";
        $stmt = $connection->getConexion()->prepare($sql);
        if ($stmt->execute()) {
            $session->setActive('yes');
        }

        return 1;
    } catch (\Throwable $th) {
        return false;
    }
}

if (isset($_GET['api'])) {
    function getStatusCalificar()
    {
        try {
            include './connection.php';
            $connection = new Conection();
            $sql = "select jugar from jugar;";
            $stmt = $connection->getConexion()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($row = $stmt->fetch()) {
                echo '{ "jugar":"' . $row['jugar'] . '"}';
            }
        } catch (\Throwable $th) {
            $session->setError('Error inesperado');
            echo '{ error:"fail"}';
        }
    }

    getStatusCalificar();
}

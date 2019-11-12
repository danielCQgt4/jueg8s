<?php

function evaluate()
{
    try {
        global $data, $connection, $porcentaje;
        $porcentaje = 0;
        for ($i = 0; $i < $data['max']; $i++) {
            $sql = "select count(*) as valido from Lista where valor = '" . $data['text' . $i] . "' and valorPos = " . $data['field' . $i];
            $stmt = $connection->getConexion()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($row = $stmt->fetch()) {
                if ($row['valido'] == 0) {
                    $porcentaje++;
                }
            }
        }
        return $porcentaje;
    } catch (PDOException $ex) {
        return -1;
    }
}

function getPosition($activitie)
{
    try {
        global $connection, $session;
        $sql = "select max(posicion)+1 as pos from Grupo-Actividad where idActividad = $activitie and idGrupo = " . $session->getUser();
        $stmt = $connection->getConexion()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            return $row['pos'];
        }
    } catch (PDOException $ex) {
        return 'abc';
    }
}


try {
    $porcentaje = (evaluate() / $data['max']) * 100;
    $values = $session->getUser() . ",1," . getPosition(1) . ",CURTIME()," . $porcentaje;
    $sql = "insert into Grupo-Actividad values ($values)";
    $stmt = $this->connection->getConexion()->prepare($sql);
    if ($stmt->execute()) {
        $this->session->setError("");
    }
} catch (PDOException $ex) {
    $this->session->setError("No se pudo evaluar la lista");
}
include './Jueg8s/src/Views/index.php';

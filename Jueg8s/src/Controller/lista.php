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
                if ($row['valido'] == 1) {
                    $porcentaje += 1;
                }
            }
        }
        return $porcentaje;
    } catch (PDOException $ex) {
        echo $ex;
        return -1;
    }
}

function getPosition($activitie)
{
    try {
        global $connection;
        $sql = "select max(posicion)+1 as pos from GrupoActividad where idActividad = $activitie";
        $stmt = $connection->getConexion()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ($row = $stmt->fetch()) {
            return $row['pos'];
        }
    } catch (PDOException $ex) {
        return 1;
    }
    return 1;
}

try {
    $porcentaje = (evaluate() / $data['max']) * 100;
    $temp = getPosition(1);
    $values = $session->getUser() . ",1," . getPosition(1) . ",CURTIME()," . $porcentaje;
    $sql = "insert into GrupoActividad values ($values)";
    $stmt = $connection->getConexion()->prepare($sql);
    if ($stmt->execute()) {
        $session->setError("");
    }
} catch (PDOException $ex) {
    $session->setError("No se pudo evaluar la lista - " . $sql . " /n" . $temp);
}

header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');

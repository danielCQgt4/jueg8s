<?php
if ($admin) {
    function createCrucigrama()
    {
        global $data, $connection, $session;
        try {
            $sql = "delete from Crucigrama where idCrucigrama >= 0;";
            for ($i = 0; $i < 15; $i++) {
                $values = $i . '';
                for ($j = 0; $j < 13; $j++) {
                    $letter = $data["$i,$j"];
                    if ($letter == '') {
                        $letter = '*';
                    }
                    $values .= ",'" . $letter . "'";
                }
                $values .= ',2';
                $sql .= "insert into Crucigrama values ($values);";
            }
            $stmt = $connection->getConexion()->prepare($sql);
            if ($stmt->execute()) {
                $session->setError("");
            }
        } catch (PDOException $exc) {
            $session->setError("Error al crear el crucigrama <br>$exc");
        }
    }

    createCrucigrama();
    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/admin.php');
} else {

    function getArregloFromData($data)
    {
        try {
            $tempArreglo = array();
            $stringTemp = '';
            for ($i = 0; $i < 15; $i++) {
                $stringTemp = '';
                for ($j = 1; $j <= 13; $j++) {
                    if ($data["$i,$j"] != '*') {
                        $stringTemp .= $data["$i,$j"];
                    }
                }
                if (strlen($stringTemp) > 3) {
                    $tempArreglo[] = $stringTemp;
                }
            }
            for ($i = 1; $i <= 13; $i++) {
                $stringTemp = '';
                for ($j = 0; $j < 15; $j++) {
                    if ($data["$j,$i"] != '*') {
                        $stringTemp .= $data["$j,$i"];
                    }
                }
                if (strlen($stringTemp) > 3) {
                    $tempArreglo[] = $stringTemp;
                }
            }
            return $tempArreglo;
        } catch (PDOException $th) {
            return null;
        }
    }


    function getDataFromDB()
    {
        global $connection;
        $tempArreglo = array();
        try {
            $sql = "select * from CrucigramaPalabra";
            $stmt = $connection->getConexion()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $tempArreglo[] = $row['palabra'];
            }
            return $tempArreglo;
        } catch (PDOException $ex) {
            return null;
        }
    }

    function compararData($dataArreglo, $dbArreglo)
    {
        $porcentaje = 0;
        $stringData = '';
        $stringDB = '';
        $minSize = 0;
        for ($i = count($dbArreglo) - 1; $i >= 0; $i--) {
            $stringData = '';
            $stringDB = '';
            $minSize = strlen($dbArreglo[$i]) > strlen($dataArreglo[$i]) ? strlen($dataArreglo[$i]) : strlen($dbArreglo[$i]);
            for ($j = $minSize - 1; $j >= 0; $j--) {
                $stringData .= $dataArreglo[$i]{
                    $j};
                $stringDB .= $dbArreglo[$i]{
                    $j};
            }
            if ($stringDB == $stringData) {
                $porcentaje++;
            }
        }
        return $porcentaje;
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

    function evaluarCrucigrama()
    {
        try {
            global $session, $data, $connection;
            $dbArreglo = getDataFromDB();
            $viewArreglo = getArregloFromData($data);
            $porcentaje = compararData($viewArreglo, $dbArreglo) / count($dbArreglo) * 100;
            $temp = getPosition(1);
            $values = $session->getUser() . ",2," . getPosition(2) . ",CURTIME()," . $porcentaje;
            $sql = "insert into GrupoActividad values ($values)";
            $stmt = $connection->getConexion()->prepare($sql);
            if ($stmt->execute()) {
                $session->setError("");
            }
        } catch (PDOException $ex) {
            $session->setError("No se pudo evaluar la lista - " . $sql . "<br>" . $temp);
        }
    }

    evaluarCrucigrama();
    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
}

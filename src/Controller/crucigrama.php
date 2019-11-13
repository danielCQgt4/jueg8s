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


    function getArregloFromDB()
    {
        global $connection;
        $datosArreglo = array();
        try {
            $sql = "select * from Crucigrama";
            $stmt = $connection->getConexion()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt->fetch()) {
                $tempArreglo = array();
                for ($i = 1; $i <= 13; $i++) {
                    $tempArreglo[] = $row[$i];
                }
                $datosArreglo[] = $tempArreglo;
            }
            return $datosArreglo;
        } catch (PDOException $ex) {
            return null;
        }
    }

    function evaluarCrucigrama()
    {
        global $session, $data;
        $datosArreglo = getArregloFromDB();
    }

    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
}

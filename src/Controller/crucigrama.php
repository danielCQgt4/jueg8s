<?php
if ($admin) {
    function createCrucigrama()
    {
        global $data, $connection, $session;
        try {
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
                $sql = "insert into Crucigrama values ($values)";
                $stmt = $connection->getConexion()->prepare($sql);
                if ($stmt->execute()) {
                    $session->setError("");
                }
            }
        } catch (PDOException $exc) {
            $session->setError("Error al crear el crucigrama <br>$sql");
        }
    }

    createCrucigrama();

    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/admin.php');
} else {
    header('Location: http://' . $session->getHost() . '/Jueg8s/src/Views/');
}

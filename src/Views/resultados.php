<?php
include '../Models/sessionUser.php';
include '../Controller/connection.php';
$connection = new Conection();
$session = new Session();

$primeraPosValue = 400;
$normalValue = 50;
$lessValue = -50;
$minGrade = 70;

function getPrimero($actividad)
{
    try {
        global $connection;
        $maxValue = 0;
        $grupo = -1;
        $sql = "select idGrupo,porcentajeObtenido,posicion from grupoActividad where idActividad = $actividad order by posicion;";
        $stmt = $connection->getConexion()->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            if ($row['idGrupo'] != 5) {
                if ($row['porcentajeObtenido'] > $maxValue) {
                    $maxValue = $row['porcentajeObtenido'];
                    $grupo = $row['idGrupo'];
                }
            }
        }
        return $grupo;
    } catch (PDOException $ex) {
        echo $ex;
        return -1;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/style.css">

    <script src="../Assets/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Jueg8s</title>
</head>

<body>
    <!-- Diseno -->
    <nav class="navbar navbar-light bg-dark">
        <span class="navbar-brand mb-0 h1 text-white">
            <h1>Jueg8s</h1>
        </span>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col box-color">
                <h1 class="text-white text-center">Lista</h1>
                <table class="table table-striped bg-light">
                    <thead class="thead-dark">
                        <th scope="col">NumGrupo</th>
                        <th scope="col">Calificacion</th>
                        <th scope="col">Pts</th>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $primeroLista = getPrimero(1);
                            $sql = "select idGrupo,porcentajeObtenido,posicion from grupoActividad where idActividad = 1 order by posicion;";
                            $stmt = $connection->getConexion()->prepare($sql);
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row = $stmt->fetch()) {
                                if ($row['idGrupo'] != 5) {
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['idGrupo'] ?></td>
                                        <td><?php echo $row['porcentajeObtenido'] ?></td>
                                        <td><?php

                                                        if ($row['idGrupo'] == $primeroLista && ($row['porcentajeObtenido'] > $minGrade)) {
                                                            echo $primeraPosValue;
                                                        } else if ($row['porcentajeObtenido'] > $minGrade) {
                                                            echo $normalValue;
                                                        } else {
                                                            echo $lessValue;
                                                        }
                                                        ?>HP</td>
                                    </tr>
                        <?php
                                }
                            }
                        } catch (PDOException $ex) {
                            echo $ex;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col box-color">
                <h1 class="text-white text-center">Crucigrama</h1>
                <table class="table table-striped bg-light">
                    <thead class="thead-dark">
                        <th scope="col">NumGrupo</th>
                        <th scope="col">Calificacion</th>
                        <th scope="col">Pts</th>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $primeroCru = getPrimero(2);
                            $sql = "select idGrupo,porcentajeObtenido,posicion from grupoActividad where idActividad = 2 order by posicion;";
                            $stmt = $connection->getConexion()->prepare($sql);
                            $stmt->execute();
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row = $stmt->fetch()) {
                                if ($row['idGrupo'] != 5) {
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $row['idGrupo'] ?></td>
                                        <td><?php echo $row['porcentajeObtenido'] ?></td>
                                        <td><?php

                                                        if ($row['idGrupo'] == $primeroCru && ($row['porcentajeObtenido'] > $minGrade)) {
                                                            echo $primeraPosValue;
                                                        } else if ($row['porcentajeObtenido'] > $minGrade) {
                                                            echo $normalValue;
                                                        } else {
                                                            echo $lessValue;
                                                        }
                                                        ?>HP</td>
                                    </tr>
                        <?php
                                }
                            }
                        } catch (PDOException $ex) {
                            echo $ex;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
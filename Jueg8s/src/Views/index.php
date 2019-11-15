<?php
include '../Models/sessionUser.php';
include '../external.html';
include '../Controller/connection.php';
include '../Controller/general.php';
$session = new Session();
$connection = new Conection();

if (empty($_SESSION['user']) || empty($_SESSION['pass'])) {
    include '../login.php';
} else if (accept($session->getUser(), $session->getPassword())) {

    function getLevel()
    {
        try {
            global $connection, $session;
            if ($session->getUser() == 5) {
                return $session->getUser();
            }
            $sql = "select count(*) as level from GrupoActividad where idGrupo = " . $session->getUser();
            $stmt = $connection->getConexion()->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($row = $stmt->fetch()) {
                return $row['level'];
            }
        } catch (PDoPDOException $ex) {
            return 0;
        }
    }

    $level = getLevel();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Jueg8s</title>
    </head>

    <body>
        <!-- Diseno -->
        <nav class="navbar navbar-light bg-dark">
            <span class="navbar-brand mb-0 h1 text-white">
                <h1>Jueg8s</h1>
            </span>
        </nav>

        <?php
            if ($level == 0) {
                include './lista.php';
            } else if ($level == 1) {
                include './crucigrama.php';
            } else if ($level == 5) {
                include './admin.php';
            } else {
                include './gracias.html';
            } ?>

    </body>

    </html>
<?php
} else {
    include '../login.php';
}
?>
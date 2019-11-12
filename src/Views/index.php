<?php
function getLevel()
{
    global $connection, $session;
    $sql = "select count(*) as level from Grupo-Actividad where idGrupo = " . $session->getUser();
    $stmt = $connection->getConexion()->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if ($row = $stmt->fetch()) {
        return $row['level'];
    }
}

$level = getLevel();
?>
<!-- Diseno -->
<nav class="navbar navbar-light bg-dark">
    <span class="navbar-brand mb-0 h1 text-white">
        <h1>Jueg8s</h1>
    </span>
</nav>
<?php
if ($level == 0) {
    include './Jueg8s/src/Views/lista.php';
} else if ($level == 1) {
    include './Jueg8s/src/Views/lista.php';
} else {
    include './Jueg8s/src/Views/lista.php';
}

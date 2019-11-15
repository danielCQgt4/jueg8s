<?php
include '../Models/sessionUser.php';
include '../external.html';
include '../Controller/connection.php';
$session = new Session();
$connection = new Conection();

if (empty($_SESSION['user']) || empty($_SESSION['pass'])) {
    header('Location: http://' . $session->getHost() . '/');
}
?>
<!-- Diseno -->
<nav class="navbar navbar-light bg-dark">
    <span class="navbar-brand mb-0 h1 text-white">
        <h1>Jueg8s</h1>
    </span>
</nav>
<form action="http://../../../" method="post" class="list-box">
    <!-- Success message -->
    <?php if (!empty($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $session->getSuccess(); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="text-center" aria-hidden="true">&times;</span>
            </button>
        </div><?php
                }
                $session->setSuccess("");
                ?>
    <!-- Error message -->
    <?php if (!empty($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong id="error-msg"><?php echo $session->getError(); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div><?php
                }
                $session->setError("");
                ?>
    <h1 class="h1 text-white text-center">Ingresa los datos del crucigrama</h1>
    <table border="0" class="list-box">
        <?php
        for ($i = 0; $i <= 15; $i++) {
            ?>
            <tr>
                <?php
                    for ($j = 0; $j < 13; $j++) {
                        ?>
                    <td><input class="list-field2" value="" type="text" name="<?php echo "$i,$j" ?>" id="" maxlength="1"></td>
                <?php
                    }
                    ?>
            </tr>
        <?php
        }
        ?>

    </table>
    <input type="submit" name="create-crucigrama" value="Guardar" class="btn btn-success w-100">
</form>
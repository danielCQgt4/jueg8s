<div class="container">
    <form class="list-box" method="POST" action="/index.php">
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
                <strong><?php echo $session->getError(); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><?php
                    }
                    $session->setError("");
                    ?>
        <h2 class="list-title mb-5">Completa la informacion</h2>
        <p class="text-white">Completa la informacion comenzado por 1 sin saltarte ningun numero</p>
        <div class="list-play">
            <table class="lidt-table" border="0">
                <?php
                $sql = "select * from Lista where idActividad = 1";
                $stmt = $connection->getConexion()->prepare($sql);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $temp = 0;
                while ($row = $stmt->fetch()) {
                    ?>
                    <tr class="list-row">
                        <td>
                            <input type="text" name="<?php echo 'field' . $temp; ?>" class="list-field" maxlength="1">
                        </td>
                        <td><?php echo $row['valor']; ?></td>
                        <input type="hidden" value="<?php echo $row['valor']; ?>" name="<?php echo 'text' . $temp; ?>">
                    </tr>
                <?php
                    $temp++;
                } ?>
            </table>
        </div>
        <input type="hidden" name="max" value="<?php echo $temp; ?>">
        <div class="form-group">
            <input type="submit" onclick="alert()" name="evaluate-list" value="Terminar" class="btn btn-success w-100 mt-5">
        </div>
    </form>
</div>
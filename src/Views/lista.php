<div class="container">
    <div class="list-box">
        <form id="list-form" method="POST" action="http://<?php echo $session->getHost(); ?>">
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
            <h2 class="list-title mb-5">Completa la informacion</h2>
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
                                <input type="text" id="<?php echo 'field' . $temp; ?>" name="<?php echo 'field' . $temp; ?>" class="list-field" maxlength="1">
                            </td>
                            <td><?php echo $row['valor']; ?></td>
                            <input type="hidden" value="<?php echo $row['valor']; ?>" name="<?php echo 'text' . $temp; ?>">
                        </tr>
                    <?php
                        $temp++;
                    } ?>
                </table>
            </div>
            <input type="hidden" id="max" name="max" value="<?php echo $temp; ?>">
            <input type="hidden" name="evaluate-list">
        </form>
        <div class="form-group mt-5">
            <input type="submit" id="sendLista" name="evaluate-list" value="Terminar" class="btn btn-success w-50 mx-auto d-block">
        </div>
    </div>
</div>
<script src="http://<?php echo $session->getHost(); ?>/Jueg8s/src/Assets/ejecution.js"></script>
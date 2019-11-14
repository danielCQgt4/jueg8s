<?php

function hide($content)
{
    switch (true) {
        case $content > 0:
            return 1;
        case $content == '*':
            return -1;
        default:
            return 0;
    }
}

?>

    <div class="container">
        <div class="list-box">
            <form id="cru-form" method="POST" action="http://<?php echo $session->getHost() . '/'; ?>">
                <!-- Success message -->
                <?php if (!empty($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $session->getSuccess(); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="text-center" aria-hidden="true">&times;</span>
                        </button>
                    </div><?php
                            }
                            $session->setSuccess(""); ?>
                <!-- Error message -->
                <?php if (!empty($_SESSION['error'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong id="error-msg"><?php echo $session->getError(); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><?php
                            }
                            $session->setError(""); ?>
                <h2 class="list-title mb-5">Completa la informacion</h2>
                <div class="list-play">
                    <table class="cru-table lidt-table" border="0">
                        <?php
                        $sql = "select * from Crucigrama where idActividad = 2";
                        $stmt = $connection->getConexion()->prepare($sql);
                        $stmt->execute();
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) { ?>
                            <tr>
                                <?php
                                    for ($i = 1; $i <= 13; $i++) {
                                        if (hide($row[$i]) == 1) { ?>
                                        <td><label class="cru-number text-white"><?php echo $row[$i]; ?></label><input class="d-none" value="*" type="text" name="<?php echo $row['idCrucigrama'] . ",$i"; ?>" id="" maxlength="1"></td>
                                    <?php
                                            } else if (hide($row[$i]) == -1) { ?>
                                        <td><input class="d-none" value="*" type="text" name="<?php echo $row['idCrucigrama'] . ",$i"; ?>" id="" maxlength="1"></td>
                                    <?php
                                            } else { ?>
                                        <td><input class="list-field2" type="text" name="<?php echo $row['idCrucigrama'] . ",$i"; ?>" id="" maxlength="1"></td>
                                <?php }
                                    } ?>
                            </tr>
                        <?php
                        } ?>
                    </table>
                </div>
                <input type="hidden" id="max" name="max" value="<?php echo $temp; ?>">
                <input type="hidden" name="evaluate-crucigrama">
            </form>
            <div class="form-group">
                <h3 class="text-white cru-list">1.</h3>Es un catálogo de elementos o tareas que se registran para un seguimiento.
                <div class="cru-text"></div>
            </div>
            <div class="form-group">
                <h3 class="text-white cru-list">2.</h3>A medida que un elemento de la lista está listo se puede _____________ de la lista.
                <div class="cru-text"></div>
            </div>
            <div class="form-group">
                <h3 class="text-white cru-list">3.</h3>La lista podría de estar ordenada al azar o en: _____________.
                <div class="cru-text"></div>
            </div>
            <div class="form-group">
                <h3 class="text-white cru-list">4.</h3>El poder usarse para cualquier cosa que sea fácil de crear, de usar y de mantener hace a cheaklist: _____________.
                <div class="cru-text"></div>
            </div>
            <div class="form-group">
                <h3 class="text-white cru-list">5.</h3>El poder agregar o eliminar elementos según sea necesario hace a checklist: ____________.
                <div class="cru-text"></div>
            </div>
            <div class="form-group mt-4">
                <input type="submit" id="sendCrucigrama" name="evaluate-crucigrama" value="Terminar" class="btn btn-success w-50 mx-auto d-block">
            </div>
        </div>
    </div>
    <script src="http://<?php echo $session->getHost(); ?>/Jueg8s/src/Assets/ejecution.js"></script>
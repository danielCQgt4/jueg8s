<!DOCTYPE html>
<html lang="es">

<head>
    <title>Jueg8s</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div id="log-1" class="login">
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
        <div class="container" id="conte-1">
            <div class="form-group">
                <form method="POST" action="/index.php" class="text-center p-5 m-4">
                    <div class="logo-login"></div>
                    <br>
                    <p class="h4 mb-4">Juega ahora</p>
                    <select name="idGroup" id="idGrupo" class="form-control mb-4">
                        <option value="1">Grupo 1</option>
                        <option value="2">Grupo 2</option>
                        <option value="3">Grupo 3</option>
                        <option value="4">Grupo 4</option>
                        <option value="5">Grupo 5</option>
                        <option value="6">Grupo 6</option>
                    </select>
                    <input minlength="3" maxlength="20" type="password" id="contraGrupo" class="form-control mb-4" placeholder="Contraseña" name="pass">

                    <button class="btn btn-primary btn-block my-4" name="start" type="submit">Jugar</button>

                </form>
            </div>
        </div>
    </div>
</body>


</html
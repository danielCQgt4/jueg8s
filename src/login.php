<!DOCTYPE html>
<html lang="es">

<head>
    <title>Jueg8s</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/Jueg8s/src/Assets/style.css">
</head>

<body>
    <?php

    ?>
    <div id="log-1" class="login">
        <div class="container" id="conte-1">
            <div class="form-group">
                <form method="POST" action="/" class="text-center p-5 m-4">
                    <div class="logo-login"></div>
                    <br>
                    <p class="h4 mb-4">Juega ahora</p>
                    <select name="idGrupo" id="idGrupo" class="form-control mb-4">
                        <option value="grp1">Grupo 1</option>
                        <option value="grp2">Grupo 2</option>
                        <option value="grp3">Grupo 3</option>
                        <option value="grp4">Grupo 4</option>
                        <option value="grp5">Grupo 5</option>
                        <option value="grp6">Grupo 6</option>
                    </select>
                    <input minlength="3" maxlength="20" type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Contraseña" name="contra">

                    <button class="btn btn-primary btn-block my-4" name="iniciar" type="submit">Jugar</button>

                </form>
            </div>
        </div>
    </div>
</body>


</html
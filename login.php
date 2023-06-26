<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "./estilos.css"/>
    <title>Login</title>
</head>
<body>
<form class= "group" action ="ingresar.php" method="POST">
    <input type="text" placeholder="usuario" name="txtusuario"/>
    <input type="password" placeholder="contraseña" name="txtpassword"/>
    <input class="btn btn-submit" type="submit" name="submit" value="Ingresar"/>
</form>

<p><a href= "index.php">Ir a la página principal</a></p>
    


</body>
</html>
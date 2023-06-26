<?php session_start(); ?>
    <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "./estilos.css"/>

    <title>Registro</title>
</head>

<body>
    <?php if(!(isset($_SESSION['nombre']))){

    ?>

    
    <div class="group">
        <form action="registro.php" method="POST">
            <hz><em>Formulario de registro</em></hz>

            <label form="nombre">Nombre<span><em>(requerido)</em></span></label>
            <input type="text" name="nombre" class="form-input" required />

            <label form="apellidos">Apellidos<span><em>(requerido)</em></span></label>
            <input type="text" name="apellidos" class="form-input" required />

            <label form="email">Correo electrónico<span><em>(requerido)</em></span></label>
            <input type="email" name="email" class="form-input" required />

            <label form="usuario">Usuario<span><em>(requerido)</em></span></label>
            <input type="text" name="user" class="form-input" required />

            <label form="password">Contraseña<span><em>(requerido)</em></span></label>
            <input type="password" name="password" class="form-input" required />


           <input class="btn btn-submit" name="submit" type="submit" value="Suscribirse" />
        </form>

    </div>
    <div class="group">
        <form action="ingresar.php" method="POST">
         
           
            <input type="text" placeholder="usuario" name="txtusuario"/>

            
            <input type="password" placeholder= "pass" name= "txtpassword"/>

            <input class="btn btn-submit" type="submit" name="submit" value="Ingresar"/>
        </form>

    </div>
    <?php } ?>
</body>

</html>
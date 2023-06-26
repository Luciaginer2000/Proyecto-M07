<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
<div class="group">
<form action="registro.php" method="POST">
<?php echo ("Hola ".$_SESSION['user']); ?>
<input class="form-btn" name="submit" type="button" value= "Atrás"/>
</form>

</div>


</body>
</html>
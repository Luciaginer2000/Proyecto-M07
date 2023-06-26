<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "usuarios";
$db_table_name = "usuario";
$db_connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$db_connection){
    die('No se ha podido conectar con el servidor');

}

$nombre = utf8_encode($_POST['nombre']);
$apellidos = utf8_decode($_POST['apellidos']);
$mail = utf8_decode($_POST['email']);
$usuario = utf8_decode($_POST['user']);
$pass = md5(utf8_decode($_POST['password']));


$resultado = $db_connection->query("SELECT * FROM ".$db_table_name." WHERE correo = '".$mail."'");
                            



if($resultado AND $resultado->num_rows>0){
    echo ("Este usuario ya existe");
   

}
else{
    

    $insert_value= 'INSERT INTO`'. $db_name .'`.`'.$db_table_name.'`(`apellidos`,`nombre`,`correo`,`password`,`user`) VALUES("'.$nombre.'","'.$apellidos.'","'.$mail.'","'.$pass.'","'.$usuario.'")';
    $retry_value= mysqli_query($db_connection, $insert_value);

   
        header('Location:index.php');
    }

    

?>
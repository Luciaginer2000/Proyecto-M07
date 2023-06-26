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
$user = $_POST["txtusuario"]; 
$pass = md5(utf8_decode($_POST["txtusuario"]));

$resultado = $db_connection->query("SELECT * FROM ".$db_table_name." WHERE user = '".$user."' AND password= '" .$pass."'");

if($resultado AND $resultado->num_rows>0)
{
   
   while($mostrar=mysqli_fetch_array($resultado)){
    session_start(); 
    $_SESSION['nombre'] = $mostrar['correo'];
   
   
   
    echo ("Ingreso correcto");
    header("Location: PanelControl.php");
}
}else{

echo("El usuario no existe");
header("Location: loginno.html");

}


?>
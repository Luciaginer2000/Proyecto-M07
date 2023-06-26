<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "./estilos.css"/>
    <title>Panel de control</title>
</head>
<body>
    
    <p>
        <?php
        if(isset($_POST['nombre'])){
            $_SESSION['nombre'] = $_POST['nombre'];
            echo "Bienvenido <b> ".$_SESSION['nombre']."</b>";
            






        }else{
            if(isset($_SESSION['nombre'])){
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "usuarios";
                $db_table_name = "usuario";
                $db_connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
               
                
                if(!$db_connection){
                    die('No se ha podido conectar con el servidor');

                }
                //logica para comprobar si ha registrado un servicio
                //comprobar si existe post
                if(isset($_POST['servicio'])){
                    $generarservicio= "INSERT INTO `servicios`( `nombre`, `horas`) VALUES ('".$_POST['servicio']."','".$_POST['horas']."')";
                    $db_connection->query($generarservicio);
                }
                //logica para aceptar servicio y restar horas
                //comprobar si existe GET
                if(isset($_GET['id'])){
                   //se carga info del servicio
                    $servicio = $db_connection->query("SELECT * FROM servicios WHERE id = ".$_GET['id']."");
                    $datosservicio=mysqli_fetch_array($servicio);
                    //se prepara sql para eliminar servicio
                    
                    if($datosservicio != null){
                    $sqlquitarservicio="DELETE FROM servicios WHERE id = ".$_GET['id'].""; 
                    //se prepara sql para sumar horas
                    $sqlsumarhoras="UPDATE usuario SET horas = horas + ".$datosservicio['horas']." WHERE correo = '".$_SESSION['nombre']."'" ; 
                    //se ejecuta sql
                    $db_connection->query($sqlquitarservicio);
                    $db_connection->query($sqlsumarhoras);}
                }
                echo "<article id='header'>";
                $resultado = $db_connection->query("SELECT * FROM ".$db_table_name." WHERE correo = '".$_SESSION['nombre']."'");
                $mostrar=mysqli_fetch_array($resultado);
                echo "Has iniciado sesión como:   ".$_SESSION['nombre'];
                echo "  Tienes " .$mostrar['horas']." horas";
                echo "</article>";
                


                echo "<article id='servicios'>";
                if(isset($_POST['buscar'])){
                    $resultado = $db_connection->query("SELECT * FROM servicios WHERE nombre LIKE '%".$_POST['buscar']."%' ");
                }else{
                    $resultado = $db_connection->query("SELECT * FROM servicios");   
                }
                
                echo "<table class='zigzag'><thead><tr><th class='header'>servicio</th>
                <th class='header'>horas</th>
                <th class='header'>     </th>
                </tr></thead><tbody>";

                while($mostrar=mysqli_fetch_array($resultado)){
               
                echo "<tr><td>".$mostrar['nombre']."</td>
                <td>".$mostrar['horas']."</td>
                <td>
                <form action=''method='GET'>
                <input type= 'hidden' name='id' value='".$mostrar['id']."'/>
                <input class='form-btn' name='submit' type='submit' value='Aceptar'/>
                </form></td>
                </tr>";//el input hidden esconde el id del servicio para pasarlo al formulario al darle aceptar
                
                }
                echo"</tbody></table>";
                echo "</article>";






           


        
        ?></p>
        <div class="group">
        <form action="" method="POST">
         
           
            <input type="text" placeholder="servicio" name="servicio"/>

            
            <input type="number" placeholder= "horas" name= "horas"/>

            <input type="submit" name="submit" value="Registrar servicio"/>
        </form>

    </div>
    <form class="group" action="" method="POST">
         
           
         <input type="text" placeholder="servicio buscar" name="buscar"/>


         <input type="submit" name="submit" value="Buscar servicio"/>
     
        </form>

        <?php  }else{
                echo "Acceso denegado";
            }}?>
        
    
        
      <p><a href= "CerrarSesion.php">Cerrar sesión </a></p>

      

    </body>
</html>
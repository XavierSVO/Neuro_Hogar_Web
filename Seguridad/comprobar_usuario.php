<?php

include("Obtener_url_fecha.php");
include("../clases/class_conexion.php");
$conexion=new Database();
$usuario=$_POST['usu'];
$contraseña=$_POST['contra'];
try{
    if($usuario == null or $contraseña == null){
            
        echo'<script type="text/javascript">
        alert("Ingrese usuario y contraseña");
        window.location.href="comprobar_usuario.php";
        </script>';
        
        header("Location: login.php");
    }
    else{
        
        $query = ("SELECT * FROM usuario WHERE usuario = '$usuario'");
        
        $resultado=mysqli_query($conexion->get_con(),$query);

        $fila=mysqli_fetch_array($resultado);
        
        if( mysqli_num_rows($resultado) != 0){
        
        }
        else
        {
            echo'<script type="text/javascript">
            alert("Usuario incorrecto");
            window.location.href="comprobar_usuario.php";
            </script>';
            header("Location: login.php"); 
        }
       }
       if ((crypt($contraseña, $fila["contra"]) === $fila["contra"])
       &&($fila["estado"])==="1") {
        $query = "SELECT * FROM usuario WHERE usuario='$usuario'";


        $resultado=mysqli_query($conexion->get_con(),$query);
        
        $fila=mysqli_fetch_array($resultado);
        
        $query=str_replace("'", "\'", $query);

        $sql = "INSERT INTO accion(id_usuario, accion, fecha, pagina) VALUES(".$fila["id"].","."'$query'".","."'$fechaActual'".","."'$Urlactual'".")";


        $resul=mysqli_query($conexion->get_con(),$sql);

        echo'<script type="text/javascript">
        setTimeout(location.href="frmmenu_administrador.php", 0);
        </script>';
        }
        else
        {
            echo'<script type="text/javascript">
            alert("Contraseña incorrecta");
            window.location.href="comprobar_usuario.php";
            </script>';
            header("Location: login.php"); 
        }
        //$result = mysqli_query($conexion,$consulta);
    }
    catch(Exception $e){

	echo "Línea del error: " . $e->getLine();
    
    }
	//validacion
?>
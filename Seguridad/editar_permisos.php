<?php

$server = "localhost";
$user = "root";
$pass = ""; 
$db= "internacionalizate_db";

$conexion = mysqli_connect($server, $user, $pass,$db);	

$npag=$_GET['npag'];

session_start();

$array_pag=$_SESSION['array_pag'];

$rol=$_SESSION['rol'];

for ($i=0; $i <$npag ; $i++) { 

//verificar si existe la relacion del rol con la pagina
$query_validar="SELECT id_rol,id_pagina from roles_paginas where id_rol=$rol and id_pagina=".$array_pag[$i];

$resultado_validar=$conexion->query("$query_validar");

if( mysqli_num_rows($resultado_validar) == 0)
{
    $query_insertar="INSERT INTO roles_paginas(id_rol,id_pagina,estado) VALUES ($rol,$array_pag[$i],0)";
    echo $query_insertar;
    $resulado_insertar=$conexion->query("$query_insertar");    
}
else
{
    try
    {
        if (isset($_POST[$array_pag[$i]])) {

            echo "seleccionado". $i;
            
            $query="UPDATE roles_paginas
            SET 
                estado = 1
            WHERE
                id_rol =".$rol." AND id_pagina =".($array_pag[$i]);
    
            echo $query;
    
            $resultado_update_roles_paginas=$conexion->query("$query");
        }
        
        else {
        
            $query="UPDATE roles_paginas
            SET 
                estado = 0
            WHERE
                id_rol =".$rol." AND id_pagina =".($array_pag[$i]);
    
            echo $query;
    
            $resultado_update_roles_paginas=$conexion->query("$query");
        }
    }
    catch(Exception $e){				
        echo "Línea del error: " . $e->getLine();
     }

}
}
header("Location: frm_seleccionar_rol.php");
?>
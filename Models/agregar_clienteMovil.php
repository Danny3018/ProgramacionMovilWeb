<?php
//conxión a la base de datos
include '../conexion/conexion.php';


/*Funciòn que inserta datos, recibe el nombre y la conexión*/    
function insertar_cliente($nombre,$apellido,$identificacion,$celular,$conn){
#preparé la instrucción de guardado
   $sql = "INSERT INTO cliente (nombre,apellido,identificacion, celular) VALUES (?,?,?,?)";
   $comando= $conn->prepare($sql);
   if ($comando->execute([$nombre,$apellido,$identificacion,$celular])){
   echo "datos insertados";
   }
}
//recibe la consulta get desde http
//valida que no sea vacía la 
if (!empty($_GET)){    
      if (isset($_GET["nombre"], $_GET["apellido"],$_GET["identificacion"],$_GET["celular"])) {

        $nombre=$_GET["nombre"];
        $apellido = $_GET["apellido"];
        $identificacion = $_GET["identificacion"]; 
        $celular = $_GET["celular"]; 

        //llama la función e inserta en la base de datos
        insertar_cliente($nombre,$apellido,$identificacion,$celular,$conn);
        
      }
}

   //AGREGAR LOS DATOS 
?>

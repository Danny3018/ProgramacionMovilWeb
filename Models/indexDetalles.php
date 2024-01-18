<?php
#include 'menu.html';
include '../conexion/conexion.php';

/* Este archivo se utilizará para generalizar todas las funciones del crud en un solo formulario

*/ 


/*
Elimina los warnings:

*/





// $Campo=$_POST['Campo'];
// $Id=$_POST["Id"];
// $Orden=$_POST['Orden'];
// $Trabajador=$_POST['Trabajador'];
// $Estado=$_POST['Estado'];
// $Direccion =$_POST['Direccion'];
// $Cargo=$_POST['Cargo'];
// $Tiempo=$_POST['Tiempo'];
// $Valor=$_POST['Valor'];
// $Auto=$_POST['Auto'];

//orden ot maestro
$campo = $_POST['campo'];
$vehiculo = $_POST['vehiculo'];



// //para borrar
// $Id=$_POST["Id"];

//otdetalle
$trabajador=$_POST['Trabajador'];
$numeroHoras=$_POST['Tiempo'];
$valorHora=$_POST['Valor'];
$Trabajo =$_POST['trabajo'];
$subTotal = $valorHora * $numeroHoras;

//id para almacenar en otdetalle
$IdTrabajo = ""; 
$IdTrabajador = ""; 

//id para almacenar en otmaestro
$IdVehiculo = ""; 




function sacaId($arg_1, $arg_2){

    
    for($caracteres=0;  $caracteres < strlen($arg_1); $caracteres++ ){

        


       if($arg_1[$caracteres] == "-"){

        break; 
    }
    

      $arg_2 = $arg_2.$arg_1[$caracteres];



      
    }

    return $arg_2;


}



$IdTrabajador = sacaId($trabajador,$IdTrabajador); 
$IdTrabajo = sacaId($Trabajo,$IdTrabajo); 
$IdVehiculo = sacaId($vehiculo,$IdVehiculo); 










if(isset($_POST['enviarDetalle'])){

    $sql = "INSERT INTO otdetalle (codigoTrabajador,numeroHoras,valorHora,subtotal,IdTrabajo) VALUES (?,?,?,?,?)";

    $segunda_sql = "INSERT INTO otmaestro (descripcion, idVehiculo) VALUES (?,?)";

    $comando= $conn->prepare($sql);

    $segundo_comando = $conn->prepare($segunda_sql);

    
    
    if ($comando->execute([$IdTrabajador,$numeroHoras,$valorHora,$subTotal,$IdTrabajo]) and 
        $segundo_comando->execute([$campo, $IdVehiculo])){

        

        echo "<script> alert('El dato ha sido insertado');
        window.location = '../Views/detallesDeOrden/detallesDeOrden.php'; 
        </script>";
    
    }
}



if(isset($_POST['borrarDetalle'])){

    

 
    $sql = "DELETE from detalleordendetrabajo where Id=?";
    echo $sql;
    $comando= $conn->prepare($sql);

    if ($comando->execute([$Id])){
    
        echo "<script> alert('El dato ha sido borrado');
        window.location = '../Views/detallesDeOrden/detallesDeOrden.php'; 
        </script>";
    
    }
    
}





if(isset($_POST['modificarDetalle'])){

 #preparé la instrucción de guardado
$sql = "UPDATE detalleordendetrabajo set Campo = ? ,IdOrden= ? ,IdAuto= ? ,IdTrabajador= ?
,IdEstado=? ,Dirección=?,IdCargo=?, Tiempo=?, Valor=? where Id=?";

echo $sql;
$comando= $conn->prepare($sql);
if ($comando->execute([$Campo,$IdOrden,$IdAuto,$IdTrabajador,$IdEstado,$Direccion,$IdCargo, 
$Tiempo, $Valor , $Id])){

    echo "<script> alert('El dato ha sido actualizado');
    window.location = '../Views/detallesDeOrden/detallesDeOrden.php'; 
    </script>";

}


    
}



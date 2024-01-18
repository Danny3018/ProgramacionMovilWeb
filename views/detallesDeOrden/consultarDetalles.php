<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/styles2.css">
</head>
<body>
<?php


include '../../conexion/conexion.php';
if ($conn)
    

$sql = $conn->prepare('SELECT Campo, Id , IdOrden, IdAuto ,  IdTrabajador , IdEstado
, Dirección , IdCargo, IdCargo , Tiempo, Valor  FROM  detalleordendetrabajo ');
$sql->execute();

if (!$sql){
    echo 'Error al ejecutar la consulta';
    }else{
    ?>




<div class="contTabla" >


    <table  class="content-table" >

<thead>
<tr>
    <td>Campo</td>
    <td>Id</td>
    <td>IdOrden</td>
    <td>IdAuto</td>
    <td>IdTrabajador</td>
    <td>IdEstado</td>
    <td>Dirección</td>
    <td>IdCargo</td>
    <td>Tiempo</td>
    <td>Valor</td>





</tr>

</thead>
    <?php
    foreach ($sql as $row) {

        print 
        "<tr>

        <td>".$row['Campo']."</td>".
        "<td>".$row['Id']."</td>".  
        "<td>".$row['IdOrden']."</td>".
        "<td>".$row['IdAuto']."</td>".   
        "<td>".$row['IdTrabajador']."</td>". 
        "<td>".$row['IdEstado']."</td>".  
        "<td>".$row['Dirección']."</td>".   
        "<td>".$row['IdCargo']."</td>".   
        "<td>".$row['Tiempo']."</td>".   
        "<td>".$row['Valor']."</td>".    
        
        "</tr>";
    
    }
    }
?>
</table>


    </div>

</body>
</html>
<?php
#include 'menu.html';
include '../conexion/conexion.php';

/* Este archivo se utilizará para generalizar todas las funciones del crud en un solo formulario

*/ 


/*
Elimina los warnings:

*/


//orden ot maestro
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$campoDeVerificacion = $_POST['confirma_contraseña'];




if(isset($_POST['registrar'])){


    if($contraseña == $campoDeVerificacion){

        
        $sql = "INSERT INTO usuarios (correo,contraseña) VALUES (?,?)";

        $comando= $conn->prepare($sql);
    
        if ($comando->execute([$correo, $contraseña])){
    
        
            echo "<script> alert('Se ha registrado correctamente');
            window.location = '../Views/detallesDeOrden/registroWeb.php'; 
            </script>";
        
        }

    }

    else{
        
        echo "<script> alert('Las contraseñas no coinciden');
        window.location = '../Views/detallesDeOrden/registroWeb.php'; 
        </script>";
    }


}



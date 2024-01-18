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




if(isset($_POST['login'])){

    $sql = "SELECT correo, contraseña FROM usuarios WHERE usuarios.correo = (?) and usuarios.contraseña = (?)";

    $comando= $conn->prepare($sql);

    $comando->execute([$correo, $contraseña]);

    //lista para almacenar datos de la tabla

    $lista_de_coincidencias = []; 

    foreach ($comando as $row) {

        array_push($lista_de_coincidencias, $row["correo"] , $row["contraseña"]);

    }


    //si encuentra datos que coinciden se almacenara en la lista y obtendra una longitud de 2 lo que
    //significa que encontro coincidencias en la base datos y por lo tanto es un usuario registrado

    if (count($lista_de_coincidencias) < 2){

        echo "<script> alert('Datos de inicio de sesión incorrectos');
        window.location = '../Views/detallesDeOrden/loginWeb.php'; 
       </script>";
    

    } else {
        
        echo "<script> 
        window.location = '../Views/detallesDeOrden/detallesDeOrden.php'; 
        </script>";
       
    }



}
<!DOCTYPE html>
<html>

<head>
    <title>Personas</title>
    <link rel="stylesheet" href="../Styles/styles2.css">
</head>

<body>
    <form action="../../Models/indexLoginWeb.php" method="POST">


        <label for="correo">Ingrese el correo electronico</label>
        <input type="text" placeholder="Correo" name="correo" id="Id" required autofocus title="Id">

        <label for="contraseña">Ingrese la contraseña</label>
        <input type="password" placeholder="Contraseña" name="contraseña" id="Id" required autofocus title="Id" style="   width: 90%; padding: 10px; border: 1px solid #cccccc;
        border-radius: 3px;margin-bottom: 20px;font-size: 14px;">



        <br>



        <div style="display:flex; justify-content: center;">

            <input  type="submit" name="login"
            class="btnlogin" value="Login" style="background-color:  #5f0f68; color: aliceblue; padding-top: 5px; 
             padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-decoration: none;
             margin-right: 10px; margin-top: 25px; border-radius: 10px; width : 25%; border-color: #5f0f68;
             font-weight: 900;"> 

                <a href="registroWeb.php" style="background-color:  #361a9e; color: aliceblue; padding-top: 8px; 
             padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-decoration: none;
             margin-right: 10px; margin-top: 25px; border-radius: 10px;">
             <b>Registro</b>




                </a>

        </div>
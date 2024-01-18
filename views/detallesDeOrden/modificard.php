<!DOCTYPE html>
<html>

<head>
    <title>Registrar Auto</title>
    <link rel="stylesheet" href="../Styles/styles5.css">
</head>

<body>

    <?php


    include '../../conexion/conexion.php';
    if ($conn)


        $sql = $conn->prepare('SELECT Id, Descripcion FROM ordendetrabajo');

    $sql->execute();

    if (!$sql) {
        echo 'Error al ejecutar la consulta';
    } else {

    ?>


        <form action="../../Models/indexDetalles.php" method="POST" style = "width: 600px;">

            <div class="primera">

           
             <input type="text" name="Id" placeholder="Id del detalle a modificar" id="">


                <label for="">Orden</label>

                <!--Se recorre toda la consulta y se pone en un menu desplegable-->
                <select name="Orden" style="width: 215px;margin-top: 5px;
        margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
        margin-right: 15px; " id="lang">


                    <?php
                    foreach ($sql as $row) {

                        print
                            '<option name = "Orden">' . $row['Id'] . " - " . $row['Descripcion'] . '</option>';
                    }

                    ?>


                </select>


                <label for="Placa">Vehiculo</label>

                <select name="Auto" style="width: 215px;margin-top: 5px;
        margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
        margin-right: 15px; " id="lang">


                    <?php

                    $sql = $conn->prepare('SELECT Id, Placa FROM autitos');

                    $sql->execute();
                    foreach ($sql as $row) {

                        print
                            '<option name = "Auto">' . $row['Id'] . " - " . $row['Placa'] . '</option>';
                    }

                    ?>


                </select>




            

            </div>



            <div class="Segunda" style="display:flex;">

                <label for="">Estado</label>

                <select name="Estado" style="width: 120px;margin-top: 5px;
        margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
        margin-right: 15px;" id="lang">





                    <?php

                    $sql = $conn->prepare('SELECT Id, Nombre FROM estados');

                    $sql->execute();

                    foreach ($sql as $row) {

                        print
                            '<option name = "Estado">' . $row['Id'] . " - " . $row['Nombre'] . '</option>';
                    }

                    ?>



                </select>

                <label for="">Trabajador</label>

                <select name="Trabajador" style="width: 100px;margin-top: 5px;
margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
margin-right: 15px;" id="lang">





                    <?php

                    $sql = $conn->prepare('SELECT Id, NombreT FROM trabajador');

                    $sql->execute();
                    foreach ($sql as $row) {

                        print
                            '<option name = "Trabajador">' . $row['Id'] . " - " . $row['NombreT'] . '</option>';
                    }



                    ?>



                </select>



                <label for="">Trabajos</label>

                <select name="Cargo" style="width: 100px;margin-top: 5px;
margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
margin-right: 15px;" id="lang">



                <?php

                $sql = $conn->prepare('SELECT Id, NombreC FROM cargos');

                $sql->execute();
                foreach ($sql as $row) {

                    print
                        '<option name = "Cargo">' . $row['Id'] . " - " . $row['NombreC'] . '</option>';
                }
            }


                ?>



                </select>




            </div>

            <div class="tercera" style="margin-left: 0%;">

                <label for="">Tiempo</label>

                <input style="width: 100px; margin-bottom: 25px; margin-right: 10px ;
                margin-left: 10px;" type="number" placeholder="(En dias)" name="Tiempo" id="Tiempo" required autofocus title="Tiempo">
                <br>


                <label for="">Valor</label>

                <input style="width: 120px;" type="text" placeholder="Valor" name="Valor" id="Valor" required autofocus title="Valor">
                <br>


                <label>Direccion</label>

                <input style="width: 120px;" type="text" placeholder="Direccion" name="Direccion" id="Direccion" required autofocus title="Valor">
                <br>




               
       

            </div>

            <div class="cuarta" >

                <textarea name="Campo" id="" cols="78" rows="5">

                </textarea>

            </div>


            <div class="botones" style="display: flex;  margin-top: 25px; justify-content:center;">

         

          
            
            <input type="submit" class="btn" name="modificarDetalle" id="actualizar" value="Modificar"
           style=" background-color: #007bff; color: aliceblue; padding-top: 1px; padding-bottom: 1px; 
           padding-left: 5px; padding-right: 1px; text-decoration: none; width:50%; margin-left: 25px;
           text-align: center; height: 50px;">

    

            </div>

            <br>
        </form>

        <div style="margin-top: 25px;  ">
            <?php



            $sql = $conn->prepare('SELECT Nombre, NombreT , NombreC , Valor, Tiempo 
            FROM detalleordendetrabajo, estados, cargos,trabajador WHERE detalleordendetrabajo.IdEstado = estados.Id 
             and detalleordendetrabajo.IdCargo = cargos.Id
             and detalleordendetrabajo.IdTrabajador = trabajador.Id;');

            $sql->execute();

            if (!$sql) {
                echo 'Error al ejecutar la consulta';
            } else {
            ?>




                <div class="contTabla">


                    <table class="content-table">

                        <thead>
                            <tr>
                                <td>Estado</td>
                                <td>Trabajador</td>
                                <td>Trabajo</td>
                                <td>Valor</td>
                                <td>Tiempo</td>






                            </tr>

                        </thead>
                    <?php
                    foreach ($sql as $row) {

                        print
                            "<tr>

                        <td>" . $row['Nombre'] . "</td>" .
                            "<td>" . $row['NombreT'] . "</td>" .
                            "<td>" . $row['NombreC'] . "</td>" .
                            "<td>" . $row['Valor'] . "</td>" .
                            "<td>" . $row['Tiempo'] . " Dias" . "</td>" .

                            "</tr>";
                    }
                }
                    ?>

                    </table>

                </div>




        </div>




        <div class="final" style="background-color: white; margin-top: 25px ; 
        padding-top: 25px; padding-bottom: 25px; display:flex; justify-content: center;">

            <a href="../principal/index.html" style="background-color:  #5f0f68; color: aliceblue; padding-top: 5px; 
             padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-decoration: none;
             ; border-radius: 10px;">
                <b>Volver Al inicio</b>
            </a>

            <label for="" style="margin-left: 100px;">Totales:</label>



            <?php

           
            $sql = $conn->prepare('SELECT Valor, Tiempo FROM detalleordendetrabajo');

            $sql->execute();

            $sumaValor = 0;
            $sumaTiempo = 0;

             /* Esta sumando el total de los valores que se han asignado y el tiempo (en dias) que
             se han asignado
            */ 

            foreach ($sql as $row) {

                $sumaValor +=  $row['Valor'];
                $sumaTiempo += $row['Tiempo'];
            }

            /* Se muestra el resultado en pantalla
            */ 

            print
                ' <p style="margin-left: 40px; margin-top: 0%">' . $sumaValor . '</p>' .
                ' <p style="margin-left: 25px; margin-top: 0%">' . $sumaTiempo . " Dias" . '</p>';

            ?>


        </div>













</body>

</html>
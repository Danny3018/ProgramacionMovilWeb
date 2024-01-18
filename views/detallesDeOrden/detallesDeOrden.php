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


        $sql = $conn->prepare('SELECT id, matricula FROM vehiculo');

    $sql->execute();

    if (!$sql) {
        echo 'Error al ejecutar la consulta';
    } else {

    ?>


        <form action="../../Models/indexDetalles.php" method="POST" style="width: 600px;">

            <div class="primera">





                <label for="Placa">Vehiculo</label>

                <select name="vehiculo" style="width: 215px;margin-top: 5px;
        margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
        margin-right: 15px; " id="lang">



                    <?php
                    foreach ($sql as $row) {

                        print
                            '<option name = "vehiculo">' . $row['id'] . " - " . $row['matricula'] . '</option>';
                    }


                    ?>


                </select>






            </div>



            <div class="Segunda">



                <label for="">Trabajador</label>


                <select name="Trabajador" style="width: 100px;margin-top: 5px;
margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
margin-right: 20%;" id="R">





                    <?php

                    $sql = $conn->prepare('SELECT codigo, nombreT FROM trabajadores');

                    $sql->execute();
                    foreach ($sql as $row) {

                        print
                            '<option name = "Trabajador">' . $row['codigo'] . " - " . $row['nombreT'] . '</option>';
                    }



                    ?>



                </select>





                <label for="">Trabajos</label>


                <select name="trabajo" style="width: 100px;margin-top: 5px;
                margin-bottom: 15px;height: 30px;border-radius: 10px; margin-left: 15px; 
                margin-right: 15px;" id="lang">



                <?php

                $sql = $conn->prepare('SELECT id, nombreC  FROM trabajo');

                $sql->execute();
                foreach ($sql as $row) {

                    print
                        '<option name = "trabajo">' . $row['id'] . " - " . $row['nombreC'] . '</option>';
                }
            }



                ?>



                </select>




            </div>

            <div class="tercera" style="margin-left: 0%;">

                <label for="">Tiempo</label>

                <input style="width: 100px; margin-bottom: 25px; margin-right: 2% ;
                margin-left: 10px;" type="number" placeholder="(En Horas)" name="Tiempo" id="Tiempo" required autofocus title="Tiempo"
                oninput="calcularMultiplicacion()">
                <br>


                <label for="">Valor</label>

                <input style="width: 120px; " type="text" placeholder="Valor Hora" name="Valor" id="Valor" required autofocus title="Valor"
                oninput="calcularMultiplicacion()">

                <br>
                <label for="">Sub Total</label>

            
                
                <p id="resultado" style = "margin-left: 10px; "><span id="resultadoValor">0</span></p>


            
                <script>
                    function calcularMultiplicacion() {
                        // Obtener los valores de los elementos
                        var tiempo = document.getElementById('Tiempo').value;
                        var valor = document.getElementById('Valor').value;

                        // Calcular la multiplicación
                        var resultado = parseInt(tiempo) * parseInt(valor);

                        // Actualizar el resultado en tiempo real
                        document.getElementById('resultado').textContent = "$ " + resultado;
                    }
                </script>






            </div>

            <div class="cuarta">

                <textarea name="campo" id="" cols="78" rows="5">

                </textarea>

            </div>


            <div class="botones" style="display: flex;  margin-top: 25px; justify-content:center;">

                <input style="margin-right: 0% ; width: 100px;" type="submit" name="enviarDetalle" id="enviar" value="Enviar">

                <a href="borrard.html" class="BorrarDetalle" style="background-color: red; color: aliceblue; padding-top: 1px; 
            padding-bottom: 1px; padding-left: 5px; padding-right: 1px; text-decoration: none;
            width:100px; margin-left: 25px;">
                    <p><b>Borrar</b></p>
                </a>


                <a href="modificard.php" class="ModificarDetalle" style="background-color: #007bff; color: aliceblue; padding-top: 1px; 
            padding-bottom: 1px; padding-left: 5px; padding-right: 1px; text-decoration: none;
            width:100px; margin-left: 25px; text-align: center; ">
                    <p><b>Modificar</b></p>
                </a>


                <a href="consultarDetalles.php " class="LeerDetalle" style="background-color: rgb(255, 213, 0); color: aliceblue; padding-top: 1px; 
            padding-bottom: 1px; padding-left: 5px; padding-right: 1px; text-decoration: none;
            width:100px; margin-left: 25px; text-align: center; ">
                    <p><b>Leer</b></p>
                </a>


            </div>

            <br>


        </form>





        <!-- Fin primera parte -->






        <div style="margin-top: 25px;  ">
            <?php

            //donde nombre del trabajador va a ser NombreT y nombre del trabajo va  a ser NombreC
            $sql = $conn->prepare('SELECT nombreT , nombreC , numeroHoras ,valorHora, subtotal
            FROM otdetalle, trabajadores, trabajo WHERE otdetalle.codigoTrabajador = trabajadores.codigo
            and otdetalle.idTrabajo = trabajo.id;');

            $sql->execute();

            if (!$sql) {
                echo 'Error al ejecutar la consulta';
            } else {
            ?>




                <div class="contTabla">


                    <table class="content-table">

                        <thead>
                            <tr>
                                <td>Trabajador</td>
                                <td>Trabajo</td>
                                <td>Valor Horas</td>
                                <td>No Horas</td>
                                <td>Subtotal</td>






                            </tr>

                        </thead>
                    <?php
                    foreach ($sql as $row) {

                        print
                            "<tr>

                        <td>" . $row['nombreT'] . "</td>" .
                            "<td>" . $row['nombreC'] . "</td>" .
                            "<td>" . $row['valorHora'] . " $" . "</td>" .
                            "<td>" . $row['numeroHoras'] . " Horas" . "</td>" .
                            "<td>" . $row['subtotal'] . " $" . "</td>" .

                            "</tr>";
                    }
                }
                    ?>

                    </table>

                </div>




        </div>






        <!-- 
        fin de la segunda parte -->







        <form action="../../Models/indexDetalles.php" method="POST" style="width: 600px; margin-top: 25px;">
            <div class="final" style="background-color: white; margin-top: 25px ; 
        padding-top: 25px; padding-bottom: 25px; display:flex; justify-content: center;">


                <a href="../../Models/generarPDF.php" style="background-color:  #5f0f68; color: aliceblue; padding-top: 5px; 
             padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-decoration: none;
             ; border-radius: 10px; margin-right: 50px">
                    <b>GenerarPDF</b>
                </a>



                <a href="../principal/index.html" style="background-color:  #5f0f68; color: aliceblue; padding-top: 5px; 
             padding-bottom: 5px; padding-left: 5px; padding-right: 5px; text-decoration: none;
             ; border-radius: 10px; margin-right: 50px">
                    <b>Volver Al inicio</b>
                </a>

                <label for="" style="margin-left: 0px;">Totales:</label>



                <?php


                $sql = $conn->prepare('SELECT  numeroHoras ,subtotal FROM otdetalle');

                $sql->execute();

                $sumaValor = 0;
                $sumaTiempo = 0;

                /* Esta sumando el total de los valores que se han asignado y el tiempo (en dias) que
             se han asignado
            */

                foreach ($sql as $row) {

                    $sumaValor +=  $row['numeroHoras'];
                    $sumaTiempo += $row['subtotal'];
                }

                /* Se muestra el resultado en pantalla
            */

                print
                    ' <p style="margin-left: 40px; margin-top: 0%">'  . $sumaValor .  " Horas" . '</p>' .
                    ' <p style="margin-left: 25px; margin-top: 0%">' . $sumaTiempo . "$" . '</p>';

                ?>


            </div>








</body>

</html>
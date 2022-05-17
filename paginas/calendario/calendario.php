<?php
    session_start();

    include_once('../../conexion.php');

    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

    $tt = 1;
    $sub = $_SESSION['subreceptor'];
    $sql = "SELECT a.expedienteclinica AS expediente, a.nombres AS nombres, a.apellidos AS apellidos, a.contactotelefono AS telefono, b.expedienteclinica AS expediente2, b.fechacita AS cita, b.hora AS hora, b.estado AS estado FROM generales AS a INNER JOIN citas AS b ON a.expedienteclinica = b.expedienteclinica WHERE b.subreceptor = '$sub'";


    $result = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($result);
    if($filas > 0)
        {
            while ($fila = mysqli_fetch_assoc($result))
                {
                    if($fila['estado'] == "SI"){$color = "#1d5288";}else{$color = "#CD2626";}

                    if($tt <= 1)
                        {
                            $calendario = "{title: '" . $fila['nombres'] . "', apellidos: '" . $fila['apellidos'] . "', expediente: '" . $fila['expediente'] . "', telefonos: '" . $fila['telefono'] . "', start: '" . $fila['cita'] . " " . $fila['hora'] . "', fechacita: '" . $fila['cita'] . "', color: '#FFF', textColor: '$color'},";
                            $tt = $tt + 1;
                        }
                    else
                        {
                            $calendario = $calendario . "{title: '" . $fila['nombres'] . "', apellidos: '" . $fila['apellidos'] . "', expediente: '" . $fila['expediente'] . "', telefonos: '" . $fila['telefono'] . "', start: '" . $fila['cita'] . " " . $fila['hora'] . "', fechacita: '" . $fila['cita'] . "', color: '#FFF', textColor: '$color'},";
                        }
                }
        } else {
            $calendario = "";
        }


?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agenda</title>

</head>

<body>

    <div id="calendar"
        style="margin-top: 110px; background-color: #FFF; width: 80%; margin-left: 10%; font-size: 10px; color: #000;">
    </div>


    <br><br><br><br><br><br>


    <script>
    function addZero(i) {
        if (i < 10) {
            i = '0' + i;
        }
        return i;
    }

    var hoy = new Date();
    var dd = hoy.getDate();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    var mm = hoy.getMonth() + 1;
    var yyyy = hoy.getFullYear();

    dd = addZero(dd);
    mm = addZero(mm);

    $(document).ready(function() {
        $('#calendar').fullCalendar({
            locale: 'es',
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [
                <?php echo $calendario; ?>
            ],
            dayClick: function(date, jsEvent, view) {
                $("#NuevaCita").modal('show');
                $("#fecha2").val(date.format());
            },
            eventClick: function(calEvent, jsEvent, view) {
                $("#DatosUsuario").modal('show');
                $("#expediente1").val(calEvent.expediente);
                $("#nombres1").val(calEvent.title);
                $("#apellidos1").val(calEvent.apellidos);
                $("#telefono1").val(calEvent.telefonos);
                $("#fecha1").val(calEvent.fechacita);
            }
        });
    });
    </script>





    <?php
    if($_SESSION['citas'] == "SI")
        {
?>

    <!-- VENTANA MODAL PARA MOSTRAR DATOS DEL USUARIO QUE ASISTE A SU CITA -->
    <div id="DatosUsuario" class="modal fade" role="dialog" style="color: #000 !important;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">DATOS DEL USUARIO</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="DescripcionEvento"></div>
                    <form>
                        <table class="table table-striped table-condensed table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50%;"></th>
                                    <th style="width: 50%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><label for="expediente1">Expediente : </label></td>
                                    <td><input type="text" class="form-control" name="expediente1" id="expediente1"
                                            value="" readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="nombres1">Nombres : </label></td>
                                    <td><input type="text" class="form-control" name="nombres1" id="nombres1" value=""
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="apellidos1">Apellidos : </label></td>
                                    <td><input type="text" class="form-control" name="apellidos1" id="apellidos1"
                                            value="" readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="telefono1">Teléfono : </label></td>
                                    <td><input type="text" class="form-control" name="telefono1" id="telefono1" value=""
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="fecha1">Fecha : </label></td>
                                    <td><input type="date" class="form-control" name="fecha1" id="fecha1" value=""
                                            readonly></td>
                                </tr>
                                <tr>
                                    <td><input type="button" name="nollego" id="nollego"
                                            class="btn btn-warning form-control" value="NO ASISTIO"
                                            onclick="NoAsistio();"></td>
                                    <td><input type="button" name="llego" id="llego"
                                            class="btn btn-success form-control" value="SI ASISTIO"
                                            onclick="SiAsistio();"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="button" name="eliminacitausuario" id="eliminacitausuario"
                                            class="btn btn-danger form-control" onclick="EliminarCitaUsuario();"
                                            value="ELIMINAR CITA">
                                    </td>
                                </tr>


                                <?php
                                        if($_SESSION['registros'] == "SI")
                                        {
                                    ?>
                                <tr>
                                    <td colspan="2">
                                        <input type="button" name="abrirexpediente" id="abrirexpediente"
                                            class="btn btn-info form-control" onclick="CargarGeneralesUsuario('1','1');"
                                            value="DATOS DEL USUARIO">
                                    </td>
                                </tr>
                                <?php
                                        }
                                    ?>



                                <?php
                                        if($_SESSION['laboratorios'] == "SI")
                                        {
                                    ?>
                                <tr>
                                    <td colspan="2">
                                        <input type="button" name="abrirexpediente" id="abrirexpediente"
                                            class="btn btn-primary form-control" onclick="CargarExpediente('1','1');"
                                            value="DATOS DE LABORATORIO">
                                    </td>
                                </tr>
                                <?php
                                        }
                                    ?>

                            </tbody>
                        </table>
                    </form>
                </div>
                <!--
                        <div class="modal-footer" style="margin-top: 0px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                        </div>
                        -->
            </div>
        </div>
    </div>




    <!-- VENTANA MODAL PARA AGREAGAR NUEVAS CITAS -->
    <div id="NuevaCita" class="modal fade" role="dialog" style="color: #000 !important;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">REGISTRO DE NUEVAS CITAS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="DescripcionEvento"></div>
                    <form name="ncitausuario" id="ncitausuario" method="POST" action="javascript: GuardarNuevaCita();">

                        <table class="table table-striped table-condensed table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50%;"></th>
                                    <th style="width: 50%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <label>Filtro : </label>
                                            <input type="text" name="filtro" id="filtro">
                                            <a href="#" class="btn btn-info" style="font-size: 10px;"
                                                onclick="FiltrarUsuariosCita();"><span
                                                    class="glyphicon glyphicon-filter"></span></a>
                                        </center>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="expediente1">Usuario : </label></td>
                                    <td>
                                        <select id="usuario2" name="usuario2" class="form-control">
                                            <option value="0">...</option>
                                            <?php
                                                        $sql = "SELECT * FROM generales WHERE subreceptor = '$sub' ORDER BY nombres, apellidos ASC";
                                                        $result = mysqli_query($conexion, $sql);
                                                        $filas = mysqli_affected_rows($conexion);
                                                        if($filas > 0)
                                                            {
                                                                while($fila = mysqli_fetch_assoc($result))
                                                                    {
                                                                        echo '<option value="' . $fila['expedienteclinica'] . '">' . $fila['nombres'] . ', ' . $fila['apellidos'] . '</option>';
                                                                    }
                                                            }
                                                    ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="fecha2">Fecha : </label></td>
                                    <td><input type="date" name="fecha2" id="fecha2" class="form-control" readonly></td>
                                </tr>
                                <tr>
                                    <td><label for="hora2">Hora : </label></td>
                                    <td><input type="time" name="hora2" id="hora2" class="form-control"></td>
                                </tr>
                               
                                <input type="hidden" id="subreceptor2" name="subreceptor2" value="<?php echo $_SESSION['subreceptor']; ?>">
                                <tr>
                                    <td colspan="2"><input type="submit" name="guardarcitausuario"
                                            id="guardarcitausuario" value="GUARDAR"
                                            class="btn btn-primary form-control"></td>
                                </tr>

                            </tbody>
                        </table>



                    </form>
                </div>
                <!--
                        <div class="modal-footer" style="margin-top: 0px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                        </div>
                        -->
            </div>
        </div>
    </div>

    <?php
        }
?>


</body>

</html>


<?php
    clearstatcache();
    mysqli_close($conexion);
?>

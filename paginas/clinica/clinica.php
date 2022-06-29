<?php
session_start();

include_once('../../conexion.php');
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("America/Guatemala");
$organizacion = $_SESSION['subreceptor'];
if (isset($_POST['expediente'])) {
  $expediente = $_POST['expediente'];
}
if (isset($_GET['expediente'])) {
  $expediente = $_GET['expediente'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registro Cínico</title>

  <style type="text/css">
    .resultados {
      width: 100% !important;
      margin-bottom: 20px !important;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function() {
      //FORMATO DE MASCARAS
      $('#frascosr').mask('99', {
        placeholder: '00'
      });
      $('#creatininar').mask('99.99999', {
        placeholder: '00.00000'
      });
    });
  </script>

</head>


<body>
  <div class="row" style="margin-top: 110px; background: #FFF; font-size: 10px;">

    <?php
    $sqlu = "SELECT expedienteclinica, nombres, apellidos FROM generales WHERE expedienteclinica = '$expediente' AND  subreceptor = '$organizacion'";
    $resultu = mysqli_query($conexion, $sqlu);
    $filasu = mysqli_affected_rows($conexion);
    if ($filasu > 0) {
      while ($filau = mysqli_fetch_assoc($resultu)) {
        echo '<center><h1 style="color: #000;">' . $filau['nombres'] . ", " . $filau['apellidos'] . '</h1></center>';
      }
    }
    ?>

    <div class="col-sm-12">
      <!-- <div class="contenedor01"> -->
      <div class="row">
        <!-- TABLA DE ENTREGA DE MEDICAMENTOS -->
        <div class="col-sm-12">
          <table class="table table-striped table-bordered table-responsive table-condensed resultados">
            <thead>
              <tr>
                <th colspan="9">
                  <h4>REGISTRO DE MEDICAMENTOS ENTREGADOS, RESULTADOS DE LABORATORIO Y DIAGNOSTICOS CLINICOS</h4>
                </th>
              </tr>
              <tr>
                <th style="width: 08%;">
                  <center>FECHA</center>
                </th>
                <th style="width: 08%;">
                  <center>FRASCOS</center>
                </th>
                <th style="width: 08%;">
                  <center>CREATININA</center>
                </th>
                <th style="width: 08%;">
                  <center>VIH</center>
                </th>
                <th style="width: 08%;">
                  <center>SIFILIS</center>
                </th>
                <th style="width: 08%;">
                  <center>HEPATITIS B</center>
                </th>
                <th style="width: 08%;">
                  <center>HEPATITIS C</center>
                </th>
                <th style="width: 24%;">
                  <center>ITs</center>
                </th>
                <th style="width: 20%;">
                  <center>OBSERVACIONES</center>
                </th>
              </tr>

            </thead>
            <tbody>
              <?php
              $sql = "SELECT expedienteclinica AS expediente, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, frascos AS frascos, rcreatinina AS creatinina, rvih AS vih, rsifilis AS sifilis, rhbb AS hepb,
               rhbc AS hepc, rits AS its, observaciones AS observaciones FROM diagnosticos WHERE expedienteclinica = '$expediente' AND organizacion = '$organizacion'";
              $result = mysqli_query($conexion, $sql);
              $filas = mysqli_affected_rows($conexion);
              if ($filas > 0) {
                while ($fila = mysqli_fetch_assoc($result)) {
                  echo
                  "
																<tr style='color: #000;'>
																	<td><center>" . $fila['fecha'] .         "</center></td>
																	<td><center>" . $fila['frascos'] .       "<center></td>
																	<td><center>" . $fila['creatinina'] .    "<center></td>
																	<td><center>" . $fila['vih'] .           "<center></td>
																	<td><center>" . $fila['sifilis'] .       "<center></td>
																	<td><center>" . $fila['hepb'] .          "<center></td>
																	<td><center>" . $fila['hepc'] .          "<center></td>
																	<td><center>" . $fila['its'] .           "<center></td>
																	<td><center>" . $fila['observaciones'] . "<center></td>
																</tr>
															";
                }
              }
              ?>
            </tbody>
          </table>
        </div>


      </div>

      <!-- </div> -->
    </div>

    <br><br>
  </div>

  <br>


  <div class="row">
    <div class="col-sm-12">
      <?php
      if ($_SESSION['registros'] == "SI") {
      ?>
        <center><input type="button" name="CargarLaboratorios" id="CargarLaboratorios" class="btn btn-info form-control" onclick="CargarGeneralesUsuario('2','<?php echo $expediente; ?>');" value="DATOS GENERALES DEL PACIENTE" style="width: 50%; font-weight: bolder;"></center>
      <?PHP
      }
      ?>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="col-sm-12">
      <center><input type="button" name="CargarLaboratorios2" id="CargarLaboratorios2" class="btn btn-success form-control" onclick="MostrarModalMedicametnos();" value="REGISTRAR RESULTADO DE LABORATORIOS" style="width: 50%; font-weight: bolder;"></center>
    </div>
  </div>

  <!-- VENTANA MODAL PARA AGREAGAR RESULTADOS DE LABORATORIOS -->
  <div id="ResultadoLaboratorios" class="modal fade" role="dialog" style="color: #000 !important;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h3 class="modal-title">REGISTRO DE RESULTADOS DE LABORATORIOS</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="DescripcionEvento"></div>
          <form name="resultadoslab" id="resultadoslab" method="GET" action="javascript: GuardarResultadosLaboratorio();">
            <input type="hidden" name="organizacion" , id="organizacion" value="<?php echo $organizacion ?>">
            <div class="form-group col-sm-4">
              <label for="">Expediente:</label>
              <input type="text" class="form-control " name="expedienter" id="expedienter" value="<?php echo $expediente; ?>" readonly>
            </div>
            <div class="form-group col-sm-4">
              <label for="">Fecha:</label>
              <input type="date" class="form-control " name="fechar" id="fechar" value="" onchange="BuscarRegistrosDatos();" required>
            </div>
            <div class="form-group col-sm-4">
              <label for="">Frascos entregados:</label>
              <input type="text" class="form-control" name="frascosR" id="frascosR" value="">
            </div>
            <div class="form-group col-sm-3">
              <label for="">Creatinina:</label>
              <input type="text" class="form-control" name="creatininar" id="creatininar" value="">
            </div>
            <div class="form-group col-sm-6">
              <label for="">Tasa Filtrado Glomerular:</label>
              <select class="form-control" name="filtradoGlomr" id="filtradoGlomr">
                <option value="0"></option>
                <option value="1">Normal ( > 90 ml/min)</option>
                <option value="2">Levemente disminuida (80-89 ml/min)</option>
                <option value="3">Levemente disminuida (70-79 ml/min)</option>
                <option value="4">Levemente disminuida (60-69 ml/min)</option>
                <option value="5">Disminucion leve a moderada (45-59 ml/min)</option>
                <option value="6">Disminucion moderada a severa (30-44 ml/min)</option>
                <option value="7">Disminucion severa (15-29 ml/min)</option>
                <option value="8">Falla renal (< 15 ml/min)</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">VIH:</label>
              <select class="form-control" name="vihr" id="vihr">
                <option value="0"></option>
                <option value="POSITIVO">Reactivo</option>
                <option value="NEGATIVO">No reactivo</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">SIFILIS:</label>
              <select class="form-control" name="sifilisr" id="sifilisr">
                <option value="0"></option>
                <option value="REACTIVO">REACTIVO</option>
                <option value="NO REACTIVO">NO REACTIVO</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Hepatitis B:</label>
              <select class="form-control" name="hepatitisbr" id="hepatitisbr">
                <option value="0"></option>
                <option value="REACTIVO">REACTIVO</option>
                <option value="NO REACTIVO">NO REACTIVO</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">Hepatitis C:</label>
              <select class="form-control" name="hepatitiscr" id="hepatitiscr">
                <option value="0"></option>
                <option value="REACTIVO">REACTIVO</option>
                <option value="NO REACTIVO">NO REACTIVO</option>
              </select>
            </div>
            <div class="form-group col-sm-3">
              <label for="">RPR/SIFILIS:</label>
              <select class="form-control" name="rprSifr" id="rprSifr">
                <option value="0"></option>
                <option value="1">1:1</option>
                <option value="2">1:2</option>
                <option value="3">1:4</option>
                <option value="4">1:8</option>
                <option value="5">1:16</option>
                <option value="6">1:32</option>
                <option value="7">1:64</option>
                <option value="8">1:128</option>
                <option value="9">1:256</option>
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label for="">Diagnosticos:</label>
              <select name="itsr[]" multiple="multiple" id="itsr" required>
                <?php
                $sql = "SELECT * FROM diagitslab ORDER BY diagnostico ASC";
                $result = mysqli_query($conexion, $sql);
                $filas = mysqli_affected_rows($conexion);
                if ($filas > 0) {
                  while ($fila = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $fila['diagnostico'] . '">' . $fila['diagnostico'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <textarea name="itsrr" id="itsrr" rows="2" cols="30" disabled></textarea>
            </div>
            <div class="form-group col-sm-12">
              <label for="">Observaciones / otros:</label>
              <textarea class="form-control" name="notas" id="notas" rows="1" cols="10"></textarea>
            </div>

            <tr>
              <td colspan="2">
                <input type="submit" name="guardarresultadoslab" id="guardarresultadoslab" class="btn btn-primary form-control" value="GUARDAR DATOS" onclick="return confirm('¿Estás seguro que deseas guardar?')">
              </td>
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
  <script>
    $('#itsr').multiselect({
      columns: 1,
      placeholder: 'Selecionar ITS',
      search: true
    });
  </script>
</body>

</html>
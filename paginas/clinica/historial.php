<?php
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

      include_once('../../conexion.php');

	if(isset($_POST['expediente'])){$expediente = $_POST['expediente'];}
	if(isset($_GET['expediente'])){$expediente = $_GET['expediente'];}

?>
    <div class="registros">
          <div style="margin-top: 10px; background: #FFF; font-size: 10px;">
            <?php
            $sub = $_SESSION['subreceptor'];
              $sqlu = "SELECT expedienteclinica, nombres, apellidos, estado, subreceptor FROM generales WHERE expedienteclinica = '$expediente'";
              $resultu = mysqli_query($conexion, $sqlu);
              $filasu = mysqli_affected_rows($conexion);
              if($filasu > 0)
                {
                  while($filau = mysqli_fetch_assoc($resultu))
                    {
                      echo '<center><h1 style="color: #000;">' . $filau['nombres'] . ", ". $filau['apellidos'] . '</h1></center>';
                      if($filau['estado'] == 'ACTIVO'){
                      echo "<div class='alert alert-danger' role='alert'>
                        <h4> El paciente pertenece a " . $filau['subreceptor'] . " </h4>
                        <p>Si desea trasladar el paciente a su organizacion SOLICITAR TRASLADO</p>
                      </div>";
                    } else {
                      echo "<div class='alert alert-success' role='alert'>
                      <button class='btn btn-info' type='button' name='traslado' onclick='Trasladar(`".$filau['expedienteclinica']."`, `$sub`);'><i class='glyphicon glyphicon glyphicon-refresh'></i> Trasladar PACIENTE a mi organizacion</button>
                      </div>";
                    }
                    }
                }
            ?>
          </div>
        <div class="row">
        <div class="col-md-6">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th  colspan="3">HISTORIAL DE CITAS</th>
              </tr>
              <th>FECHA</th>
              <th>HORA</th>
              <th>ORGANIZACION</th>
            </thead>
            <tbody>
              <?php
                $sqlh = "SELECT *FROM citas WHERE expedienteclinica = '$expediente'";
                $resulth = mysqli_query($conexion, $sqlh);
                $filash = mysqli_affected_rows($conexion);
                if($filash > 0)
                  {
                    while($filah = mysqli_fetch_assoc($resulth))
                      {
                        echo "
                        <tr>
                          <td>".$filah['fechacita'].   "</td>
                          <td>".$filah['hora'].   "</td>
                          <td>".$filah['organizacion'].   "</td>
                        </tr>
                        ";
                      }
                  }
              ?>

            </tbody>
          </table>
        </div>

      </div>

    </div>

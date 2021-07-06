<div class="modal fade" id="DatosUsuario" tabindex="-1" role="dialog" aria-labelledby="DatosUsuario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
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
                        <td><input
                          type="button"
                          name="nollego" id="nollego"
                          class="btn btn-warning form-control cerrar"
                          value="NO ASISTIO"
                          onclick="NoAsistio();">
                        </td>
                        <td>
                          <input
                          type="button"
                          name="llego" id="llego"
                          class="btn btn-success form-control cerrar"
                          value="SI ASISTIO"
                          onclick="SiAsistio();">
                        </td>
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
    </div>
  </div>
</div>

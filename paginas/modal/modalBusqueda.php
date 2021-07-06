<!-- Modal -->
<div class="modal fade" id="buscarPaciente" tabindex="-1" role="dialog" aria-labelledby="buscarPacientes" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buscarPacientes">BUSCAR TODOS LOS PACIENTES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-md-3">
          <label for="">DPI:</label>
          <input type="text" id="dpi" class="form-control">
        </div>
        <div class="form-group col-md-3">
          <label for="">NOMBRE:</label>
          <input type="text" id="nombre" class="form-control" >
        </div>
        <div class="form-group col-md-3">
          <label for="">APELLIDO</label>
          <input type="text" id="apellido" class="form-control">
        </div>
        <div class="form-group col-md-3">
          <button type="button" name="button" class="btn btn-info" onclick="buscarPacientes();"><i class="glyphicon glyphicon-search"></i> Buscar</button>
        </div>


        <table class="table table-bordered" style="font-size: 12px;">
          <thead>
            <thead>
              <th>EXPEDIENTE</th>
      				<th>NOMBRES</th>
      				<th>APELLIDOS</th>
      				<th>DPI</th>
              <th>ORGANIZACION</th>
      				<th>ACCION</th>
            </thead>
          </thead>
          <tbody id="resultados">

          </tbody>
        </table>


        <!--  <input class="form-control" type="text" id="buscar" value="" placeholder="Buscar"/>-->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(".cerrarModal").click(function(){
    $("#buscarPaciente").modal('hide')
  });

  $(document).ready(function()
    {
      //FORMATO DE MASCARAS
      $('#dpi').mask('9999 99999 9999', {placeholder: '0000 00000 0000'});
    });
</script>

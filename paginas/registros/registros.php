<?php
	header('Content-Type: text/html; charset=UTF-8');
	date_default_timezone_set("America/Guatemala");
	session_start();

	include_once('../../conexion.php');
	$organizacion = $_SESSION['subreceptor']
?>

<div class="registros">

<!-- TITULO DE LA PAGINA -->
<h1 class="text-center"><?php echo $organizacion; ?></h1>
	<div class="contenedor02">
		<h3 class="text-center">LISTADO DE PACIENTES REGISTRADOS</h3></div>
<?php include ('../../paginas/modal/modalBusqueda.php'); ?>
<!-- FILTROS DE LA TABLA -->
	<div class="contenedor02">
	<!-- BUSCADOR -->
		<div class="row">
			<div class="col-sm-4 text-right">
				<label for="buscador" style="margin-left: 15px;">Campo de b&uacute;squeda : </label>
			</div>
			<div class="col-sm-4">
				<input class="form-control" type="text" id="buscador" value="" />
			</div>
			<div class="col-sm-4">
				<center>
					<a href="#" class="btn-sm btn-success" onclick="CargarPagina('#C_Secundario','paginas/registros/registrarusuario.php');"><i class="glyphicon glyphicon-plus"></i> NUEVO</a>
					<a href="#" class="btn-sm btn-info" data-toggle="modal" data-target="#buscarPaciente" ><i class="glyphicon glyphicon-search"></i> BUSCAR</a>

				</center>


			</div>
		</div>
	</div>

<!-- CONTENIDO DE LA TABLA -->

	<table id="ListadoConsultorias" name="ListadoConsultorias" class="table-bordered" style="font-size:12px;">
		<thead>
			<tr>
				<th style="width: 8%;"># EXPEDIENTE</th>
				<th style="width: 15%;">NOMBRES</th>
				<th style="width: 15%;">APELLIDOS</th>
				<th style="width: 8%;">DPI</th>
				<th style="width: 5%;">EDAD</th>
				<th style="width: 5%;">TELEFONO</th>
				<th style="width: 15%;">CORREO</th>
				<th style="width: 10%;">ESQUEMA</th>
				<th colspan="3" style="width: 10%;">ACCION</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$parametro = $_SESSION['subreceptor'];
				$sql = "SELECT * FROM generales WHERE subreceptor = '$parametro' AND estado = 'ACTIVO'  ORDER BY expedienteclinica, nombres, apellidos ASC";
				$result = mysqli_query($conexion, $sql);
				$filas = mysqli_affected_rows($conexion);
				if($filas > 0)
					{
						while($fila = mysqli_fetch_assoc($result))
							{
								echo
									"
										<tr>
											<td>" .         $fila['expedienteclinica'] . "</td>
											<td>" .         $fila['nombres'] .           "</td>
											<td>" .         $fila['apellidos'] .         "</td>
											<td><center>" . $fila['documento'] .         "</center></td>
											<td><center>" . $fila['edad'] .              "</center></td>
											<td><center>" . $fila['contactotelefono'] .  "</center></td>
											<td>" .         $fila['contactocorreo'] .    "</td>
											<td>" .         $fila['esquema'] .    "</td>
									";
								if($_SESSION['registros'] == "SI")
									{
										echo "<td><a href='#' style='color: orange;' onclick='CargarDatosUsuario(`" . $fila['correlativo'] . "`,`" . $fila['expedienteclinica'] . "`);'>
										<center><i class='glyphicon glyphicon-edit'></i> Editar</center></a></td>";
									}
								if($_SESSION['laboratorios'] == "SI")
									{
										echo "<td><a href='#' style='color: blue;'  onclick='CargarExpediente(`" . $fila['correlativo'] . "`,`" . $fila['expedienteclinica'] . "`);'>
										<center><i class='glyphicon glyphicon-list-alt'></i> Laboratorio</center></a></td>";
									}
									echo "<td> <a href='#' onclick='Deshabilitar(`" . $fila['expedienteclinica'] . "`);'> <center> <i class='btn-danger glyphicon glyphicon-remove'></i></center> </a> </td>";
								echo	"</tr>";
							}
					}
			?>

		</tbody>
	</table>

	<br><br><br>






</div>













		<!-- SCRIPT PARA FILTRAR DATOS DE LA TABLA -->
		<script type="text/javascript">
		jQuery("#buscar").keyup(function()
			{
				if( jQuery(this).val() != "")
					{
						jQuery("#Listado tbody>tr").hide();
						jQuery("#Listado td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
					}
				else
					{
						jQuery("#Listado tbody>tr").show();
					}
			});

			jQuery("#buscador").keyup(function()
				{
					if( jQuery(this).val() != "")
						{
							jQuery("#ListadoConsultorias tbody>tr").hide();
							jQuery("#ListadoConsultorias td:contiene-palabra('" + jQuery(this).val() + "')").parent("tr").show();
						}
					else
						{
							jQuery("#ListadoConsultorias tbody>tr").show();
						}
				});

			jQuery.extend(jQuery.expr[":"],
				{
					"contiene-palabra": function(elem, i, match, array)
						{
							return (elem.textContent || elem.innerText || jQuery(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
						}
				});


		</script>

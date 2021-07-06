<?php
    session_start();

    include_once('../../conexion.php');

    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>


	<body>
		<form name="ControlUsuarios" method="POST" action="javascript: GuardarElementos('3');">
			<table class="table table-condensed table-striped table-responsive table-bordered" style="width: 90%; margin: 0 auto;">
				<thead>
					<tr>
						<th colspan="2">ADMINISTRACION DE PUEBLOS</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>ID</td>
						<td><input type="text" name="id" id="id" class="form-control" readonly></td>
					</tr>
					<tr>
						<td>PUEBLO</td>
						<td><input type="text" name="elemento" id="elemento" class="form-control" required></td>
					</tr>
					<tr>
						<td><input type="reset" name="limpiar" id="limpiar" class="btn btn-warning form-control" value="LIMPIAR FORMULARIO"></td>
						<td><input type="submit" name="guardar" id="guardar" class="btn btn-primary form-control" value="GUARDAR DATOS" onclick="return confirm('¿Estás seguro que deseas guardar?')"></td>
					</tr>
				</tbody>
			</table>
		</form>




		<br><br>



		<table class="table table-bordered table-responsive table-striped table-condensed" style="width: 50%; margin: 0 auto;">
			<thead>
				<tr>
					<th>ID</th>
					<th>NOMBRE DEL ELEMENTO</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM etnia ORDER BY correlativo ASC";
					$result = mysqli_query($conexion, $sql);
					$filas = mysqli_affected_rows($conexion);
					if($filas > 0)
						{
							while($fila = mysqli_fetch_assoc($result))
								{
									echo
										"
											<tr>
												<td style='width: 25%;'>" . $fila['correlativo'] . "</td>
												<td style='width: 75%;'>" . $fila['etnia'] . "</td>
											</tr>
										";
								}
						}
				?>
			</tbody>
		</table>

		<br><br>


	</body>
</html>

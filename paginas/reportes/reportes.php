<?php
    session_start();

    include_once('../../conexion.php');

    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CONFIGURACION</title>
	</head>


	<body>
		<div class="row" style="background: #FFF; color: #000; margin-top: 110px;">
		<!-- ********************************* IZQUIERDA ************************************ -->
			<div class="col-sm-4">
				<div style="width: 90%; margin: 0 auto;">
					<center><b>PARA GENERAR REPORTES, DEBE SELECCIONAR UN RANGO DE FECHAS</b></center>
					<br><br>
					<form name="rangofechas" id="rangofechas" method="POST" action="">
						<table style="width: 100%;">
							<thead>
								<tr>
									<th style="width: 30%;">Fecha inicial : </th>
									<th style="width: 70%;">
										<input type="date" name="inicial" id="inicial" style="width: 90%;">
									</th>
								</tr>
								<tr>
									<th>Fecha final : </th>
									<th>
										<input type="date" name="final"   id="final"   style="width: 90%;">
									</th>
								</tr>
							</thead>
							</tbody>
						</table>
					</form>

					<a href="#" class="btn btn-primary form-control" onclick="CargarReportes('#cargador','paginas/reportes/nuevos.php');">REGISTROS NUEVOS POR DEPARTAMENTO</a>
					<a href="#" class="btn btn-primary form-control" onclick="CargarReportes('#cargador','paginas/reportes/nuevosmes.php');">REGISTROS NUEVOS POR MES</a>
					<a href="#" class="btn btn-primary form-control" onclick="CargarReportes('#cargador','paginas/reportes/tipopoblacion.php');">REGISTROS POR TIPO DE POBLACION</a>
				
				</div>
				<br><br>
			</div>
		<!-- ********************************* DERECHA ************************************ -->
			<div class="col-sm-8">
				<div id="cargador">

				</div>
			</div>
		</div>

	</body>
</html>
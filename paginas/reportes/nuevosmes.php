<?php

    include_once('../../conexion.php');

    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

    if(isset($_POST['inicio'])){$inicio = $_POST['inicio'];}
	if(isset($_GET['inicio'])){$inicio = $_GET['inicio'];}

	if(isset($_POST['fin'])){$fin = $_POST['fin'];}
	if(isset($_GET['fin'])){$fin = $_GET['fin'];}

	if(isset($_POST['anio'])){$anio = $_POST['anio'];}
	if(isset($_GET['anio'])){$anio = $_GET['anio'];}

	$inicio = date_format(date_create($inicio), 'Y-m-d');
	$fin    = date_format(date_create($fin), 'Y-m-d');

	$anio1 = date("Y", strtotime($inicio));
	$anio2 = date("Y", strtotime($fin));

	echo $anio1;
	echo $anio2;

	$tabla = "";

	$sql = 
		"
			SELECT
			YEAR(fecharegistro) AS Anio, 
			CASE WHEN (MONTH(fecharegistro) = 1) THEN 'ENERO' ELSE
				CASE WHEN (MONTH(fecharegistro) = 2) THEN 'FEBRERO' ELSE
					CASE WHEN (MONTH(fecharegistro) = 3) THEN 'MARZO' ELSE
						CASE WHEN (MONTH(fecharegistro) = 4) THEN 'ABRIL' ELSE
							CASE WHEN (MONTH(fecharegistro) = 5) THEN 'MAYO' ELSE
								CASE WHEN (MONTH(fecharegistro) = 6) THEN 'JUNIO' ELSE
									CASE WHEN (MONTH(fecharegistro) = 7) THEN 'JULIO' ELSE
										CASE WHEN (MONTH(fecharegistro) = 8) THEN 'AGOSTO' ELSE
											CASE WHEN (MONTH(fecharegistro) = 9) THEN 'SEPTIEMBRE' ELSE
												CASE WHEN (MONTH(fecharegistro) = 10) THEN 'OCTUBRE' ELSE
													CASE WHEN (MONTH(fecharegistro) = 11) THEN 'NOVIEMBRE' ELSE
														CASE WHEN (MONTH(fecharegistro) = 12) THEN 'DICIEMBRE'
														END
													END
												END
											END
										END
									END
								END
							END
						END
					END
				END
			END rango,
		COUNT(correlativo) AS total
		FROM 
			generales
		WHERE 
			YEAR(fecharegistro) BETWEEN $anio1 AND $anio2   
		GROUP BY 
			Anio, rango
		";

	$result = mysqli_query($conexion, $sql);
	$filas  = mysqli_affected_rows($conexion);
	if($filas > 0)
		{
			$i = 0;
			while($fila = mysqli_fetch_assoc($result))
				{
					$tabla = $tabla . "<tr><td>" . $fila['rango'] . "</td><td style='text-align: right;'>" . $fila['total'] . "</td></tr>";
					$valoresx[$i] = $fila['rango'];
					$valoresy[$i] = $fila['total'];
					$i ++;
				}
			$datosx = json_encode($valoresx);
			$datosy = json_encode($valoresy);
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PRIMER INFORME</title>



		<script type="text/javascript">
			datosx = <?php echo json_encode($valoresx); ?>;
			datosy = <?php echo json_encode($valoresy); ?>;

			var trace1 = {type: 'bar', orientation: 'v', x: datosx, y: datosy, marker: {color: '#1d5288', line: {width: 2.5}}};

			var data = [ trace1 ];

			var layout = 
				{
					title: 'USUARIOS NUEVOS CLASIFICADOS POR MES', 
					font: {family: 'Arial', size: 10}, 
					margin: {l: 100, r: 20, t: 70, b: 70},   
					height: 500,
					xaxis1: {zeroline: true, showline: true, showticklabels: true, showgrid: true },
				};

			var config = {responsive: true}

			Plotly.newPlot('myDiv', data, layout);
		</script>


	</head>


	<body>
		<div id='myDiv'>
			
			<table class="table table-bordered table-striped table-condensed" style="width: 50%; margin: 0 auto; font-size: 10px;">
					<thead>
						<tr>
							<th>DEPARTAMENTO</th>
							<th>TOTAL</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $tabla; ?>
					</tbody>
			</table>
			<br><br><br>
		</div>
	</body>
</html>
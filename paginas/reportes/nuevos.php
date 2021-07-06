<?php

    include_once('../../conexion.php');

    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

    if(isset($_POST['inicio'])){$inicio = $_POST['inicio'];}
	if(isset($_GET['inicio'])){$inicio = $_GET['inicio'];}

	if(isset($_POST['fin'])){$fin = $_POST['fin'];}
	if(isset($_GET['fin'])){$fin = $_GET['fin'];}

	$inicio = date_format(date_create($inicio), 'Y-m-d');
	$fin    = date_format(date_create($fin), 'Y-m-d');

	$valoresx = array();
	$valoresy = array();

	$tabla = "";

	$sql = 
		"
			SELECT residenciadepto AS departamentos, COUNT(expedienteclinica) AS total 
			FROM generales 
			WHERE fecharegistro BETWEEN '$inicio' AND '$fin'
			GROUP BY residenciadepto 
			ORDER BY residenciadepto DESC;
		";

	$result = mysqli_query($conexion, $sql);
	$filas  = mysqli_affected_rows($conexion);
	if($filas > 0)
		{
			$i = 0;
			while($fila = mysqli_fetch_assoc($result))
				{
					$tabla = $tabla . "<tr><td>" . $fila['departamentos'] . "</td><td style='text-align: right;'>" . $fila['total'] . "</td></tr>";
					$valoresx[$i] = $fila['departamentos'];
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

			var trace1 = {type: 'bar', orientation: 'h', x: datosy, y: datosx, marker: {color: '#1d5288', line: {width: 2.5}}};

			var data = [ trace1 ];

			var layout = 
				{
					title: 'USUARIOS NUEVOS CLASIFICADOS POR DEPARTAMENTO DE RESIDENCIA', 
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
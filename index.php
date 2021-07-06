<?php
	session_start();
	header('Content-Type: text/html charset=UTF-8;');
    date_default_timezone_set("America/Guatemala");
 ?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<title>SISTEMA PREP Y PEP</title>

		<link rel="shortcut icon" href="img/logo_subvencion.png" type="image/vnd.microsoft.icon">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel='stylesheet' type='text/css' href='css/fullcalendar.css'>							<!-- ESTILOS PARA EL CALENDARIO -->
		<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">		<!-- ESTILOS PARA LOS MENSAJES -->
		<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">	<!-- ESTILOS PARA LOS MENSAJES -->
  		<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">			<!-- ESTILOS PARA LOS MENSAJES -->
  		<link rel="stylesheet" type="text/css" href="css/misestilos.css">

		<script type='text/javascript' src="js/jquery.min.js"></script>

		<link rel="stylesheet" href="css/jquery.multiselect.css">

				<script type='text/javascript' src="js/jquery.multiselect.js"></script>

        <script type='text/javascript' src='js/moment.min.js'></script>						<!-- SCRIPTS PARA EL CALENDARIO -->
        <script type='text/javascript' src='js/fullcalendar.js'></script>					<!-- SCRIPTS PARA EL CALENDARIO -->
        <script type='text/javascript' src='js/es.js'></script>								<!-- SCRIPTS PARA EL CALENDARIO -->

		<script type='text/javascript' src="js/jquery.mask.min.js"></script>				<!-- SCRIPTS PARA LAS MASCARAS -->
		<script type='text/javascript' src="js/bootstrap.js"></script>
		<script type='text/javascript' src="librerias/alertifyjs/alertify.js"></script> 	<!-- SCRIPTS PARA LOS MENSAJES -->
  		<script type='text/javascript' src="librerias/select2/js/select2.js"></script>		<!-- SCRIPTS PARA LOS MENSAJES -->
  		<script type='text/javascript' src="js/misfunciones.js"></script>

  		<script type='text/javascript' src='js/plotly-latest.min.js'></script>				<!-- SCRIPTS PARA LAS GRAFICAS -->

	</head>





	<body>

		<!-- ENCABEZADO DE PAGINA -->
		<div class="contenedor01"><?php include_once('paginas/encabezadoypie/encabezado.php'); ?></div>

		<!-- VENTANA DE ACCESO -->
		<div class="contenedor01">
			<div id="C_Primario"><?php include_once('paginas/accesos/login.php'); ?></div>
		</div>

		<div class="contenedor01">
			<div id="C_Secundario">
				<div id="fondo" style="display: none;"><center><img src="img/prepnoigualpep.png" style="background-repeat: no-repeat; width: 60%; margin-top: 130px;"></center></div>
			</div>
		</div>

		<!-- PIE DE PAGINA -->
		<div class="contenedor01"><?php include_once('paginas/encabezadoypie/pie.php');  ?></div>


	</body>
</html>

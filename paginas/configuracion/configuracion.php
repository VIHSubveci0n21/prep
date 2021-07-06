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
		<div style="margin-top: 110px; background: #FFF;">
			<br><br>
			<div class="row">
				<div class="col-sm-5" style="padding-left: 25px; padding-right: 25px;">
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/usuarios.php');">USUARIOS</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/tipodocumentos.php');">TIPO DE DOCUMENTO</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/escolaridad.php');">ESCOLARIDAD</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/etnia.php');">PUEBLO</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/genero.php');">IDENTIDAD DE GENERO</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/orientacion.php');">ORIENTACION SEXUAL</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/poblacion.php');">TIPO DE POBLACION</a></center>
					<br>
					<center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/labits.php');">DIAGNOSTICOS DE ITs LAB.</a></center>
          <br>
          <center><a class="btn btn-primary form-control" style="width: 50%; margin: 0 auto;" onclick="CargarPagina('#ContenedorUsuarios','paginas/configuracion/subreceptor.php');">SUBRECEPTOR</a></center>

				</div>

				<div class="col-sm-7">
					<div id="ContenedorUsuarios" style="color: #000;"></div>
				</div>
			</div>
			<br><br>
		</div>
	</body>
</html>

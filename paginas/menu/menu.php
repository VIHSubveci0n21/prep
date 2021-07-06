<?php
	header('Content-Type: text/html; charset=UTF-8');
	date_default_timezone_set("America/Guatemala");
	session_start();
?>

<div class="barramenu">
	<div id="barramenu">
		<ul>
			<li><a href="#" onclick="ActivarInicio();">Inicio </a></li>

			<li><a href="#" onclick="CargarPagina('#C_Secundario','paginas/calendario/calendario.php');">Calendario </a></li>

			<?php
				if($_SESSION['registros'] == "SI")    {echo '<li><a href="#" onclick="CargarPagina(`#C_Secundario`,`paginas/registros/registros.php`);">Registro de Pacientes </a></li>';}
				if($_SESSION['reportes'] == "SI")     {echo '<li><a href="#" onclick="CargarPagina(`#C_Secundario`,`paginas/reportes/reportes.php`);">Reportería </a></li>';}
				if($_SESSION['configuracion'] == "SI"){echo '<li><a href="#" onclick="CargarPagina(`#C_Secundario`,`paginas/configuracion/configuracion.php`);">Configuración </a></li>';}
			?>

			<li><a href="#" onclick="salir();">Salir</a></li>

			<div class="usuario"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nombre']; ?></div>
		</ul>
	</div>
</div>

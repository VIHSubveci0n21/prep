<?php

	ini_set('max_execution_time', 900);
	header('Content-Type: text/html; charset=UTF-8');
	date_default_timezone_set("America/Guatemala");
	session_start();

	if(isset($_POST['accion'])){$accion = $_POST['accion'];}
	if(isset($_GET['accion'])){$accion = $_GET['accion'];}

	include_once("conexion.php");






/* *********************************************************************************************************** */
/*                                                     LOGIN                                                   */
/* *********************************************************************************************************** */
if($accion == "ValidarUsuario") {

		$nombreusuario = $_GET['usuario'];
		$password = $_GET['password'];

		$sql = "SELECT * FROM usuarios WHERE nombreusuario = '$nombreusuario'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0) {
				while($fila = mysqli_fetch_assoc($result)) {
						$_SESSION['organizacion']  = $fila['organizacion'];
						$_SESSION['nombreusuario'] = $fila['nombreusuario'];
						$_SESSION['nombre']        = $fila['nombre'];
						$_SESSION['password']      = $fila['password'];
						$_SESSION['cargo']         = $fila['cargo'];
						$_SESSION['registros']     = $fila['registros'];
						$_SESSION['citas']         = $fila['citas'];
						$_SESSION['laboratorios']  = $fila['laboratorios'];
						$_SESSION['reportes']      = $fila['reportes'];
						$_SESSION['configuracion'] = $fila['configuracion'];
						$_SESSION['usuarios']      = $fila['editarusuario'];
						$_SESSION['estado']        = $fila['estado'];
						$_SESSION['subreceptor']	 = $fila['subreceptor'];

				if(password_verify($password, $fila['password'])) {
								echo "Exito";
					} else {
								echo "Error1";
							}
					}
				if($_SESSION['estado'] == "BAJA") {
						echo "BAJA";
					}
			} else {
				echo "Error1";
			}
	}



















/* *********************************************************************************************************** */
/*                                                   REGISTROS                                                 */
/* *********************************************************************************************************** */
if($accion == "LlenarComboDepartamento")
	{
		$pais = $_GET['pais'];

		$sql = "SELECT * FROM departamentos ORDER BY departamento ASC";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "<option value='0'>...</option>";
				while($fila = mysqli_fetch_assoc($result))
					{
						echo "<option value='" . $fila['codigo'] . "'>" . $fila['departamento'] . "</option>";
					}
			}
	}

if($accion == "LlenarComboMunicipio")
	{
		$departamento = $_GET['departamento'];

		$sql = "SELECT * FROM municipios WHERE codigo LIKE '" . $departamento ."%' ORDER BY municipio ASC";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "<option value='0'>...</option>";
				while($fila = mysqli_fetch_assoc($result))
					{
						echo "<option value='" . $fila['codigo'] . "'>" . $fila['municipio'] . "</option>";
					}
			}
	}


if($accion == "CargarDatosUsuario")
	{
		$correlativo = $_GET['correlativo'];
		$expediente = $_GET['expediente'];


		$sql = "SELECT * FROM generales WHERE expedienteclinica = '$expediente'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				while($fila = mysqli_fetch_assoc($result))
					{
						echo
							$fila['clinica'] . '*' .
							$fila['tipousuario'] . '*' .
							$fila['expedienteclinica'] . '*' .
							$fila['expedientevicit'] . '*' .
							$fila['nombres'] . '*' .
							$fila['apellidos'] . '*' .
							$fila['fechanacimiento'] . '*' .
							$fila['edad'] . '*' .
							$fila['sexonacimiento'] . '*' .
							$fila['etnia'] . '*' .
							$fila['escolaridad'] . '*' .
							$fila['nacimientopais'] . '*' .
							$fila['nacimientodepto'] . '*' .
							$fila['nacimientomuni'] . '*' .
							$fila['tipodocumento'] . '*' .
							$fila['documento'] . '*' .
							$fila['cuiconstruido'] . '*' .
							$fila['residenciapais'] . '*' .
							$fila['residenciadepto'] . '*' .
							$fila['residenciamuni'] . '*' .
							$fila['residenciadireccion'] . '*' .
							$fila['contactotelefono'] . '*' .
							$fila['contactocorreo'] . '*' .
							$fila['contactootro'] . '*' .
							$fila['poblacionclave'] . '*' .
							$fila['orientacionsexual'] . '*' .
							$fila['genero'] . '*' .
							$fila['estado']
						;
					}
			}
	}


if($accion == "LlenarListadoCitas")
	{
		$expediente = $_GET['expediente'];

		$sql = "SELECT * FROM citas WHERE expedienteclinica = '$expediente' ORDER BY CONCAT(SUBSTRING_INDEX(fechacita , '/', -1),SUBSTRING_INDEX(SUBSTRING_INDEX(fechacita , '/', 2), '/', -1),SUBSTRING_INDEX(fechacita , '/', 1)) ASC";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				while($fila = mysqli_fetch_assoc($result))
					{
						echo
							"
								<tr>
									<td><center>" . date_format(date_create($fila['fechacita']), 'd-m-Y') . "</center></td>
									<td><center>" . $fila['estado'] . "</center></td>
									<td><center>" . $fila['organizacion'] . "</center></td>
								</tr>"
							;
					}
			}
	}


if($accion == "GuardarDatosUsuarioClinica") {

		$clinica 					= $_GET['clinica'];
		$tipousuario 			= $_GET['tipousuario'];
		$expedienteclinica = $_GET['expedienteclinica'];
		$expedientevicit 	= $_GET['expedientevicit'];
		$nombres 					= $_GET['nombres'];
		$apellidos 				= $_GET['apellidos'];
		$fechanacimiento 	= date_format(date_create($_GET['fechanacimiento']), 'Y-m-d');
		$edad 						= $_GET['edad'];
		$sexonacer 				= $_GET['sexonacer'];
		$etnia 						= $_GET['etnia'];
		$escolaridad 			= $_GET['escolaridad'];
		$paisnacimiento 	= $_GET['paisnacimiento'];
		$deptonacimiento 	= $_GET['deptonacimiento'];
		$muninacimiento 	= $_GET['muninacimiento'];
		$tipodocumento 		= $_GET['tipodocumento'];
		$numerocui 				= $_GET['numerocui'];
		$cuiconstruido 		= $_GET['cuiconstruido'];
		$paisresidencia 	= $_GET['paisresidencia'];
		$deptoresidencia 	= $_GET['deptoresidencia'];
		$muniresidencia 	= $_GET['muniresidencia'];
		$direccion 				= $_GET['direccion'];
		$telefono 				= $_GET['telefono'];
		$email 						= $_GET['email'];
		$otromedio 				= $_GET['otromedio'];
		$poblacion 				= $_GET['poblacion'];
		$orientacion 			= $_GET['orientacion'];
		$genero 					= $_GET['genero'];
		$estado 					= $_GET['estado'];
		$subreceptor			= $_GET['subreceptor'];
		$oferta						= $_GET['oferta'];
		$acepta						= $_GET['acepta'];
		$autoriza					= $_GET['autoriza'];
		$esquema					= $_GET['esquema'];

		$hoy = date('Y-m-d');

		$resultado = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM generales WHERE documento = '$numerocui'"));
		if($resultado > 0) {
			echo "Existe";
		}

		$sql1 = "SELECT * FROM generales WHERE expedienteclinica = '$expedienteclinica'";
		$result1 = mysqli_query($conexion, $sql1);
		$filas1 = mysqli_affected_rows($conexion);
		if($filas1 > 0) {
				$sql2 = "
						UPDATE generales SET
							clinica             = '$clinica',
							tipousuario         = '$tipousuario',
							expedientevicit     = '$expedientevicit',
							nombres             = '$nombres',
							apellidos           = '$apellidos',
							fechanacimiento     = '$fechanacimiento',
							edad                =  $edad,
							sexonacimiento      = '$sexonacer',
							etnia               = '$etnia',
							escolaridad         = '$escolaridad',
							nacimientopais      = '$paisnacimiento',
							nacimientodepto     = '$deptonacimiento',
							nacimientomuni      = '$muninacimiento',
							tipodocumento       = '$tipodocumento',
							documento           = '$numerocui',
							cuiconstruido       = '$cuiconstruido',
							residenciapais      = '$paisresidencia',
							residenciadepto     = '$deptoresidencia',
							residenciamuni      = '$muniresidencia',
							residenciadireccion = '$direccion',
							contactotelefono    = '$telefono',
							contactocorreo      = '$email',
							contactootro        = '$otromedio',
							poblacionclave      = '$poblacion',
							orientacionsexual   = '$orientacion',
							genero              = '$genero',
							estado              = '$estado',
							subreceptor					= '$subreceptor'
							oferta							= '$oferta'
							acepta							= '$acepta'
							autoriza						=	'$autoriza'
							esquema							= '$esquema'

						WHERE expedienteclinica = '$expedienteclinica'
					";
				$result2 = mysqli_query($conexion, $sql2);
				$filas2 = mysqli_affected_rows($conexion);
				if($filas2 > 0){echo "Exito2";}else{echo "Error2";}
			}
		else
			{
				$sql3 = "INSERT INTO generales(expedienteclinica) VALUES('$expedienteclinica')";
				$result = mysqli_query($conexion, $sql3);

				$sql2 =
					"
						UPDATE generales SET
							clinica             = '$clinica',
							tipousuario         = '$tipousuario',
							expedientevicit     = '$expedientevicit',
							nombres             = '$nombres',
							apellidos           = '$apellidos',
							fechanacimiento     = '$fechanacimiento',
							edad                =  $edad,
							sexonacimiento      = '$sexonacer',
							etnia               = '$etnia',
							escolaridad         = '$escolaridad',
							nacimientopais      = '$paisnacimiento',
							nacimientodepto     = '$deptonacimiento',
							nacimientomuni      = '$muninacimiento',
							tipodocumento       = '$tipodocumento',
							documento           = '$numerocui',
							cuiconstruido       = '$cuiconstruido',
							residenciapais      = '$paisresidencia',
							residenciadepto     = '$deptoresidencia',
							residenciamuni      = '$muniresidencia',
							residenciadireccion = '$direccion',
							contactotelefono    = '$telefono',
							contactocorreo      = '$email',
							contactootro        = '$otromedio',
							poblacionclave      = '$poblacion',
							orientacionsexual   = '$orientacion',
							genero              = '$genero',
							estado              = '$estado',
							fecharegistro       = '$hoy',
							subreceptor					= '$subreceptor',
							oferta							= '$oferta',
							acepta							= '$acepta',
							autoriza						= '$autoriza',
							esquema							= '$esquema'
						WHERE expedienteclinica = '$expedienteclinica'
					";
				$result2 = mysqli_query($conexion, $sql2);
				$filas2 = mysqli_affected_rows($conexion);
				if($filas2 > 0){echo "Exito2";}else{echo "Error2";}
			}
	}



if($accion == "SiAsistio")
	{
		$expediente1 = $_GET['expediente1'];
		$fecha1 = date_format(date_create($_GET['fecha1']), 'Y-m-d');

		$sql = "UPDATE citas SET estado = 'SI' WHERE expedienteclinica = '$expediente1' AND fechacita = '$fecha1'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "Exito";
			}
		else
			{
				echo "Error";
			}
	}


if($accion == "NoAsistio")
	{
		$expediente1 = $_GET['expediente1'];
		$fecha1 = date_format(date_create($_GET['fecha1']), 'Y-m-d');

		$sql = "UPDATE citas SET estado = 'NO' WHERE expedienteclinica = '$expediente1' AND fechacita = '$fecha1'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "Exito";
			}
		else
			{
				echo "Error";
			}
	}



if($accion == "FiltrarUsuariosCita")
	{
		$filtro = $_GET['filtro'];

		$sql = "SELECT * FROM generales WHERE nombres LIKE '%" . $filtro . "%' OR apellidos LIKE '%" . $filtro . "%' OR expedienteclinica LIKE '%" . $filtro . "%'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo '<option value="0">...</option>';
				while($fila = mysqli_fetch_assoc($result))
					{
						echo '<option value="' . $fila['expedienteclinica'] . '">' . $fila['nombres'] . " , " . $fila['apellidos'] . '</option>';
					}
			}
	}


if($accion == 'GuardarNuevaCita')
	{
		$usuario2 		= $_GET['usuario2'];
		$fecha2  			= date_format(date_create($_GET['fecha2']), 'Y-m-d');
		$hora2 				= $_GET['hora2'];
		$organizacion2 = $_GET['organizacion2'];
		$subreceptor2	= $_GET['subreceptor2'];

		$sql = "INSERT INTO citas(expedienteclinica, fechacita, hora, estado, organizacion, subreceptor) VALUES('$usuario2','$fecha2', '$hora2','','$organizacion2','$subreceptor2')";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "Exito";
			}
		else
			{
				echo "Error";
			}
	}


if($accion == "EliminarCitaUsuario")
	{
		$expediente1 = $_GET['expediente1'];
		$fecha1  = date_format(date_create($_GET['fecha1']), 'Y-m-d');

		$sql = "DELETE FROM citas WHERE expedienteclinica = '$expediente1' AND fechacita = '$fecha1'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "Exito";
			}
		else
			{
				echo "Error";
			}
	}



if($accion == "GuardarResultadosLaboratorio")	{
		$expedienter 		= $_GET['expedienter'];
		$fechar      		= date_format(date_create($_GET['fechar']), 'Y-m-d');
		$frascosr    		= $_GET['frascosR'];
		$creatininar 		= $_GET['creatininar'];
		$vihr        		= $_GET['vihr'];
		$sifilisr    		= $_GET['sifilisr'];
		$hepatitisbr 		= $_GET['hepatitisbr'];
		$hepatitiscr 		= $_GET['hepatitiscr'];
		$itsr        		= implode (', ' , $_GET['itsr']);
		$filtradoGlomr	= $_GET['filtradoGlomr'];
		$rprSifr				= $_GET['rprSifr'];
		$notas       		= $_GET['notas'];
		$org 						= $_SESSION['organizacion'];

		if($frascosr == ""){$frascosr = 0;}
		if($creatininar == ""){$creatininar = 0;}
		if($vihr == "0"){$vihr = "";}
		if($sifilisr == "0"){$sifilisr = "";}
		if($hepatitisbr == "0"){$hepatitisbr = "";}
		if($hepatitiscr == "0"){$hepatitiscr = "";}
		if($filtradoGlomr == "0"){$filtradoGlomr = "";}
		if($rprSifr == "0"){$rprSifr = "";}


		$sql = "SELECT * FROM diagnosticos WHERE expedienteclinica = '$expedienter' AND fecha = '$fechar'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0) {
				$sql1 =
					"
						UPDATE diagnosticos SET
						frascos       =  $frascosr,
						rcreatinina   =  $creatininar,
						rvih          = '$vihr',
						rsifilis      = '$sifilisr',
						rhbb          = '$hepatitisbr',
						rhbc          = '$hepatitiscr',
						rits          = '$itsr',
						filtradoGlom	= '$filtradoGlomr',
						rprsifilis 		= '$rprSifr',
						observaciones = '$notas'
						WHERE expedienteclinica = '$expedienter' AND fecha = '$fechar'
					";
				$result1 = mysqli_query($conexion, $sql1);
				$filas1 = mysqli_affected_rows($conexion);
				if($filas1 > 0) {
						echo "Exito1";
					} else {
						echo "Error1";
					}
			} else {
				$sql2 = "INSERT INTO diagnosticos(expedienteclinica, fecha, frascos, rcreatinina, rvih, rsifilis, rhbb, rhbc, rits, filtradoGlom, rprsifilis, observaciones, organizacion)
								 VALUES('$expedienter','$fechar', $frascosr, $creatininar, '$vihr', '$sifilisr', '$hepatitisbr', '$hepatitiscr', '$itsr', '$filtradoGlomr', '$rprSifr', '$notas', '$org')";
				$result2 = mysqli_query($conexion, $sql2);
				$filas = mysqli_affected_rows($conexion);
				if($filas > 0) {
						echo "Exito2";
					}	else {
						echo "Error2";
						echo $sql2;
					}
			}
	}



if($accion == "BuscarUsuarioSistema")
	{
		$registro = $_GET['registro'];

		$sql = "SELECT * FROM usuarios WHERE id = '$registro'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				while($fila = mysqli_fetch_assoc($result))
					{
						echo
							$fila['id'] . "*" .
							$fila['organizacion'] . "*" .
							$fila['nombreusuario'] . "*" .
							$fila['nombre'] . "*" .
							$fila['password'] . "*" .
							$fila['cargo'] . "*" .
							$fila['registros'] . "*" .
							$fila['citas'] . "*" .
							$fila['laboratorios'] . "*" .
							$fila['reportes'] . "*" .
							$fila['configuracion'] . "*" .
							$fila['editarusuario'] . "*" .
							$fila['estado'];
					}
			}
	}



if($accion == "GuardarUsuariosSistema")
	{
		$id            = $_GET['id'];
		$organizacion  = $_GET['organizacion'];
		$nombre        = $_GET['nombre'];
		$ncompleto     = $_GET['ncompleto'];
		if($_GET['password1'] != "")
			{
				$password1     = password_hash($_GET['password1'], PASSWORD_BCRYPT);
			}
		else
			{
				$password1 = "";
			}
		$cargo         = $_GET['cargo'];
		$registros     = $_GET['registros'];
		$citas         = $_GET['citas'];
		$laboratorios  = $_GET['laboratorios'];
		$reportes      = $_GET['reportes'];
		$configuracion = $_GET['configuracion'];
		$usuarios      = $_GET['usuarios'];
		$estado        = $_GET['estado'];
		$subreceptor	 = $_GET['subreceptor'];

		$sql1 = "SELECT * FROM usuarios WHERE id = $id";
		$result1 = mysqli_query($conexion, $sql1);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				if($password1 == "")
					{
						$sql2 =
							"
								UPDATE usuarios
								SET
								organizacion  = '$organizacion',
								nombreusuario = '$nombre',
								nombre        = '$ncompleto',
								cargo         = '$cargo',
								registros     = '$registros',
								citas         = '$citas',
								laboratorios  = '$laboratorios',
								reportes      = '$reportes',
								configuracion = '$configuracion',
								editarusuario = '$usuarios',
								estado        = '$estado',
								subreceptor		= '$subreceptor'
								WHERE id = $id
							";
					}
				else
					{
						$sql2 =
							"
								UPDATE usuarios
								SET
								organizacion  = '$organizacion',
								nombreusuario = '$nombre',
								nombre        = '$ncompleto',
								password      = '$password1',
								cargo         = '$cargo',
								registros     = '$registros',
								citas         = '$citas',
								laboratorios  = '$laboratorios',
								reportes      = '$reportes',
								configuracion = '$configuracion',
								editarusuario = '$usuarios',
								estado        = '$estado',
								subreceptor		= '$subreceptor'
								WHERE id = $id
							";
					}

				$result2 = mysqli_query($conexion, $sql2);
				$filas2 = mysqli_affected_rows($conexion);
				if($filas2 > 0)
					{
						echo "Exito1";
					}
				else
					{
						echo "Error1";
					}
			}
		else
			{
				$sql2 = "INSERT INTO
					usuarios(
						organizacion,
						nombreusuario,
						nombre,
						password,
						cargo,
						registros,
						citas,
						laboratorios,
						reportes,
						configuracion,
						editarusuario,
						estado,
					  subreceptor)
					VALUES(
						'$organizacion',
						'$nombre',
						'$ncompleto',
						'$password1',
						'$cargo',
						'$registros',
						'$citas',
						'$laboratorios',
						'$reportes',
						'$configuracion',
						'$usuarios',
						'$estado',
						'$subreceptor')";
				$result2 = mysqli_query($conexion, $sql2);
				$filas2 = mysqli_affected_rows($conexion);
				if($filas2 > 0)
					{
						echo "Exito2";
					}
				else
					{
						echo "Error2";
					}
			}
	}



if($accion == "EliminarUsuariosSistema")
	{
		$id = $_GET['id'];

		$sql = "DELETE FROM usuarios WHERE id = $id";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "Exito";
			}
		else
			{
				echo "Error";
			}
	}



if($accion == "GuardarElementos")
	{
		$bd       = $_GET['bd'];
		$id       = $_GET['id'];
		$codigo		= $_GET['codigo'];
		$elemento = $_GET['elemento'];

		if($bd == 1){$sql = "INSERT INTO tipodocumento(documento) VALUES('$elemento')";}
		if($bd == 2){$sql = "INSERT INTO escolaridad(escolaridad) VALUES('$elemento')";}
		if($bd == 3){$sql = "INSERT INTO etnia(etnia) VALUES('$elemento')";}
		if($bd == 4){$sql = "INSERT INTO identidadgenero(genero) VALUES('$elemento')";}
		if($bd == 5){$sql = "INSERT INTO orientacionsexual(orientacion) VALUES('$elemento')";}
		if($bd == 6){$sql = "INSERT INTO tipopoblacion(poblacion) VALUES('$elemento')";}
		if($bd == 7){$sql = "INSERT INTO diagitslab(diagnostico) VALUES('$elemento')";}
		if($bd == 8){$sql = "INSERT INTO subreceptor(codigo, subreceptor) VALUES('$codigo', '$elemento')";}

		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				echo "Exito";
			}
		else
			{
				echo "Error";
			}
	}



if($accion == "BuscarRegistrosDatos")
	{
		$expedienter = $_GET['expedienter'];
		$fechar = $_GET['fechar'];

		$sql = "SELECT * FROM diagnosticos WHERE expedienteclinica = '$expedienter' AND fecha = '$fechar'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				while($fila = mysqli_fetch_assoc($result))
					{
						echo $fila['frascos'] . 		"*" .
								 $fila['rcreatinina'] . "*" .
								 $fila['rvih'] . 				"*" .
								 $fila['rsifilis'] . 		"*" .
								 $fila['rhbb'] . 				"*" .
								 $fila['rhbc'] . 				"*" .
								 $fila['rits'] . 				"*" .
								 $fila['filtradoGlom'] ."*" .
								 $fila['rprsifilis'] . 	"*" .
								 $fila['observaciones'];
					}
			}
	}




























































/* *********************************************************************************************************** */
/*                                       ACCIONES PARA LA VENTANA PUBLICACONES                                 */
/* *********************************************************************************************************** */
if($accion == "GuardarPublicacion")
	{
		$codigo = $_GET['codigo'];
		$categoria = $_GET['categoria'];
		$consultoria = $_GET['consultoria'];
		$carpeta = $_GET['carpeta'];
		$publicacion = $_GET['publicacion'];
		$fechainicio = date_format(date_create($_GET['fechainicio']), 'Y-m-d');
		$fechafin = date_format(date_create($_GET['fechafin']), 'Y-m-d');
		$partida = $_GET['partida'];
		$linpresupuestaria = $_GET['linpresupuestaria'];
		$monto = $_GET['monto'];
		$publicado = $_GET['publicado'];
		$adjudicado = $_GET['adjudicado'];
		$finalizada = $_GET['finalizada'];

		// BUSCA SI EL CODIGO Y EL NUMERO DE PUBLICACION YA EXISTE
		$sql = "SELECT * FROM publicacion WHERE codigo = '$codigo'";
		$result = mysqli_query($conexion, $sql);
		$registros = mysqli_affected_rows($conexion);
		if($registros > 0)
			{
				while($registro = mysqli_fetch_assoc($result))
					{
						$publica = $registro['nopublicacion'];
					}
				if($publica != $publicacion)
					{
						// EDITA LOS DATOS PARA EL CODIGO DE LA CONSULTORIA QUE FUE SELECCIONADA
						$sql2 = "UPDATE publicacion SET categoria = '$categoria', consultoria = '$consultoria', nopublicacion = $publicacion, fechainicio = '$fechainicio', fechafin = '$fechafin', partida = '$partida', linpresupuestaria = '$linpresupuestaria', monto = $monto, publicado = '$publicado', adjudicado = '$adjudicado', finalizado = '$finalizada' WHERE codigo = '$codigo'";
						$result2 = mysqli_query($conexion, $sql2);
						$registros2 = mysqli_affected_rows($conexion);
						if($registros2 > 0){echo "Exito 01";}else{echo "Error 01";}

						// ACTUALIZACION DE LA BASE DE DATOS historial
						$sql3 = "INSERT INTO historial(codigo, categoria, consultoria, nopublicacion, fechainicio, fechafin, partida, linpresupuestaria, monto, publicado, adjudicado) VALUES('$codigo', '$categoria', '$consultoria', $publicacion, '$fechainicio', '$fechafin', '$partida', '$linpresupuestaria', $monto, '$publicado', '$adjudicado')";
						$result3 = mysqli_query($conexion, $sql3);
					}
				else
					{
						// EDITA LOS DATOS PARA EL CODIGO DE LA CONSULTORIA QUE FUE SELECCIONADA
						$sql2 = "UPDATE publicacion SET categoria = '$categoria', consultoria = '$consultoria', fechainicio = '$fechainicio', fechafin = '$fechafin', partida = '$partida', linpresupuestaria = '$linpresupuestaria', monto = $monto, publicado = '$publicado', adjudicado = '$adjudicado', finalizado = '$finalizada' WHERE codigo = '$codigo'";
						$result2 = mysqli_query($conexion, $sql2);
						$registros2 = mysqli_affected_rows($conexion);
						if($registros2 > 0){echo "Exito 01";}else{echo "Error 01";}

						// INSERTA LA INFORMACION EN LA BASE DE DATOS historial
						$sql3 = "INSERT INTO historial(codigo, categoria, consultoria, nopublicacion, fechainicio, fechafin, partida, linpresupuestaria, monto, publicado, adjudicado) VALUES('$codigo', '$categoria', '$consultoria', $publicacion, '$fechainicio', '$fechafin', '$partida', '$linpresupuestaria', $monto, '$publicado', '$adjudicado')";
						$result3 = mysqli_query($conexion, $sql3);
					}
			}
		else
			{
				$sql4 = "INSERT INTO publicacion(codigo, categoria, consultoria, carpeta, nopublicacion, fechainicio, fechafin, partida, linpresupuestaria, monto, saldo, publicado, adjudicado, finalizado) VALUES('$codigo', '$categoria', '$consultoria', '$carpeta', $publicacion, '$fechainicio', '$fechafin', '$partida', '$linpresupuestaria', $monto, $monto, '$publicado', '$adjudicado', '$finalizada')";
				$result4 = mysqli_query($conexion, $sql4);
				$filas4 = mysqli_affected_rows($conexion);
				if($filas4 > 0)
					{
						echo "Exito 01";
						$micarpeta = '../fileadministrator/Backups/CONSULTORIAS/' . $carpeta;
						mkdir($micarpeta, 0700);
					}
				else
					{
						echo "Error 01";
					}

				// ACTUALIZACION DE LA BASE DE DATOS historial
				$sql5 = "INSERT INTO historial(codigo, categoria, consultoria, nopublicacion, fechainicio, fechafin, linpresupuestaria, monto, publicado, adjudicado) VALUES('$codigo', '$categoria', '$consultoria', $publicacion, '$fechainicio', '$fechafin', '$linpresupuestaria', $monto, '$publicado', '$adjudicado')";
				$result5 = mysqli_query($conexion, $sql5);
			}
	}

if($accion == "AgregarDocumento")
	{
		$codigo = $_GET['codigo'];
		$archivo = $_GET['archivo'];

		$sql2 = "UPDATE publicacion SET tdr = '$archivo' WHERE codigo = '$codigo'";
		$result2 = mysqli_query($conexion, $sql2);
	}


if($accion == 'BuscarPublicacion')
	{
		$correl = $_GET['correl'];

		$sql = "SELECT * FROM publicacion WHERE correlativo = $correl";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_num_rows($result);
		if($filas > 0)
			{
				while($fila = mysqli_fetch_assoc($result))
					{
						echo
							$fila['codigo']. "*" .
							$fila['categoria']. "*" .
							$fila['consultoria']. "*" .
							$fila['carpeta']. "*" .
							$fila['nopublicacion']. "*" .
							$fila['fechainicio']. "*" .
							$fila['fechafin']. "*" .
							$fila['partida']. "*" .
							$fila['monto']. "*" .
							$fila['publicado']. "*" .
							$fila['adjudicado']. "*" .
							$fila['finalizado']. "*" .
							$fila['tdr'];
					}
			}
	}












/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES PARA LA RECEPCIÓN Y CONTROL DE PROPUESTAS */
/* --------------------------------------------------------------------------------------------------------------- */
if($accion == "CargarPaginaPropuestas")
	{
		$codigo = $_GET['codigo'];
		$sql = "SELECT * FROM publicacion WHERE codigo = '$codigo'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_num_rows($result);
		if($filas > 0)
			{
				while($fila = mysqli_fetch_assoc($result))
					{
						echo $fila['correlativo'];
					}
			}
	}

if($accion == "GuardarDatosPropuestas")
	{
		$correlativo = $_GET['correlativo'];
		$codigo = $_GET['codigo'];
		$numero = $_GET['numero'];
		$consultor = $_GET['consultor'];
		$fecha = $_GET['fecha'];
		$hora = $_GET['hora'];

		$sql = "INSERT INTO propuestas(correlativo, codigo, numpropuesta, consultor, fecharecepcion, horarecepcion) VALUES($correlativo, '$codigo', $numero, '$consultor', '$fecha', '$hora')";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				if($numero >= 3)
					{
						$sql1 = "SELECT * FROM publicacion WHERE codigo = '$codigo'";
						$result1 = mysqli_query($conexion, $sql1);
						$filas1 = mysqli_num_rows($result1);
						if($filas1 > 0)
							{
								while($fila1 = mysqli_fetch_assoc($result1))
									{
										$nombre = $fila1['consultoria'];
									}
							}

						$msg = "DATOS DE LA CONSULTORÍA : ";
						$msg = $msg . " \n \n";
						$msg = $msg . " \n CÓDIGO No. : " . $codigo;
						$msg = $msg . " \n NOMBRE : " . $nombre;
						$msg = $msg . " \n \n";
						$msg = $msg . " \n Esta consultoría ya cuenta con 3 o más propuestas.";
						$msg = $msg . " \n \n";
						$msg = $msg . " \n Se recomienda programar una reunión, para evaluar los documentos recibidos.";
						$msg = $msg . " \n \n";
						$msg = $msg . " \n Atentamente, ";
						$msg = $msg . " \n \n";
						$msg = $msg . " \n Yesenia Mancilla";
						$msg = $msg . " \n Asistencia Subvención VIH-Fondo Mundial";
						$msg = $msg . " \n Instituto de Nutrición de Centroamérica y Panamá (INCAP)";

						$msg = wordwrap($msg, 255);

						If(mail("cbonilla@incap.int", "Programar reunión para evaluar propuestas." , $msg))
							{
								echo "Exito";
							}
						else
							{
								echo "Error1";
							}
					}
				else
					{
						echo "Exito";
					}
			}
		else
			{
				echo "Error2";
			}
	}













/* --------------------------------------------------------------------------------------------------------------- */
/* FUNCIONES PARA LA PROGRAMACION DE REUNIONES */
/* --------------------------------------------------------------------------------------------------------------- */
if($accion == "GuardarDatosReunion")
	{
		$correlativo = $_GET['correlativo'];
		$codigo = $_GET['codigo'];
		$fecha = date_format(date_create($_GET['fecha']), 'Y-m-d') ;
		$hora = $_GET['hora'];
		$correos = $_GET['correos'];
		$salon = $_GET['salon'];

		$sql = "INSERT INTO programacion(correlativo, codigo, fecharevision, horarevision, participantes, salon) VALUES($correlativo, '$codigo', '$fecha', '$hora', '$correos', '$salon')";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if($filas > 0)
			{
				$sql1 = "SELECT * FROM publicacion WHERE codigo = '$codigo'";
				$result1 = mysqli_query($conexion, $sql1);
				$filas1 = mysqli_num_rows($result1);
				if($filas1 > 0)
					{
						while($fila1 = mysqli_fetch_assoc($result1))
							{
								$nombre = $fila1['consultoria'];
							}
					}

				$msg = "DATOS DE LA CONSULTORÍA : ";
				$msg = $msg . " \n \n";
				$msg = $msg . " \n CÓDIGO No. : " . $codigo;
				$msg = $msg . " \n NOMBRE : " . $nombre;
				$msg = $msg . " \n \n";
				$msg = $msg . " \n Se les convoca a una reunión, con el objetivo de evaluar, las propuestas recibidas para esta consultoría.";
				$msg = $msg . " \n La reunión se llevará a cabo el ". date_format(date_create($fecha), 'd-m-Y') ." a las ". $hora ." en el salon ". $salon .".";
				$msg = $msg . " \n \n";
				$msg = $msg . " \n Se les agradece de antemano su puntualidad.";
				$msg = $msg . " \n \n";
				$msg = $msg . " \n Atentamente, ";
				$msg = $msg . " \n \n";
				$msg = $msg . " \n Adela Orozco";
				$msg = $msg . " \n Especialista en Adquisición  y Logística";
				$msg = $msg . " \n Subvención VIH-Fondo Mundial";
				$msg = $msg . " \n Unidad de Planificación";
				$msg = $msg . " \n Instituto de Nutrición de Centroamérica y Panamá (INCAP)";

				$msg = wordwrap($msg, 255);

				If(mail('"' . $correos . '"', "Programar reunión para evaluar propuestas." , $msg))
					{
						echo "Exito";
					}
				else
					{
						echo "Error1";
					}
			}
		else
			{
				echo "Error2";
			}
	}
















































































if($accion == "CambiarContrasena")
	{
		$username = $_GET['username'];
		$password1 = $_GET['password1'];

		$sql = "Select * From usuarios Where nombre = '$username'";
		$result = mysqli_query($conexion, $sql);
		$afectadas = mysqli_affected_rows($conexion);
		if($afectadas > 0)
			{
				$sql = "UPDATE usuarios SET password = '" . password_hash($password1, PASSWORD_DEFAULT) . "' WHERE nombre = '$username'";
				$result = mysqli_query($conexion, $sql);
				$afectadas = mysqli_affected_rows($conexion);
				if($afectadas > 0)
					{

					}
				else
					{
						echo 1;
					}
			}
	}

if($accion == "buscarPaciente"){
	$nombre 	= $_GET["nombre"];
	$apellido = $_GET["apellido"];
	$dpi 			= $_GET["dpi"];
	$salida = "";

	$sql = "SELECT * FROM generales WHERE documento='$dpi' OR nombres= '$nombre' OR apellidos = '$apellido'";
	$result = mysqli_query($conexion, $sql);
	$filas = mysqli_affected_rows($conexion);
			while($fila = mysqli_fetch_assoc($result))
				{
				echo
				"<tr>
				<td>" . $fila['expedienteclinica'] . "</td>
				<td>" . $fila['nombres'] .           "</td>
				<td>" . $fila['apellidos'] .         "</td>
				<td>" . $fila['documento'] .         "</td>
				<td>" . $fila['subreceptor'] .         "</td>
				<td>
				<a href='#' style='color: blue;'  onclick='CargarHistorial(`" . $fila['expedienteclinica'] . "`);'>
				<center><span class='glyphicon glyphicon-list'></span> Historial</center>
				</a>
				</td>

				</tr>";
				}
			}

if($accion == "deshabilitar"){
		$expediente1 = $_GET["expediente1"];
		$sql = "UPDATE generales SET estado='INACTIVO' WHERE expedienteclinica = '$expediente1'";
		$result = mysqli_query($conexion, $sql);
		$filas = mysqli_affected_rows($conexion);
		if ($filas > 0) {
			echo "Exito";
		} else {
			echo "Error";
		}
	}

	if($accion == "trasladar"){
			$expediente1 = $_GET["expediente1"];
			$expediente2 = $_GET["expediente2"];
			$sql = "UPDATE generales SET estado='ACTIVO', subreceptor='$expediente2' WHERE expedienteclinica = '$expediente1'";
			$result = mysqli_query($conexion, $sql);
			$filas = mysqli_affected_rows($conexion);
			if ($filas > 0) {
				echo "Exito";
			} else {
				echo "Error";
			}
		}




	clearstatcache();
	mysqli_close($conexion);
?>

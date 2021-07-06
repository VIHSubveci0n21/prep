<?php
	header('Content-Type: text/html; charset=UTF-8');
	date_default_timezone_set("America/Guatemala");
	session_start();

	include_once('../../conexion.php');

?>

<script type="text/javascript">

$(document).ready(function()
  {
    //FORMATO DE MASCARAS
    $('#expedienteclinica').mask('000000', {placeholder: '######'});
    $('#expedientevicit').mask('00000', {placeholder: '#####'});
    $('#numerocui').mask('9999 99999 9999', {placeholder: '0000 00000 0000'});
    $('#cuiconstruido').mask('S00000000000SSSS', {placeholder: 'A###########AAAA'});
  });
</script>

<div id="tope"></div>

<div class="registros">

	<div class="row">
<!-- *** COLUMNA IZQUIERDA ** -->
		<div class="col-md-7">
			<div class="contenedor04">
				<form id="frmgenerales" name="frmgenerales" method="POST" action="javascript: GuardarDatosUsuarioClinica();">
					<table  class="colapsada sinbordes zebra_azul table table-bordered" style="width: 100%; margin-top: 5px;">
						<thead>
							<tr>
								<th colspan="3" style="width: 50%;">DATOS GENERALES DEL PACIENTE</th>
							</tr>
						</thead>
						<tbody>

							<input type="hidden" id="subreceptor" name="subreceptor" value="<?php echo $_SESSION['subreceptor']; ?>">
		<!-- DATOS DE LA CLINICA -->
							<tr>
								<td>CLINICA EN LA QUE ES REGISTRADO </td>
								<td><input type="radio" id="clinicaprep" name="clinicapp" value="PREP" class="mayusculas"> PREP </td>
								<td><input type="radio" id="clinicapep"  name="clinicapp" value="PEP"  class="mayusculas"> PEP </td>
							</tr>
							<tr>
								<td>TIPO DE USUARIO </td>
								<td colspan="2">
									<select id="tipousuario" name="tipousuario" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<option value="NUEVO">NUEVO</option>
										<option value="TRASLADO">TRASLADO</option>
									</select>
								</td>
							</tr>
							<!-- DATOS DE IDENTIFICACION DEL USUARIO -->
												<tr>
													<td>TIPO DE DOCUMENTO DE IDENTIFICACION </td>
													<td colspan="2">
														<select id="tipodocumento" name="tipodocumento" style="width: 95%;" class="mayusculas" required>
															<option value="0">...</option>
															<?php
																$sql = "SELECT * FROM tipodocumento";
																$result = mysqli_query($conexion, $sql);
																$filas = mysqli_affected_rows($conexion);
																if($filas > 0)
																	{
																		while($fila = mysqli_fetch_assoc($result))
																			{
																				echo '<option value="' . $fila['documento'] . '">' . $fila['documento'] . '</option>';
																			}
																	}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td>CODIGO UNICO DE IDENTIFICACION (CUI) </td>
													<td colspan="2"><input type="text" id="numerocui" name="numerocui" style="color: #1d5288; width: 95%;" class="mayusculas"></td>
												</tr>
							<tr>
								<td>NUMERO DE EXPEDIENTE DE LA CLINICA </td>
								<td colspan="2"><input type="text" id="expedienteclinica" name="expedienteclinica" style="color: #1d5288; width: 95%;" class="mayusculas" required></td>
							</tr>
							<tr>
								<td>NUMERO DE EXPEDIENTE DE LA VICIT </td>
								<td colspan="2"><input type="text" id="expedientevicit" name="expedientevicit" style="color: #1d5288; width: 95%;" class="mayusculas"></td>
							</tr>

		<!-- DATOS DE LA PERSONA -->
							<tr>
								<td>NOMBRES</td>
								<td colspan="2"><input type="text" id="nombres" name="nombres" style="color: #1d5288; width: 95%;" class="mayusculas" required></td>
							</tr>
							<tr>
								<td>APELLIDOS</td>
								<td colspan="2"><input type="text" id="apellidos" name="apellidos" style="color: #1d5288; width: 95%;" class=" mayusculas" required></td>
							</tr>
							<tr>
								<td>FECHA DE NACIMIENTO </td>
								<td colspan="2"><input type="date" id="fechanacimiento" name="fechanacimiento" onchange="calcularanio();" class="mayusculas" required></td>
							</tr>
							<tr>
								<td>EDAD EN A&Ntilde;OS CUMPLIDOS </td>
								<td colspan="2"><input type="text" id="edad" name="edad" style="color: #1d5288; width: 95%;" disabled  required></td>
							</tr>
							<tr>
								<td>SEXO AL NACER </td>
								<td colspan="2">
									<select id="sexonacer" name="sexonacer" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<option value="MASCULINO">MASCULINO</option>
										<option value="FEMENINO">FEMENINO</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>PUEBLO </td>
								<td colspan="2">
									<select id="etnia" name="etnia" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM etnia";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['etnia'] . '">' . $fila['etnia'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>ESCOLARIDAD </td>
								<td colspan="2">
									<select id="escolaridad" name="escolaridad" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM escolaridad";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['escolaridad'] . '">' . $fila['escolaridad'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>CODIGO CONSTRUIDO </td>
								<td colspan="2"><input type="text" id="cuiconstruido" name="cuiconstruido" onfocus="ConstruirCUI();" style="color: #1d5288; width: 95%;" class="mayusculas" required readonly></td>
							</tr>
		<!-- DATOS GEOGRAFICOS DE NACIMIENTO -->
							<tr>
								<td>PAIS DE NACIMIENTO </td>
								<td colspan="2">
									<select id="paisnacimiento" name="paisnacimiento" style="width: 95%;" class="mayusculas" onchange="LlenarComboDepartamento();" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM paises ORDER BY codigo ASC";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['codigo'] . '">' . $fila['pais'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>DEPARTAMENTO DE NACIMIENTO </td>
								<td colspan="2">
									<select id="deptonacimiento" name="deptonacimiento" style="width: 95%;" class="mayusculas" onchange="LlenarComboMunicipio();"></select>
								</td>
							</tr>
							<tr>
								<td>MUNICIPIO DE NACIMIENTO </td>
								<td colspan="2">
									<select id="muninacimiento" name="muninacimiento" style="width: 95%;" class="mayusculas"></select>
								</td>
							</tr>



		<!-- DATOS GEOGRAFICOS DE RESIDENCIA -->
							<tr>
								<td>PAIS DE RESIDENCIA </td>
								<td colspan="2">
									<select id="paisresidencia" name="paisresidencia" style="width: 95%;" class="mayusculas" onchange="LlenarComboDepartamento2();" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM paises ORDER BY codigo ASC";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['codigo'] . '">' . $fila['pais'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>DEPARTAMENTO DE RESIDENCIA </td>
								<td colspan="2">
									<select id="deptoresidencia" name="deptoresidencia" style="width: 95%;" class="mayusculas" onchange="LlenarComboMunicipio2();"></select>
								</td>
							</tr>
							<tr>
								<td>MUNICIPIO DE RESIDENCIA </td>
								<td colspan="2">
									<select id="muniresidencia" name="muniresidencia" style="width: 95%;" class="mayusculas"></select>
								</td>
							</tr>
							<tr>
								<td>DIRECCI&Oacute;N </td>
								<td colspan="2"><input type="text" id="direccion" name="direccion" style="color: #1d5288; width: 95%;" class="mayusculas"></td>
							</tr>
							<tr>
								<td>TEL&Eacute;FONO </td>
								<td colspan="2">
									<input type="tel" id="telefono" name="telefono" style="color: #1d5288; width: 95%;" pattern="[0-9]{8}" max="8" title="El numero de telefono debe ser de 8 digitos">
								</td>
							</tr>

							<tr>
								<td>CORREO ELECTRONICO </td>
								<td colspan="2"><input type="email" id="email" name="email" style="color: #1d5288; width: 95%;" class="minusculas" placeholder="usuario@servidor.com"></td>
							</tr>
							<tr>
								<td>OTRO MEDIO DE COMUNICACI&Oacute;N </td>
								<td colspan="2"><input type="text" id="otromedio" name="otromedio" style="color: #1d5288; width: 95%;" class="mayusculas"></td>
							</tr>
							<tr>
								<td>POBLACI&Oacute;N CLAVE </td>
								<td colspan="2">
									<select id="poblacion" name="poblacion" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM tipopoblacion";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['poblacion'] . '">' . $fila['poblacion'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>ORIENTACI&Oacute;N SEXUAL </td>
								<td colspan="2">
									<select id="orientacion" name="orientacion" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM orientacionsexual ORDER BY orientacion ASC";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['orientacion'] . '">' . $fila['orientacion'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>IDENTIDAD DE G&Eacute;NERO </td>
								<td colspan="2">
									<select id="genero" name="genero" style="width: 95%;" class="mayusculas" required>
										<option value="0">...</option>
										<?php
											$sql = "SELECT * FROM identidadgenero ORDER BY genero ASC";
											$result = mysqli_query($conexion, $sql);
											$filas = mysqli_affected_rows($conexion);
											if($filas > 0)
												{
													while($fila = mysqli_fetch_assoc($result))
														{
															echo '<option value="' . $fila['genero'] . '">' . $fila['genero'] . '</option>';
														}
												}
										?>
									</select>
								</td>
							</tr>
							<input type="hidden" id="estado" name="estado" value="ACTIVO">

<!-- BOTONES -->
							<tr>
								<?php
									if($_SESSION['usuarios'] == "SI")
									{
								?>
										<td colspan="3"><center><input type="submit" id="guardar" name="guardar" value="GUARDAR" class="btn btn-info" style="width: 75%; color: #000;"></center></td>
								<?PHP
									}
								?>

							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>

<!-- *** COLUMNA DERECHA ** -->
		<div class="col-md-5">
			<div class="contenedor02">
<!-- HISTORIAL DE CITAS -->
				<table  class="colapsada sinbordes zebra_azul table table-bordered" style="width: 100%; margin-top: 5px;">
					<thead>
						<tr>
							<th colspan="3" style="width: 50%;">HISTORIAL DE CITAS</th>
						</tr>
						<tr>
							<th><center>FECHA</center></th>
							<th><center>ASISTIO</center></th>
							<th><center>ORGANIZACION</center></th>
						</tr>
					</thead>
					<tbody id="cuerpotablacitas">
					</tbody>
				</table>

				<br><br><br>
<!-- REGISTRAR PROXIMA CITA -->
				<form id="frmproximacita" name="frmproximacita" method="POST" action="javascript: GuardarNuevaCita();"></form>
					<table  class="colapsada sinbordes zebra_azul table table-bordered" style="width: 100%; margin-top: 5px;">
						<thead>
							<tr>
								<th colspan="2" style="width: 50%;"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									if($_SESSION['laboratorios'] == "SI")
									{
								?>
										<td colspan="2"><center><input type="button" name="registruusuario" id="registruusuario" class="btn btn-info" value="REGISTRO DE LABORATORIOS" onclick='CargarExpediente(`2`,`1`)' style="color: #000;"></center></td>
								<?php
									}
								?>

							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	function Edad(FechaNacimiento) {
	var fechaNace = new Date(FechaNacimiento);
	var fechaActual = new Date()
	var mes = fechaActual.getMonth();
	var dia = fechaActual.getDate();
	var año = fechaActual.getFullYear();
	fechaActual.setDate(dia);
	fechaActual.setMonth(mes);
	fechaActual.setFullYear(año);
	edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
	return edad;
	}

    function calcularanio(){
    var nacimiento = document.getElementById('fechanacimiento').value;
    var calculado = Edad(nacimiento);
		if(calculado < 18) {
			document.getElementById('edad').value = "Menor de edad";
		} else if(calculado > 100){
			document.getElementById('edad').value = "Edad fuera de rango";
		} else {
			document.getElementById('edad').value = calculado;
		}


    }

	</script>
	<br><br><br><br>
</div>

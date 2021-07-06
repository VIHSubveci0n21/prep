<?php
    session_start();

    include_once('../../conexion.php');

    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set("America/Guatemala");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>CONFIGURACION DE USUARIOS</title>
	</head>


	<body>
		<form name="ControlUsuarios" method="POST" action="javascript: GuardarUsuariosSistema();">
			<table class="table table-condensed table-striped table-responsive table-bordered" style="width: 90%; margin: 0 auto;">
				<thead>
					<tr>
						<th colspan="2">ADMINISTRACION DE USUARIOS</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width: 50%;">LISTADO DE USUARIOS REGISTRADOS</td>
						<td style="width: 50%;">
							<select id="ListadoUsuarios" class="form-control" onchange="BuscarUsuarioSistema();">
								<option value=""></option>
								<?php
									$sql = "SELECT * FROM usuarios ORDER BY nombre ASC";
									$result = mysqli_query($conexion, $sql);
									$filas = mysqli_affected_rows($conexion);
									if($filas > 0)
										{
											while($fila = mysqli_fetch_assoc($result))
												{
													echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
												}
										}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>IDENTIFICADOR</td>
						<td><input type="text" name="id" id="id" class="form-control" readonly></td>
					</tr>
					<tr>
						<td>NOMBRE DE LA ORGANIZACION</td>
						<td>
							<input type="text" name="organizacion" id="organizacion" class="form-control" placeholder="INCAP"  required>
						</td>
					</tr>
          <tr>
            <td>SUBRECEPTOR</td>
            <td colspan="2">
              <select id="subreceptor" name="subreceptor" style="width: 95%;" class="mayusculas" required>
                <option value="0">...</option>
                <?php
                $sql = "SELECT * FROM subreceptor";
                $result = mysqli_query($conexion, $sql);
                $filas = mysqli_affected_rows($conexion);
                if($filas > 0) {
                  while($fila = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $fila['subreceptor'] . '">' . $fila['subreceptor'] . '</option>';
                    }
                  }
                ?>
              </select>
            </td>
          </tr>
					<tr>
						<td>NOMBRE DE USUARIO</td>
						<td>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>NOMBRE COMPLETO</td>
						<td><input type="text" name="ncompleto" id="ncompleto" class="form-control" required></td>
					</tr>
					<tr>
						<td>CONTRASEÑA</td>
						<td><input type="password" name="password1" id="password1" class="form-control"></td>
					</tr>
					<tr>
						<td>CONFIRMAR CONTRASEÑA</td>
						<td><input type="password" name="password2" id="password2" class="form-control"></td>
					</tr>
					<tr>
						<td>CARGO</td>
						<td>
							<select class="form-control" name="cargo" id="cargo" required>
								<option value="ADMINISTRADOR">ADMINISTRADOR</option>
								<option value="MEDICO">MEDICO</option>
								<option value="USUARIO">USUARIO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>ACCESO A REGISTRO DE BENEFICIARIOS</td>
						<td>
							<select name="registros" id="registros" class="form-control" required>
								<option value="0">..</option><option value="SI">SI</option><option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>ACCESO A CONTROL DE CITAS</td>
						<td>
							<select name="citas" id="citas" class="form-control" required>
								<option value="0">..</option><option value="SI">SI</option><option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>ACCESO A LABORATORIOS</td>
						<td>
							<select name="laboratorios" id="laboratorios" class="form-control" required>
								<option value="0">..</option><option value="SI">SI</option><option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>ACCESO A REPORTERIA</td>
						<td>
							<select name="reportes" id="reportes" class="form-control" required>
								<option value="0">..</option><option value="SI">SI</option><option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>ACCESO A CONFIGURACION</td>
						<td>
							<select name="configuracion" id="configuracion" class="form-control" required>
								<option value="0">..</option><option value="SI">SI</option><option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>EDITAR DATOS DE LOS USUARIOS</td>
						<td>
							<select name="usuarios" id="usuarios" class="form-control" required>
								<option value="0">..</option><option value="SI">SI</option><option value="NO">NO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>ESTADO</td>
						<td>
							<select name="estado" id="estado" class="form-control" required>
                <option selected="true" value="ALTA">ALTA</option>
                <option value="BAJA">BAJA</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="button" name="borrar" id="borrar" class="btn btn-danger form-control" value="ELIMINAR DATOS" onclick="EliminarUsuariosSistema();"></td>
						<td><input type="submit" name="guardar" id="guardar" class="btn btn-primary form-control" value="GUARDAR DATOS" onclick="return confirm('¿Estás seguro que deseas guardar?')"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="reset" name="limpiar" id="limpiar" class="btn btn-warning form-control" value="LIMPIAR FORMULARIO"></td>
					</tr>
				</tbody>
			</table>
		</form>

		<br><br>
	</body>
</html>

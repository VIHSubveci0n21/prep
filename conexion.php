<?php
$servidor = "localhost";
$user = "root";
$pass = "";
$bd = "prep_pep";
$conexion = mysqli_connect($servidor, $user, "", $bd);
if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
	$conexion = mysqli_connect($servidor, $user, $pass, $bd);
 	$conexion->set_charset("utf8");

?>

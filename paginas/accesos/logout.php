<?php
	session_start();

	unset($_SESSION['nombreusuario']);
	unset($_SESSION['nombre']);
	unset($_SESSION['password']);
	unset($_SESSION['registros']);
	unset($_SESSION['citas']);
	unset($_SESSION['laboratorios']);
	unset($_SESSION['reportes']);
	unset($_SESSION['configuracion']);
	unset($_SESSION['estado']);

	session_destroy();
	header("Location: ../../index.php");
	exit;
?>
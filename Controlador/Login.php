<?php

session_start();


require_once("../modelo/ManejadorUsuario.php");

if(
	isset($_POST['opcion']) && $_POST['opcion'] == 1
){

	$co_correo = $_POST['co_correo'];
	$co_contraseña = $_POST['co_contraseña'];

	$man = new ManejadorUsuario();

	$condicion = "co_correo = '$co_correo' and co_contraseña = '$co_contraseña'";
	$datos = $man->obtenerListaUsuario($condicion);

	if(count($datos) == 0){
		$mensaje = "Este usuario no esta registrado en el sistema";
	}else{

		$usuario = $datos[0];
		$nu_usuario = $usuario->getNu_usuario();
		$nb_usuario = $usuario->getNb_usuario();

		$_SESSION['nu_usuario'] = $nu_usuario;
		$_SESSION['nb_usuario'] = $nb_usuario;
		$_SESSION['co_correo'] = $co_correo;

		$mensaje = "Bienvenido al sistema Sr(a). $nb_usuario, Haga click en el control para observar nuestro catálogo";

	}

}


require_once("../vista/login.php");

?>
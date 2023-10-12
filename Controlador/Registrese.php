<?php

require_once("../modelo/ManejadorUsuario.php");


if(
	isset($_POST['opcion']) && $_POST['opcion'] == 1
){

	$nb_usuario = $_POST['nb_usuario'];
	$co_correo = $_POST['co_correo'];
	$co_contraseña = $_POST['co_contraseña'];
	$nu_cedula = $_POST['nu_cedula'];

	$usuario = new Usuario();
	$usuario->setNb_usuario($nb_usuario);
	$usuario->setCo_correo($co_correo);
	$usuario->setCo_contraseña($co_contraseña);
	$usuario->setNu_cedula($nu_cedula);

	$man = new ManejadorUsuario();

	$res = $man->insertarUsuario($usuario);
	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";
	
}


require_once("../vista/registrese.php");

?>
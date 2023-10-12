<?php

session_start();

if(isset($_SESSION['nu_usuario'])){
	$nu_usuario = $_SESSION['nu_usuario'];
}else{
	header("location: Catalogo.php");
}


if(
	isset($_POST['enviar']) && $_POST['enviar'] == 1
){

	
	require_once("../modelo/ManejadorPago.php");

	$nu_pago = $_POST['nu_pago'];
	$in_envio = $_POST['in_envio'];
	$fecha_actual = date("Y-m-d");

	$pago = new Pago();
	$pago->setNu_usuario($nu_usuario);
	$pago->setNu_pago($nu_pago);
	$pago->setIn_envio($in_envio);
	$pago->setFe_envio($fecha_actual);

	$manpago = new ManejadorPago();
	$manpago->modificarPago($pago);

}



require_once("../modelo/ManejadorMinucia_pago.php");

$manminucia = new ManejadorMinucia_pago();

$cond = "nu_usuario = $nu_usuario and in_envio = 'P'";
$lista = $manminucia->obtenerListaMinucia_pago($cond);




require_once("../vista/ver_envio.php");

?>
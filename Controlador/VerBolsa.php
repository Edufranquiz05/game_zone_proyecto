<?php

session_start();

if(isset($_SESSION['nu_usuario'])){
	$nu_usuario = $_SESSION['nu_usuario'];
}else{
	header("location: Catalogo.php");
}


require_once("../modelo/ManejadorBolsa.php");
require_once("../modelo/ManejadorPago.php");
require_once("../modelo/ManejadorMinucia_pago.php");

$manbolsa = new ManejadorBolsa();


if(
	isset($_POST['pago']) && $_POST['pago'] == 1
){

	
	$manpago = new ManejadorPago();
	$cond = "nu_usuario = $nu_usuario and in_envio = 'C'";

	$pagos = $manpago->obtenerListaPago($cond);
	if(count($pagos) > 0){

		
		$pago = $pagos[0];
		$nu_pago = $pago->getNu_pago();

	}else{

		
		$pago = new Pago();
		$pago->setNu_usuario($nu_usuario);
		$pago->setIn_envio('C');

		$res = $manpago->insertarPago($pago);
		if($res){

			$pagos = $manpago->obtenerListaPago($cond);
			$pago = $pagos[0];
			$nu_pago = $pago->getNu_pago();

		}

	} 

	
	$nu_articulo = $_POST['nu_articulo'];
	$ca_articulo = $_POST['ca_articulo'];

	$manminucia = new ManejadorMinucia_pago();

	$minucia = new Minucia_pago();
	$minucia->setNu_pago($nu_pago);
	$minucia->setNu_articulo($nu_articulo);
	$minucia->setCa_articulo($ca_articulo);

	$res = $manminucia->insertarMinucia_pago($minucia);
	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";


	
	$sql = "update articulo set ca_existencias = ca_existencias - $ca_articulo" .
		" where nu_articulo = $nu_articulo";
	$db = new ConexionMysql();
	$db->runQuery($sql);


	
	$manbolsa->eliminarBolsa($nu_usuario, $nu_articulo);


} 



if(
	isset($_POST['eliminar']) && $_POST['eliminar'] == 1
){

	
	$nu_articulo = $_POST['nu_articulo'];

	$res = $manbolsa->eliminarBolsa($nu_usuario, $nu_articulo);
	if($res)
		$mensaje = "Datos eliminados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";
	
}


$condicion = "nu_usuario = $nu_usuario";
$lista = $manbolsa->obtenerListaBolsa($condicion);



require_once("../vista/ver_bolsa.php");

?>
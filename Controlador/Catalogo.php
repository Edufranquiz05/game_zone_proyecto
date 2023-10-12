<?php

session_start();


require_once("../modelo/ManejadorClases.php");
require_once("../modelo/ManejadorBolsa.php");

$mancla = new ManejadorClases();
$combo = $mancla->comboClases();


if(
	isset($_POST['opcion']) && $_POST['opcion'] == 1
){

	
	$manbolsa = new ManejadorBolsa();

	$nu_articulo = $_POST['nu_articulo'];
	$nu_usuario = $_SESSION['nu_usuario'];

	$bolsa = new Bolsa();
	$bolsa->setNu_usuario($nu_usuario);
	$bolsa->setNu_articulo($nu_articulo);

	$res = $manbolsa->insertarBolsa($bolsa);

}


require_once("../vista/catalogo.php");

?>
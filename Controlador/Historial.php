<?php

session_start();

if(isset($_SESSION['nu_usuario'])){
	$nu_usuario = $_SESSION['nu_usuario'];
}else{
	header("location: Catalogo.php");
}




require_once("../modelo/ConexionMysql.php");

$conex = new ConexionMysql();

$cond = "nu_usuario = $nu_usuario";
$sql = "select * from view_historial_pago where $cond";
$lista = $conex->runSelect($sql);


require_once("../vista/historial.php");

?>
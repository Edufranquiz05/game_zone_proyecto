<?php

require_once "ConexionMysql.php";
require_once "Pago.php";


require_once "Usuario.php";




class ManejadorPago {

public function insertarPago (Pago $m) {
	$db = new ConexionMysql();
	$query="INSERT INTO pago (nu_usuario, fe_pago, in_envio, fe_envio) VALUES (" . 
	"'" . $m->getNu_usuario() . "'" . 
	", now()" . 
	", " . "'" . $m->getIn_envio() . "'" . 
	", null" . 
	")";
	$result = $db->runQuery($query);

	return $result;

}


public function modificarPago (Pago $m) {
	$db = new ConexionMysql();
	$query="UPDATE pago SET nu_usuario='" . $m->getNu_usuario() . "'" . 
	", " . "fe_pago='" . $m->getFe_pago() . "'" . 
	", " . "in_envio='" . $m->getIn_envio() . "'" . 
	", " . "fe_envio='" . $m->getFe_envio() . "'" . 
	" WHERE 1=1 AND nu_pago='" . $m->getNu_pago() . "'";

	$result = $db->runQuery($query);

	return $result;

}


public function eliminarPago ($nu_pago) {
	$db = new ConexionMysql();
	$query="DELETE FROM pago WHERE 1=1 AND nu_pago='" . $nu_pago . "'";

	$result = $db->runQuery($query);

	return $result;

}


public function buscarPago ( $nu_pago ) {
	$pago = new Pago();
	$db = new ConexionMysql();
	$query="SELECT nu_pago, nu_usuario, fe_pago, in_envio, fe_envio, " .
	"nb_usuario, co_correo, co_contraseña, nu_cedula " .
	"FROM view_pago WHERE nu_pago='" . $nu_pago . "'";

	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;

		
		$usuario = new Usuario();

		$usuario->setNu_usuario($result[$x]["nu_usuario"]);
		$usuario->setNb_usuario($result[$x]["nb_usuario"]);
		$usuario->setCo_correo($result[$x]["co_correo"]);
		$usuario->setCo_contraseña($result[$x]["co_contraseña"]);
		$usuario->setNu_cedula($result[$x]["nu_cedula"]);

		$pago->setNu_pago($result[$x]["nu_pago"]);
		$pago->setNu_usuario($result[$x]["nu_usuario"]);
		$pago->setFe_pago($result[$x]["fe_pago"]);
		$pago->setIn_envio($result[$x]["in_envio"]);
		$pago->setFe_envio($result[$x]["fe_envio"]);

		$pago->setUsuario($usuario);

	}

	return $pago;

}


public function obtenerListaPago($condicion='1=1') {
	$arreglo=array();
	$db = new ConexionMysql();
	$query="SELECT nu_pago, nu_usuario, fe_pago, in_envio, fe_envio, " .
	"nb_usuario, co_correo, co_contraseña, nu_cedula " .
	"FROM view_pago WHERE $condicion";

	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		
		$usuario = new Usuario();

		$usuario->setNu_usuario($result[$x]["nu_usuario"]);
		$usuario->setNb_usuario($result[$x]["nb_usuario"]);
		$usuario->setCo_correo($result[$x]["co_correo"]);
		$usuario->setCo_contraseña($result[$x]["co_contraseña"]);
		$usuario->setNu_cedula($result[$x]["nu_cedula"]);



		$pago = new Pago();

		$pago->setNu_pago($result[$x]["nu_pago"]);
		$pago->setNu_usuario($result[$x]["nu_usuario"]);
		$pago->setFe_pago($result[$x]["fe_pago"]);
		$pago->setIn_envio($result[$x]["in_envio"]);
		$pago->setFe_envio($result[$x]["fe_envio"]);

		$pago->setUsuario($usuario);

		array_push($arreglo,$pago);

	}

	return $arreglo;

}


} 

?>

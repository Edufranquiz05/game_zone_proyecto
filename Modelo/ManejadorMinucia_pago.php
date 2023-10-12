<?php

require_once "ConexionMysql.php";
require_once "Minucia_pago.php";


require_once "Pago.php";
require_once "Usuario.php";
require_once "Articulo.php";
require_once "Clases.php";




class ManejadorMinucia_pago {

public function insertarMinucia_pago (Minucia_pago $m) {
	$db = new ConexionMysql();
	$query="INSERT INTO minucia_pago (nu_pago,nu_articulo,ca_articulo,fe_minucia) VALUES (" . 
	"'" . $m->getNu_pago() . "'" . 
	", " . "'" . $m->getNu_articulo() . "'" . 
	", " . "'" . $m->getCa_articulo() . "'" . 
	", now()" . 
	")";

	$result = $db->runQuery($query);
	
	return $result;

}


public function modificarMinucia_pago (Minucia_pago $m) {
	$db = new ConexionMysql();
	$query="UPDATE minucia_pago SET nu_pago='" . $m->getNu_pago() . "'" . 
	", " . "nu_articulo='" . $m->getNu_articulo() . "'" . 
	", " . "ca_articulo='" . $m->getCa_articulo() . "'" . 
	" WHERE 1=1 AND nu_minucia='" . $m->getNu_minucia() . "'";

	$result = $db->runQuery($query);

	return $result;

}


public function eliminarMinucia_pago ($nu_minucia) {
	$db = new ConexionMysql();
	$query="DELETE FROM minucia_pago WHERE 1=1 AND nu_minucia='" . $nu_minucia . "'";

	$result = $db->runQuery($query);
	
	return $result;

}


public function buscarMinucia_pago ( $nu_minucia ) {
	$minucia_pago = new Minucia_pago();
	$db = new ConexionMysql();
	$query="SELECT nu_minucia, ca_articulo, fe_minucia, " .
	"nu_pago, nu_usuario, fe_pago, in_envio, fe_envio, " .
	"nb_usuario, co_correo, co_contraseña, nu_cedula, " .
	"nu_articulo, nb_articulo, de_articulo, ca_existencias, va_costo, nu_clase, nb_clase " .
	"FROM view_minucia_pago WHERE 1=1 AND nu_minucia='" . $nu_minucia . "'";

	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;

		
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

		
		$clases = new Clases();
		$clases->setNu_clase($result[$x]["nu_clase"]);
		$clases->setNb_clase($result[$x]["nb_clase"]);


		$articulo = new Articulo();
		$articulo->setNu_articulo($result[$x]["nu_articulo"]);
		$articulo->setNb_articulo($result[$x]["nb_articulo"]);
		$articulo->setDe_articulo($result[$x]["de_articulo"]);
		$articulo->setCa_existencias($result[$x]["ca_existencias"]);
		$articulo->setVa_costo($result[$x]["va_costo"]);
		$articulo->setNu_clase($result[$x]["nu_clase"]);
		$articulo->setNb_imagen($result[$x]["nb_imagen"]);

		$articulo->setClases($clases);

		
		$minucia_pago->setNu_minucia($result[$x]["nu_minucia"]);
		$minucia_pago->setNu_pago($result[$x]["nu_pago"]);
		$minucia_pago->setNu_articulo($result[$x]["nu_articulo"]);
		$minucia_pago->setCa_articulo($result[$x]["ca_articulo"]);
		$minucia_pago->setFe_minucia($result[$x]["fe_minucia"]);

		$minucia_pago->setPago($pago);
		$minucia_pago->setArticulo($articulo);

	}

	return $minucia_pago;

}


public function obtenerListaMinucia_pago($condicion='1=1') {
	$arreglo=array();
	$db = new ConexionMysql();
	$query="SELECT nu_minucia, ca_articulo, fe_minucia, " .
	"nu_pago, nu_usuario, fe_pago, in_envio, fe_envio, " .
	"nb_usuario, co_correo, co_contraseña, nu_cedula, " .
	"nu_articulo, nb_articulo, de_articulo, ca_existencias, va_costo, nu_clase, nb_clase, nb_imagen " .
	"FROM view_minucia_pago WHERE $condicion";


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

		
		$clases = new Clases();
		$clases->setNu_clase($result[$x]["nu_clase"]);
		$clases->setNb_clase($result[$x]["nb_clase"]);


		$articulo = new Articulo();
		$articulo->setNu_articulo($result[$x]["nu_articulo"]);
		$articulo->setNb_articulo($result[$x]["nb_articulo"]);
		$articulo->setDe_articulo($result[$x]["de_articulo"]);
		$articulo->setCa_existencias($result[$x]["ca_existencias"]);
		$articulo->setVa_costo($result[$x]["va_costo"]);
		$articulo->setNu_clase($result[$x]["nu_clase"]);
		$articulo->setNb_imagen($result[$x]["nb_imagen"]);

		$articulo->setClases($clases);

	
		$minucia_pago = new Minucia_pago();

		$minucia_pago->setNu_minucia($result[$x]["nu_minucia"]);
		$minucia_pago->setNu_pago($result[$x]["nu_pago"]);
		$minucia_pago->setNu_articulo($result[$x]["nu_articulo"]);
		$minucia_pago->setCa_articulo($result[$x]["ca_articulo"]);
		$minucia_pago->setFe_minucia($result[$x]["fe_minucia"]);

		$minucia_pago->setPago($pago);
		$minucia_pago->setArticulo($articulo);


		array_push($arreglo,$minucia_pago);

	}

	return $arreglo;

}


} 

?>
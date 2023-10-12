<?php

require_once "ConexionMysql.php";
require_once "Bolsa.php";


require_once "Usuario.php";
require_once "Articulo.php";
require_once "Clases.php";




class ManejadorBolsa {

public function insertarBolsa (Bolsa $m) {
	$db = new ConexionMysql();
	$query="INSERT INTO bolsa (nu_usuario,nu_articulo,fe_compra) VALUES (" . 
	"'" . $m->getNu_usuario() . "'" . ", " . 
	"'" . $m->getNu_articulo() . "'" . ", " . 
	"now()" .
	")";

	$result = $db->runQuery($query);

	return $result;

}


public function modificarBolsa (Bolsa $m) {
	$db = new ConexionMysql();
	$query="UPDATE bolsa SET nu_usuario='" . $m->getNu_usuario() . "'" . 
	", " . "nu_articulo='" . $m->getNu_articulo() . "'" . 
	", " . "fe_compra=now()" . 
	" WHERE 1=1 AND nu_usuario='" . $m->getNu_usuario() . "'" . 
	" AND nu_articulo='" . $m->getNu_articulo() . "'";

	$result = $db->runQuery($query);

	return $result;

}


public function eliminarBolsa ($nu_usuario, $nu_articulo) {
	$db = new ConexionMysql();
	$query="DELETE FROM bolsa WHERE nu_usuario='" . $nu_usuario . "'" . 
	" AND nu_articulo='" . $nu_articulo . "'";

	$result = $db->runQuery($query);

	return $result;

}


public function buscarBolsa ( $nu_usuario, $nu_articulo ) {
	$bolsa = new Bolsa();
	$db = new ConexionMysql();
	$query="SELECT nu_usuario, nb_usuario, co_correo, co_contraseña, nu_cedula, " .
	"nu_articulo, nb_articulo, de_articulo, ca_existencias, va_costo, nb_imagen, " .
	"nu_clase, nb_clase, fe_compra FROM view_bolsa " .
	"WHERE nu_usuario='" . $nu_usuario . "'" . " AND nu_articulo='" . $nu_articulo . "'";

	$result = $db->runSelect($query);

	if (count($result)) {

		$x=0;

		
		$usuario = new Usuario();

		$usuario->setNu_usuario($result[$x]["nu_usuario"]);
		$usuario->setNb_usuario($result[$x]["nb_usuario"]);
		$usuario->setCo_correo($result[$x]["co_correo"]);
		$usuario->setCo_contraseña($result[$x]["co_contraseña"]);
		$usuario->setNu_cedula($result[$x]["nu_cedula"]);

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


		$x=0;
		$bolsa->setNu_usuario($result[$x]["nu_usuario"]);
		$bolsa->setNu_articulo($result[$x]["nu_articulo"]);
		$bolsa->setFe_compra($result[$x]["fe_compra"]);

		$bolsa->setUsuario($usuario);
		$bolsa->setArticulo($articulo);


	}

	return $bolsa;

}


public function obtenerListaBolsa($condicion='1=1') {
	$arreglo=array();
	$db = new ConexionMysql();
	$query="SELECT nu_usuario, nb_usuario, co_correo, co_contraseña, nu_cedula, " .
	"nu_articulo, nb_articulo, de_articulo, ca_existencias, va_costo, nb_imagen, " .
	"nu_clase, nb_clase, fe_compra FROM view_bolsa " .
	"WHERE $condicion";

	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		
		$usuario = new Usuario();

		$usuario->setNu_usuario($result[$x]["nu_usuario"]);
		$usuario->setNb_usuario($result[$x]["nb_usuario"]);
		$usuario->setCo_correo($result[$x]["co_correo"]);
		$usuario->setCo_contraseña($result[$x]["co_contraseña"]);
		$usuario->setNu_cedula($result[$x]["nu_cedula"]);

		$clases = new Clases();

		$clases->setNu_clase($result[$x]["nu_clase"]);
		$clases->setNb_clase($result[$x]["nb_clase"]);

		$articulo = new Articulo();

		$articulo->setNu_articulo($result[$x]["nu_articulo"]);
		$articulo->setNb_articulo($result[$x]["nb_articulo"]);
		$articulo->setCa_existencias($result[$x]["ca_existencias"]);
		$articulo->setVa_costo($result[$x]["va_costo"]);
		$articulo->setNu_clase($result[$x]["nu_clase"]);
		$articulo->setDe_articulo($result[$x]["de_articulo"]);
		$articulo->setNb_imagen($result[$x]["nb_imagen"]);

		$articulo->setClases($clases);


		$bolsa = new Bolsa();

		$bolsa->setNu_usuario($result[$x]["nu_usuario"]);
		$bolsa->setNu_articulo($result[$x]["nu_articulo"]);
		$bolsa->setFe_compra($result[$x]["fe_compra"]);

		$bolsa->setUsuario($usuario);
		$bolsa->setArticulo($articulo);

		array_push($arreglo,$bolsa);

	}

	return $arreglo;

}


} 

?>
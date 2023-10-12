<?php

require_once "ConexionMysql.php";
require_once "Usuario.php";




class ManejadorUsuario {

public function insertarUsuario (Usuario $m) {
	$db = new ConexionMysql();
	$query="INSERT INTO usuario (nb_usuario, co_correo, co_contraseña, nu_cedula) VALUES (" . 
	"'" . $m->getNb_usuario() . "'" . 
	", " . "'" . $m->getCo_correo() . "'" . 
	", " . "'" . $m->getCo_contraseña() . "'" . 
	", " . "'" . $m->getNu_cedula() . "'" . 
	")";

	$result = $db->runQuery($query);
	
	return $result;

}


public function modificarUsuario (Usuario $m) {
	$db = new ConexionMysql();
	$query="UPDATE usuario SET nb_usuario='" . $m->getNb_usuario() . "'" . 
	", " . "co_correo='" . $m->getCo_correo() . "'" . 
	", " . "co_contraseña='" . $m->getCo_contraseña() . "'" . 
	", " . "nu_cedula='" . $m->getNu_cedula() . "'" . 
	" WHERE 1=1 AND nu_usuario='" . $m->getNu_usuario() . "'";

	$result = $db->runQuery($query);
	
	return $result;

}


public function eliminarUsuario ($nu_usuario) {
	$db = new ConexionMysql();
	$query="DELETE FROM usuario WHERE 1=1 AND nu_usuario='" . $nu_usuario . "'";

	$result = $db->runQuery($query);
	
	return $result;

}


public function buscarUsuario ( $nu_usuario ) {
	$usuario = new Usuario();
	$db = new ConexionMysql();
	$query="SELECT nu_usuario, nb_usuario, co_correo, co_contraseña, nu_cedula FROM usuario " .
	"WHERE 1=1 AND nu_usuario='" . $nu_usuario . "'";

	$result = $db->runSelect($query);

	if (count($result) > 0) {

		$x=0;
		$usuario->setNu_usuario($result[$x]["nu_usuario"]);
		$usuario->setNb_usuario($result[$x]["nb_usuario"]);
		$usuario->setCo_correo($result[$x]["co_correo"]);
		$usuario->setCo_contraseña($result[$x]["co_contraseña"]);
		$usuario->setNu_cedula($result[$x]["nu_cedula"]);

	}

	return $usuario;

}


public function obtenerListaUsuario($condicion='1=1') {
	$arreglo=array();
	$db = new ConexionMysql();
	$query="SELECT nu_usuario, nb_usuario, co_correo, co_contraseña, nu_cedula FROM usuario " .
	"WHERE $condicion";

	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {
		$usuario = new Usuario();

		$usuario->setNu_usuario($result[$x]["nu_usuario"]);
		$usuario->setNb_usuario($result[$x]["nb_usuario"]);
		$usuario->setCo_correo($result[$x]["co_correo"]);
		$usuario->setCo_contraseña($result[$x]["co_contraseña"]);
		$usuario->setNu_cedula($result[$x]["nu_cedula"]);

		array_push($arreglo,$usuario);

	}

	return $arreglo;

}


} 

?>
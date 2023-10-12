<?php

require_once "ConexionMysql.php";
require_once "Articulo.php";


require_once "Clases.php";




class ManejadorArticulo {

public function insertarArticulo (Articulo $m) {
	$db = new ConexionMysql();
	$query="INSERT INTO articulo (nb_articulo,ca_existencias,va_costo,nu_clase,de_articulo,nb_imagen) ".
	"VALUES (" . "'" . $m->getNb_articulo() . "'" . 
	", " . "'" . $m->getCa_existencias() . "'" . 
	", " . "'" . $m->getVa_costo() . "'" . 
	", " . "'" . $m->getNu_clase() . "'" . 
	", " . "'" . $m->getDe_articulo() . "'" . 
	", " . "'" . $m->getNb_imagen() . "'" . 
	")";

	$result = $db->runQuery($query);


	$archivo = $m->getNb_imagen();
	if($archivo != "sin_imagen.png")
		$this->subirArchivo("articulo");

	return $result;
}


public function modificarArticulo (Articulo $m) {
	$db = new ConexionMysql();
	$query="UPDATE articulo SET nb_articulo='" . $m->getNb_articulo() . "'" . 
	", " . "ca_existencias='" . $m->getCa_existencias() . "'" . 
	", " . "va_costo='" . $m->getVa_costo() . "'" . 
	", " . "nu_clase='" . $m->getNu_clase() . "'" . 
	", " . "de_articulo='" . $m->getDe_articulo() . "'" . 
	", " . "nb_imagen='" . $m->getNb_imagen() . "'" . 
	" WHERE nu_articulo='" . $m->getNu_articulo() . "'";

	$result = $db->runQuery($query);
	return $result;
}


public function eliminarArticulo ($nu_articulo) {
	$db = new ConexionMysql();
	$query="DELETE FROM articulo WHERE nu_articulo='" . $nu_articulo . "'";

	$result = $db->runQuery($query);
	return $result;
}


public function buscarArticulo ( $nu_articulo ) {
	$articulo = new Articulo();
	$db = new ConexionMysql();
	$query="SELECT nu_articulo, nb_articulo, de_articulo, ca_existencias, va_costo, ".
	"nu_clase, nb_clase, nb_imagen FROM view_articulo WHERE nu_articulo='" . $nu_articulo . "'";

	$result = $db->runSelect($query);
	
	if (count($result) > 0) {

		$x=0;

		
		$clases = new Clases();

		$clases->setNu_clase($result[$x]["nu_clase"]);
		$clases->setNb_clase($result[$x]["nb_clase"]);

		$articulo->setNu_articulo($result[$x]["nu_articulo"]);
		$articulo->setNb_articulo($result[$x]["nb_articulo"]);
		$articulo->setDe_articulo($result[$x]["de_articulo"]);
		$articulo->setCa_existencias($result[$x]["ca_existencias"]);
		$articulo->setVa_costo($result[$x]["va_costo"]);
		$articulo->setNu_clase($result[$x]["nu_clase"]);
		$articulo->setNb_imagen($result[$x]["nb_imagen"]);
		
		$articulo->setClases($clases);

	}

	return $articulo;

}


public function obtenerListaArticulo($condicion='1=1') {
	$arreglo=array();
	$db = new ConexionMysql();
	$query="SELECT nu_articulo, nb_articulo, de_articulo, ca_existencias, va_costo, ".
	"nu_clase, nb_clase, nb_imagen FROM view_articulo WHERE $condicion";



	$result = $db->runSelect($query);

	for($x=0; $x < count($result); $x++) {

		
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

		array_push($arreglo,$articulo);

	}

	return $arreglo;

}


function subirArchivo($carpeta){

	$adjunto = "../$carpeta/" . basename($_FILES["nb_imagen"]["name"]);

	
	$imagen = strtolower(pathinfo($adjunto,PATHINFO_EXTENSION));
	if(
		$imagen != "jpg" &&
		$imagen != "png" &&
		$imagen != "jpeg" &&
		$imagen != "gif"
	) return false;

	
	if ($_FILES["nb_imagen"]["size"] > 102400) return false;

	
	return move_uploaded_file($_FILES["nb_imagen"]["tmp_name"], $adjunto);

}


} 

?>
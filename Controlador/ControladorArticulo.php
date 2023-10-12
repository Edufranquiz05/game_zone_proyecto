<?php

require_once("../modelo/ManejadorArticulo.php");
require_once("../modelo/ManejadorClases.php");

$man = new ManejadorArticulo();

$man_cla = new ManejadorClases();
$combo = $man_cla->comboClases();

$opcion = 0;



if(
	isset($_POST['opcion']) && $_POST['opcion'] == 1
){

	$nb_articulo = $_POST['nb_articulo'];
	$de_articulo = $_POST['de_articulo'];
	$va_costo = $_POST['va_costo'];
	$ca_existencias = $_POST['ca_existencias'];
	$nu_clase = $_POST['nu_clase'];

	if(isset($_FILES['nb_imagen'])){
		$nb_imagen = $_FILES['nb_imagen']["name"];
	}else{
		$nb_imagen = "sin_imagen.png";
	}

	$articulo = new Articulo();
	$articulo->setNb_articulo($nb_articulo);
	$articulo->setDe_articulo($de_articulo);
	$articulo->setVa_costo($va_costo);
	$articulo->setCa_existencias($ca_existencias);
	$articulo->setNb_imagen($nb_imagen);
	$articulo->setNu_clase($nu_clase);

	$res = $man->insertarArticulo($articulo);

	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

}



if(
	isset($_GET['opcion']) && $_GET['opcion'] == 2
){

	$nu_articulo = $_GET['nu_articulo'];

	$res = $man->eliminarArticulo($nu_articulo);

	if($res)
		$mensaje = "Datos eliminados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

}



if(
	isset($_GET['opcion']) && $_GET['opcion'] == 3
){

	$opcion = $_GET['opcion'];
	$nu_articulo = $_GET['nu_articulo'];

	$articulo = $man->buscarArticulo($nu_articulo);

	$nb_articulo = $articulo->getNb_articulo();
	$de_articulo = $articulo->getDe_articulo();
	$va_costo = $articulo->getVa_costo();
	$ca_existencias = $articulo->getCa_existencias();
	$nu_clase = $articulo->getNu_clase();
	$nb_imagen = $articulo->getNb_imagen();

	$combo = $man_cla->comboClases($nu_clase);

}




if(
	isset($_POST['opcion']) && $_POST['opcion'] == 4 
){
    
    $opcion = $_POST['opcion'];
    $nu_articulo = $_POST['nu_articulo'];
	$nb_articulo = $_POST['nb_articulo'];
	$de_articulo = $_POST['de_articulo'];
	$va_costo = $_POST['va_costo'];
	$ca_existencias = $_POST['ca_existencias'];
	$nu_clase = $_POST['nu_clase'];

	$articulo = new Articulo();
	$articulo->setNu_articulo($nu_articulo);
	$articulo->setNb_articulo($nb_articulo);
	$articulo->setDe_articulo($de_articulo);
	$articulo->setVa_costo($va_costo);
	$articulo->setCa_existencias($ca_existencias);
	$articulo->setNu_clase($nu_clase);

	$res = $man->modificarArticulo($articulo);


	if($res)
		$mensaje = "Datos agregados satisfactoriamente";
	else
		$mensaje = "Ha ocurrido un error durante el proceso";

    $combo = $man_cla->comboClases($nu_clase);


}



$lista = $man->obtenerListaArticulo();

require_once("../vista/listar_articulo.php");

?>
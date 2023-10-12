<?php

session_start();

require_once("../modelo/ManejadorArticulo.php");


$manart = new ManejadorArticulo();


$nu_clase = $_POST['nu_clase'];
if($nu_clase == "")
	$cond = "1=1";
else
	$cond = "nu_clase = $nu_clase";



if(isset($_SESSION['nu_usuario'])){

	$nu_usuario = $_SESSION['nu_usuario'];
	$cond .= " and nu_articulo NOT IN (" . 
		"select nu_articulo from bolsa where nu_usuario = $nu_usuario" .
		")";

}


$datos = $manart->obtenerListaArticulo($cond);

if(count($datos) == 0){
	echo "<h3 class='w3-center'>No hay articulos para esta categor&iacute;a</h3>";
}


$salto = 0;
for($a=0; $a<count($datos); $a++){

	$articulo = $datos[$a];

	$nb_imagen = $articulo->getNb_imagen();
	$nu_articulo = $articulo->getNu_articulo();
	$nb_articulo = $articulo->getNb_articulo();
	$de_articulo = $articulo->getDe_articulo();
	$va_costo = $articulo->getVa_costo();
	$ca_existencias = $articulo->getCa_existencias();
	$nb_clase = $articulo->getClases()->getNb_clase();

	if($salto == 0){
		echo "<div class='w3-row-padding'>";
	}

	echo "<div class='w3-half w3-padding'>";

	echo "<div class='w3-row-padding w3-border w3-round-xxlarge w3-border-red w3-hover-border-blue'>";

	echo "<div class='w3-third w3-circle w3-opacity w3-hover-opacity-off'>";
	echo "<p class='w3-center'><img src='../articulos/$nb_imagen' alt='Imagen del articulo' class='w3image' style='height: 180px;'></p>";
	echo "</div>";

	echo "<div class='w3-twothird'>";
	echo "<p>";
	echo "<span class='w3-large w3-text-green'><b>$nb_articulo</b></span>";
	echo "<br>Descripci&oacute;n: $de_articulo";
	echo "<br>Existencia: $ca_existencias";
	echo "<br>Clases: $nb_clase";
	echo "<br><span class='w3-xlarge w3-text-green w3-center'>$va_costo $</span>";
	echo "</p>";
	?>

		<form name="agregar_bolsa" method="post" action="Catalogo.php">
			<input type="hidden" name="opcion" value="1">
			<input type="hidden" name="nu_articulo" value="<?=$nu_articulo?>">
			<p class="w3-center">
				<input type="image" src="../imagenes/bolsa-de-la-compra.png" title="Haga click para agregar a la bolsa">
			</p>
		</form>

	<?php
	echo "</div>";
	echo "</div>";

	echo "</div>";
	$salto++;


	if($salto == 2){
		echo "</div>";
		$salto = 0;
	}


}

?>


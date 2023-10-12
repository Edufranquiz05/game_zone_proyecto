<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<style>

		#planilla {
			width: 75%;
			margin: auto;
		}

	</style>
</head>
<body class="w3-pale-green" style="background-image: url('https://previews.123rf.com/images/artisticco/artisticco1110/artisticco111000051/10987451-ilustraci%C3%B3n-de-art%C3%ADculos-electr%C3%B3nicos-de-iconos.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">


<h1 class="w3-center">Articulos</h1>

<p class="w3-center">
	<a href="ControladorArticulo.php?opcion=0"><img src="../imagenes/agregar.png" alt="Icono add"></a>
</p>

<div id="formulario">
<?php

if($opcion == 0)
	require_once("../vista/articulo_ingresar.php");
else if($opcion >= 3)
	require_once("../vista/articulo_modificar.php");

?>
</div>


<div id="planilla" class="w3-padding">
	
	<table class="w3-table-all">

		<tr class="w3-purple">
			<th>#</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Existencia</th>
			<th>Imagen</th>
			<th>Acciones</th>
		</tr>

<?php
for ($i=0; $i < count($lista); $i++) { 
	
	$articulo = $lista[$i];

	$nu_articulo = $articulo->getNu_articulo();
	$nb_articulo = $articulo->getNb_articulo();
	$de_articulo = $articulo->getDe_articulo();
	$va_costo = $articulo->getVa_costo();
	$ca_existencias = $articulo->getCa_existencias();
	$nb_imagen = $articulo->getNb_imagen();

?>

	<tr>
		<td><?=$nu_articulo?></td>
		<td><?=$nb_articulo?></td>
		<td><?=$de_articulo?></td>
		<td><?=$va_costo?></td>
		<td><?=$ca_existencias?></td>
		<td><?=$nb_imagen?></td>
		<td>
			<a href="ControladorArticulo.php?opcion=2&nu_articulo=<?=$nu_articulo?>"><img src="../imagenes/bote-de-basura.png" alt="icono" style="height: 16px;"></a>

			<a href="ControladorArticulo.php?opcion=3&nu_articulo=<?=$nu_articulo?>"><img src="../imagenes/editar.png" alt="icono" style="height: 16px;"></a>
		</td>
	</tr>

<?php
}
?>

	</table>
</div>



</body>
</html>
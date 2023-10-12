<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<style>

		#planilla {
			width: 90%;
			margin: auto;
		}
	</style>
</head>
<body style="background-image: url('https://previews.123rf.com/images/artisticco/artisticco1110/artisticco111000051/10987451-ilustraci%C3%B3n-de-art%C3%ADculos-electr%C3%B3nicos-de-iconos.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">


<?php
require_once("../vista/menu.php");
?>


<h1 class="w3-center">Ver Bolsa</h1>

<div id="planilla">
	
	<table class="w3-table-all">
		<tr class="w3-purple">
			<th>#</th>
			<th>Articulo</th>
			<th>Descripci&oacute;n</th>
			<th>Existencias</th>
			<th>Costo</th>
			<th>Cantidad</th>
			<th>Pagar</th>
			<th>Eliminar</th>
		</tr>

		<?php
		for($a=0; $a<count($lista); $a++){
			$bolsa = $lista[$a];

			$articulo = $bolsa->getArticulo();
			$nu_articulo = $articulo->getNu_articulo();
			$nb_articulo = $articulo->getNb_articulo();
			$ca_existencias = $articulo->getCa_existencias();
			$va_costo = $articulo->getVa_costo();
			$nb_imagen = $articulo->getNb_imagen();

		?>

			<tr>
				<td><?=($a+1)?></td>
				<td>
					<img src="../articulos/<?=$nb_imagen?>" alt="<?=$nb_articulo?>" style="height: 50px;">
				</td>
				<td><?=$nb_articulo?></td>
				<td><?=$ca_existencias?></td>
				<td><?=$va_costo?></td>
				
				<form name="pago<?=$nu_articulo?>" method="post" action="VerBolsa.php">
					<input type="hidden" name="pago" value="1">
					<input type="hidden" name="nu_articulo" value="<?=$nu_articulo?>">
				<td>
					<input type="number" name="ca_articulo" value="1" min="1" max="<?=$ca_existencias?>">
				</td>

				<td>
					<input type="image" src="../imagenes/bolsa-de-la-compra.png" alt="Icono compra" title="Haga click para pagar">
				</td>
				</form>

				<form name="eliminar<?=$nu_articulo?>" method="post" accept="VerBolsa.php">
					<input type="hidden" name="eliminar" value="1">
					<input type="hidden" name="nu_articulo" value="<?=$nu_articulo?>">
				<td>
					<input type="image" src="../imagenes/bote-de-basura.png" alt="Icono eliminar" title="Haga click para eliminar">
				</td>
				</form>

			</tr>

		<?php
		}
		?>

	</table>

	<p class="w3-center w3-text-red">
		<?php
		if(isset($mensaje)) echo $mensaje;
		?>
	</p>

</div>




</body>
</html>
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


<h1 class="w3-center">Pagar</h1>

<div id="planilla">

	<table class="w3-table-all">
		<tr class="w3-purple">
			<th>#</th>
			<th>Articulo</th>
			<th>Costo</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
		</tr>
		
<?php

$total = 0;

for($a=0; $a<count($lista); $a++){

	$detalle = $lista[$a];
	$pago = $detalle->getPago();
	$articulo = $detalle->getArticulo();
	$usuario = $pago->getUsuario();

	$nb_articulo = $articulo->getNb_articulo();
	$va_costo = $articulo->getVa_costo();
	$ca_articulo = $detalle->getCa_articulo();
	$subtotal = $va_costo * $ca_articulo;
	$total += $subtotal;

	$nu_pago = $pago->getNu_pago();
	$fe_pago = $pago->getFe_pago();

	$aux = date_create($fe_pago);
	$fe_pago = date_format($aux,"d/m/Y");


	if($a==0){
		echo "<p class='w3-center w3-text-red'>";
		echo "Fecha: <b>$fe_pago</b>";
		echo "</p>";
	}

?>

	<tr>
		<td><?=($a+1)?></td>
		<td><?=$nb_articulo?></td>
		<td><?=$va_costo?></td>
		<td><?=$ca_articulo?></td>
		<td><?=$subtotal?></td>
	</tr>

<?php
}
?>

		<tr class="w3-blue">
			<th colspan="4" class="w3-right-align">TOTAL</th>
			<th><?=$total?></th>
		</tr>

	</table>

	<form name="pago" method="post" action="VerPago.php">
		<input type="hidden" name="pagar" value="1">
		<input type="hidden" name="nu_pago" value="<?=$nu_pago?>">
		<input type="hidden" name="in_envio" value="P">
		<p class="w3-center">
			<button class="w3-btn w3-blue">PAGAR</button>
		</p>
	</form>

</div>




</body>
</html>


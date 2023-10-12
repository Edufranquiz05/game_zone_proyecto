<?php

$nu_pago = $_POST['nu_pago'];

require_once("../modelo/ManejadorMinucia_pago.php");

$man = new ManejadorMinucia_pago();

$condicion = "nu_pago = $nu_pago";
$datos = $man->obtenerListaMinucia_pago($condicion);

?>

<h2>Detalle del Pago</h2>

<table class="w3-table-all">

<?php

$total = 0;

for ($i=0; $i < count($datos); $i++) {

	$minucia = $datos[$i];
	$ca_articulo = $minucia->getCa_articulo();
	$fe_minucia = $minucia->getFe_minucia();

	$aux = date_create($fe_minucia);
	$fe_minucia = date_format($aux,'d/m/Y');


	$pago = $minucia->getPago();
	$fe_pago = $pago->getFe_pago();
	$fe_envio = $pago->getFe_envio();
	$in_envio = $pago->getIn_envio();

	$aux = date_create($fe_pago);
	$fe_pago = date_format($aux,'d/m/Y');

	if(is_null($fe_envio))
		$fe_envio = "";
	else{
		$aux = date_create($fe_envio);
		$fe_envio = date_format($aux,'d/m/Y');
	}

	$envio = [
		"C" => "Comprado",
		"P" => "Pagado", 
		"E" => "Enviado"
	];

	$articulo = $minucia->getArticulo();
	$nb_articulo = $articulo->getNb_articulo();
	$va_costo = $articulo->getVa_costo();

	$subtotal = $ca_articulo * $va_costo;
	$total += $subtotal;

	if($i==0){
?>
	<tr class="w3-pale-green">
		<th colspan="99" class="w3-center">
			Fecha de pago: <?=$fe_pago?> - Estatus: <?=$envio[$in_envio]?> 
		</th>
	</tr>
	<tr class="w3-purple">
		<th>#</th>
		<th>Articulo</th>
		<th>Costo</th>
		<th>Cantidad</th>
		<th>Subtotal</th>
		<th>Fecha de pago</th>
	</tr>

<?php
	}
?>

	<tr>
		<td><?=($i+1)?></td>
		<td><?=$nb_articulo?></td>
		<td><?=$va_costo?></td>
		<td><?=$ca_articulo?></td>
		<td><?=$subtotal?></td>
		<td><?=$fe_minucia?></td>
	</tr>

<?php
}
?>

	<tr class="w3-pale-blue">
		<th colspan="99" class="w3-center w3-text-red"><b>Total <?=$total?></b></th>
	</tr>
</table>



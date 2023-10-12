<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script src="../js/jquery.js"></script>
	<style>

		#planilla {
			width: 90%;
			margin: auto;
		}

	</style>
	<script>

		function verMinucia(nu_pago){

			$.ajax({
				type : 'post',
				data : {
					nu_pago: nu_pago
				},
				url: "../vista/lista_minucia_ajax.php",
				success: function(htmlcode){
					$("#contenido").html(htmlcode);
				}
			});

		}

	</script>
</head>
<body style="background-image: url('https://previews.123rf.com/images/artisticco/artisticco1110/artisticco111000051/10987451-ilustraci%C3%B3n-de-art%C3%ADculos-electr%C3%B3nicos-de-iconos.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">


<?php
require_once("../vista/menu.php");
?>


<h1 class="w3-center">Historial de Compras</h1>

<div id="planilla">

	<table class="w3-table-all">
		<tr class="w3-purple">
			<th>#</th>
			<th>Fecha</th>
			<th>Estatus</th>
			<th>Envia</th>
			<th>Detalle</th>
		</tr>
<?php
for ($i=0; $i < count($lista); $i++) { 
	
	$item = $lista[$i];

	$nu_pago = $item['nu_pago'];
	$fe_pago = $item['fe_pago'];
	$in_envio = $item['in_envio'];
	$fe_envio = $item['fe_envio'];

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

?>
	
	<tr>
		<td><?=($i+1)?></td>
		<td><?=$fe_pago?></td>
		<td><?=$envio[$in_envio]?></td>
		<td><?=$fe_envio?></td>
		<td>
			<input type="button" value="VER DETALLE" onclick="verMinucia(<?=$nu_pago?>)">
		</td>
	</tr>

<?php
}
?>

	</table>

	<hr>

	<div id="contenido"></div>

</div>



</body>
</html>
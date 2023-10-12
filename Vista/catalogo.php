<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script src="../js/jquery.js"></script>
	<script>

		$(document).ready(function(){

			$("#nu__clase").change(function(){

				carga_lista();

			});

		});


		function carga_lista(){

			nu_clase = $("#nu__clase").val();

			$.ajax({
				type : 'post',
				data : {
					nu_clase: nu_clase
				},
				url: "../vista/lista_articulo_ajax.php",
				success: function(htmlcode){
					$("#lista").html(htmlcode);
				}
			});

		}

	</script>
</head>
<body onload="carga_lista();">


<?php
require_once("../vista/menu.php");
?>

<h1 class="w3-center">Cat&aacute;logo</h1>

<div class="w3-center" style="width: 25%; margin: auto;">
	Clases <?=$combo?>
</div>

<div id="lista"></div>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Tienda Virtual</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<style>

		#planilla {
			width: 50%;
			margin: auto;
		}

	</style>
</head>
<body style="background-image: url('https://previews.123rf.com/images/artisticco/artisticco1110/artisticco111000051/10987451-ilustraci%C3%B3n-de-art%C3%ADculos-electr%C3%B3nicos-de-iconos.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">


<?php
require_once("../vista/menu.php");
?>


<div id="planilla" class="w3-pale-green w3-padding">

	<h1 class="w3-center w3-text-black">Ingrese sus Datos</h1>

	<form name="acceso" method="post" action="Login.php">
		<input type="hidden" name="opcion" value="1">

		<p class="w3-center w3-text-black">
			<label for="co_correo">Correo</label>
			<input type="email" name="co_correo" id="co_correo" maxlength="35" required>
		</p>

		<p class="w3-center w3-text-black">
			<label for="co_contraseña">Contraseña</label>
			<input type="password" name="co_contraseña" id="co_contraseña" maxlength="35" required>
		</p>

		<p class="w3-center">
			<button class="w3-btn w3-blue">Iniciar Sesión</button>
		</p>
		
	</form>

	<p class="w3-center w3-text-red">
		<?php
		if(isset($mensaje)) echo $mensaje;
		?>
	</p>

</div>


</body>
</html>
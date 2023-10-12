
<style>
	.iconos {
		height: 40px;
	}
</style>

<nav class="w3-light-grey w3-padding">
	
	<div class="w3-bar">

		<a href="Catalogo.php" class="w3-bar-item" title="Ver catalogo">
			<img src="../imagenes/consola.png" alt="Icono control" onclick="" class="iconos">
		</a>

	<?php
	if(isset($_SESSION['nu_usuario'])){
	?>

		<a href="VerBolsa.php" class="w3-bar-item" title="Ver bolsa">
			<img src="../imagenes/bolsa-de-la-compra.png" alt="Icono bolsa" class="iconos">
		</a>

		<a href="VerPago.php" class="w3-bar-item" title="Ver pagos">
			<img src="../imagenes/cajero-automatico.png" alt="Icono pago" class="iconos">
		</a>

		<a href="Envio.php" class="w3-bar-item" title="Enviar articulos">
			<img src="../imagenes/lista-de-verificacion.png" alt="Icono verificaciones" class="iconos">
		</a>

		<a href="Historial.php" class="w3-bar-item" title="Historial de pagos">
			<img src="../imagenes/lista.png" alt="Icono lista" class="iconos">
		</a>

		<a href="Logout.php" class="w3-bar-item" title="Salir">
			<img src="../imagenes/salida.png" alt="Icono logout" class="iconos">
		</a>

		<div class="w3-bar-item w3-right">
			<p>
				Usuario: <b><?=$_SESSION['nb_usuario']?></b>
			</p>
		</div>

	<?php
	}else{
	?>

		<a href="Registrese.php" class="w3-bar-item" title="Registrese">
			<img src="../imagenes/anadir-amigo.png" alt="Icono user" class="iconos">
		</a>
		<a href="Login.php" class="w3-bar-item" title="Conectarse al sistema">
			<img src="../imagenes/iniciar-sesion.png" alt="Icono user" class="iconos">
		</a>

	<?php
	}
	?>
	
	</div>

</nav>
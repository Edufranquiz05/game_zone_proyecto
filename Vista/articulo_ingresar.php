
<div class="w3-pale-green w3-padding-large w3-row-padding w3-border w3-round-xxlarge w3-border-red w3-hover-border-blue" style="width: 75%; margin: auto;">

	<h2 class="w3-center">Datos del Art&iacute;culo</h2>

	<form name="form_insertar" action="ControladorArticulo.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="opcion" value="1">

		<p class="w3-center">
			<label for="nb_articulo">Nombre</label>
			<input type="text" name="nb_articulo" id="nb_articulo" required maxlength="50">
		</p>

		<p class="w3-center">
			<label>Descripci&oacute;n</label>
			<textarea name="de_articulo" cols="30" rows="4" required style="resize: none;"></textarea>
		</p>

		<p class="w3-center">
			<label for="va_costo">Costo</label>
			<input type="number" name="va_costo" id="va_costo" required min="1">
		</p>

		<p class="w3-center">
			<label for="ca_existencias">Existencias</label>
			<input type="number" name="ca_existencias" id="ca_existencias" required min="1">
		</p>

		<p class="w3-center">
			<label for="nb_imagen">Imagen</label>
			<input type="file" name="nb_imagen" id="nb_imagen" required>
		</p>

		<p class="w3-center">
			<label for="nu_clase">Clases</label>
			<div style="width: 30%; margin: auto;"><?=$combo?></div>
		</p>

		<p class="w3-center">
			<button class="w3-btn w3-green" id="boton">ACEPTAR</button>
		</p>

	</form>

	<p class="w3-center w3-text-red">
		<?php
		if(isset($mensaje)) echo $mensaje;
		?>
	</p>

</div>

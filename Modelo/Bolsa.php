<?php


require_once "Usuario.php";
require_once "Articulo.php";

class Bolsa {

	
	private $nu_usuario;
	private $nu_articulo;
	private $fe_compra;


	
	private $usuario;
	private $articulo;


	
	public function __construct() {	} 

	
	public function setNu_usuario($nu_usuario) {
	if ($nu_usuario != null) $this->nu_usuario = $nu_usuario;
	}

	public function setNu_articulo($nu_articulo) {
	if ($nu_articulo != null) $this->nu_articulo = $nu_articulo;
	}

	public function setFe_compra($fe_compra) {
	if ($fe_compra != null) $this->fe_compra = $fe_compra;
	}


	
	public function setUsuario(Usuario $usuario) {
	$this->usuario = $usuario;
	}

	public function setArticulo(Articulo $articulo) {
	$this->articulo = $articulo;
	}


	
	public function getNu_usuario() { return $this->nu_usuario; }

	public function getNu_articulo() { return $this->nu_articulo; }

	public function getFe_compra() { return $this->fe_compra; }


	
	public function getUsuario() { return $this->usuario; }

	public function getArticulo() { return $this->articulo; }


	public function __toString(){
		return "Clase: Bolsa" . 
		"<br>nu_usuario=" . $this->nu_usuario . 
		"<br>nu_articulo=" . $this->nu_articulo . 
		"<br>fe_compra=" . $this->fe_compra;
	}

} 



?>
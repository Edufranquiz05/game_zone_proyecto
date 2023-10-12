<?php


require_once "Pago.php";
require_once "Articulo.php";


class Minucia_pago {

	
	private $nu_minucia;
	private $nu_pago;
	private $nu_articulo;
	private $ca_articulo;
	private $fe_minucia;


	
	private $pago;
	private $articulo;


	
	public function __construct() {	} 

	
	
	public function setNu_minucia($nu_minucia) {
	if ($nu_minucia != null) $this->nu_minucia = $nu_minucia;
	}

	public function setNu_pago($nu_pago) {
	if ($nu_pago != null) $this->nu_pago = $nu_pago;
	}

	public function setNu_articulo($nu_articulo) {
	if ($nu_articulo != null) $this->nu_articulo = $nu_articulo;
	}

	public function setCa_articulo($ca_articulo) {
	if ($ca_articulo!= null) $this->ca_articulo = $ca_articulo;
	}

	public function setFe_minucia($fe_minucia) {
	if ($fe_minucia != null) $this->fe_minucia = $fe_minucia;
	}


	
	public function setPago(Pago $pago) {
	$this->pago = $pago;
	}

	public function setArticulo(Articulo $articulo) {
	$this->articulo = $articulo;
	}


	
	public function getNu_minucia() { return $this->nu_minucia; }

	public function getNu_pago() { return $this->nu_pago; }

	public function getNu_articulo() { return $this->nu_articulo; }

	public function getCa_articulo() { return $this->ca_articulo; }

	public function getFe_minucia() { return $this->fe_minucia; }


	
	public function getPago() { return $this->pago; }

	public function getArticulo() { return $this->articulo; }


	public function __toString(){
		return "Clase: Minucia_pago" . 
		"<br>nu_minucia=" . $this->nu_minucia . 
		"<br>nu_pago=" . $this->nu_pago . 
		"<br>nu_articulo=" . $this->nu_articulo . 
		"<br>ca_articulo=" . $this->ca_articulo . 
		"<br>fe_minucia=" . $this->fe_minucia;
	}

} 



?>

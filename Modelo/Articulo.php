<?php


require_once "Clases.php";

class Articulo {

	
	private $nu_articulo;
	private $nb_articulo;
	private $ca_existencias;
	private $va_costo;
	private $nu_clase;
	private $de_articulo;
	private $nb_imagen;

	
	private $clase;


	
	public function __construct() {	} 

	
	public function setNu_articulo($nu_articulo) {
	if ($nu_articulo != null) $this->nu_articulo = $nu_articulo;
	}

	public function setNb_articulo($nb_articulo) {
	if ($nb_articulo != null) $this->nb_articulo = $nb_articulo;
	}

	public function setCa_existencias($ca_existencias) {
	if ($ca_existencias != null) $this->ca_existencias = $ca_existencias;
	}

	public function setVa_costo($va_costo) {
	if ($va_costo != null) $this->va_costo = $va_costo;
	}

	public function setNu_clase($nu_clase) {
	if ($nu_clase != null) $this->nu_clase = $nu_clase;
	}

	public function setDe_articulo($de_articulo) {
	if ($de_articulo != null) $this->de_articulo = $de_articulo;
	}

	public function setNb_imagen($nb_imagen) {
	if ($nb_imagen != null) $this->nb_imagen = $nb_imagen;
	}


	
	public function setClases(Clases $clases) {
	$this->clases = $clases;
	}


	
	public function getNu_articulo() { return $this->nu_articulo; }

	public function getNb_articulo() { return $this->nb_articulo; }

	public function getCa_existencias() { return $this->ca_existencias; }

	public function getVa_costo() { return $this->va_costo; }

	public function getNu_clase() { return $this->nu_clase; }

	public function getDe_articulo() { return $this->de_articulo; }

	public function getNb_imagen() { return $this->nb_imagen; }

	
	
	public function getClases() { return $this->clases; }

	
	public function __toString(){
		return "Clases: articulo" . 
		"<br>nu_articulo=" . $this->nu_articulo . 
		"<br>nb_articulo=" . $this->nb_articulo . 
		"<br>ca_articulo=" . $this->ca_articulo . 
		"<br>va_costo=" . $this->va_costo . 
		"<br>nu_clase=" . $this->nu_clase . 
		"<br>de_articulo=" . $this->de_articulo;
	}

}



?>
<?php


class Usuario {

	
	private $nu_usuario;
	private $nu_cedula;
	private $nb_usuario;
	private $co_correo;
	private $co_contraseña;


	
	public function __construct() {	} 

	
	
	public function setNu_usuario($nu_usuario) {
	if ($nu_usuario != null) $this->nu_usuario = $nu_usuario;
	}

	public function setNb_usuario($nb_usuario) {
	if ($nb_usuario != null) $this->nb_usuario = $nb_usuario;
	}

	public function setCo_correo($co_correo) {
	if ($co_correo != null) $this->co_correo = $co_correo;
	}

	public function setCo_contraseña($co_contraseña) {
	if ($co_contraseña != null) $this->co_contraseña = $co_contraseña;
	}

	public function setNu_cedula($nu_cedula) {
	if ($nu_cedula != null) $this->nu_cedula = $nu_cedula;
	}

	
	
	public function getNu_usuario() { return $this->nu_usuario; }

	public function getNb_usuario() { return $this->nb_usuario; }

	public function getCo_correo() { return $this->co_correo; }

	public function getCo_contraseña() { return $this->co_contraseña; }

	public function getNu_cedula() { return $this->nu_cedula; }


	public function __toString(){
		return "Clase: Usuario" . 
		"<br>>nu_usuario=" . $this->nu_usuario . 
		"<br>nb_usuario=" . $this->nb_usuario . 
		"<br>co_correo=" . $this->co_correo . 
		"<br>co_contraseña=" . $this->co_contraseña . 
		"<br>nu_cedula=" . $this->nu_cedula;
	}

}



?>
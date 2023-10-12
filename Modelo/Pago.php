<?php


require_once "Usuario.php";

class Pago {

	
	private $nu_pago;
	private $nu_usuario;
	private $fe_pago;
	private $fe_envio;
	private $in_envio;

	
	private $usuario;


	
	public function __construct() {	} 

	
	
	public function setNu_pago($nu_pago) {
	if ($nu_pago != null) $this->nu_pago = $nu_pago;
	}

	public function setNu_usuario($nu_usuario) {
	if ($nu_usuario != null) $this->nu_usuario = $nu_usuario;
	}

	public function setFe_pago($fe_pago) {
	if ($fe_pago != null) $this->fe_pago = $fe_pago;
	}

	public function setFe_envio($fe_envio) {
	if ($fe_envio != null) $this->fe_envio = $fe_envio;
	}

	public function setIn_envio($in_envio) {
	if ($in_envio != null) $this->in_envio = $in_envio;
	}

	
	public function setUsuario(Usuario $usuario) {
	$this->usuario = $usuario;
	}


	
	public function getNu_pago() { return $this->nu_pago; }

	public function getNu_usuario() { return $this->nu_usuario; }

	public function getFe_pago() { return $this->fe_pago; }

	public function getFe_envio() { return $this->fe_envio; }

	public function getIn_envio() { return $this->in_envio; }

	
	public function getUsuario() { return $this->usuario; }


	public function __toString(){
		return "Clase: Pago" .
		"<br>nu_pago=" . $this->nu_pago . 
		"<br>nu_usuario=" . $this->nu_usuario . 
		"<br>fe_pago=" . $this->fe_pago . 
		"<br>in_envio=" . $this->in_envio . 
		"<br>fe_envio=" . $this->fe_envio
		;
	}

}



?>
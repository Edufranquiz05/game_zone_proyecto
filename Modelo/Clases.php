<?php


class Clases {

	
	private $nu_clase;
	private $nb_clase;


	
	public function __construct() {	} 

	
	
	public function setNu_clase($nu_clase) {
	if ($nu_clase != null) $this->nu_clase = $nu_clase;
	}

	public function setNb_clase($nb_clase) {
	if ($nb_clase != null) $this->nb_clase = $nb_clase;
	}

	
	
	public function getNu_clase() { return $this->nu_clase; }

	public function getNb_clase() { return $this->nb_clase; }

	public function __toString(){
		return "Clase: Clases" . 
			"<br>nu_clase=" . $this->nu_clase . 
			"<br>nb_clase=" . $this->nb_clase;
	}

}


?>
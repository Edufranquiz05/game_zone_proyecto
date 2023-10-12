<?php

require_once "ConexionMysql.php";
require_once "Clases.php";



class ManejadorClases {

	public function insertarClases (Clases $m) {
		
		$db = new ConexionMysql();
		$query="INSERT INTO clases (nb_clases) VALUES (" . 
			"'" . $m->getNb_clases() . "'" . ")";

		$result = $db->runQuery($query);
		
		return $result;

	}


	public function modificarClases (Clases $m) {

		$db = new ConexionMysql();
		$query="UPDATE clases SET nb_clase='" . $m->getNb_clase() . "'" . 
		" WHERE nu_clase='" . $m->getNu_clase() . "'";

		$result = $db->runQuery($query);

		return $result;

	}


	public function eliminarClases ($nu_clase) {

		$db = new ConexionMysql();
		$query="DELETE FROM clases WHERE nu_clase='" . $nu_clase . "'";

		$result = $db->runQuery($query);

		return $result;

	}


	public function buscarClases ( $nu_clase ) {
		$clases = new Clases();

		$db = new ConexionMysql();
		$query="SELECT nu_clase, nb_clase from clases " .
			"WHERE nu_clase='" . $nu_clase . "'";
			
		$result = $db->runSelect($query);
		if (count($result)>0) {

			$x=0;
			$clases->setNu_clase($result[$x]["nu_clase"]);
			$clases->setNb_clase($result[$x]["nb_clase"]);

		}

		return $clases;

	}


	public function obtenerListaClases($condicion='1=1') {
		$arreglo=array();

		$db = new ConexionMysql();
		$query="SELECT nu_clase, nb_clase FROM clases WHERE $condicion ORDER BY nb_clase";
		$result = $db->runSelect($query);

		for($x=0; $x < count($result); $x++) {
			$clases = new Clases();

			$clases->setNu_clase($result[$x]["nu_clase"]);
			$clases->setNb_clase($result[$x]["nb_clase"]);

			array_push($arreglo,$clases);

		}

		return $arreglo;

	}
	

	public function comboClases($valor=0){
		$arreglo=$this->obtenerListaClases();
		$etiqueta="<select name='nu_clase' id='nu__clase' class='w3-select w3-border w3-round-xxlarge w3-border-red w3-hover-border-blue'>" . 
			"\n<option value=''>Consulte las Categorias</option>";

		for($x=0; $x < count($arreglo); $x++){
			$clases = $arreglo[$x];
			$nu_clase = $clases->getNu_clase();
			$nb_clase = $clases->getNb_clase();
			if($nu_clase == $valor)
				$sel = " selected ";
			else
				$sel = "";
			$etiqueta .= "\n<option value='" . $nu_clase . "'" . $sel . ">";
			$etiqueta .= $nb_clase . "</option >";
		}

		$etiqueta .= "</select>";
		
		return $etiqueta;
	}

}


?>
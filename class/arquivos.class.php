<?php
/**
 * @author Mackon Rangel
 * @copyright 2014
 * @name Dungeon Evolutio Armas gerador
 * @email maickonmaickon@hotmail.com
 */
class Arquivo{
	private $atributos = array();
	function __construct($atributos = array('arquivo','ponteiro','conteudo')){
		$this->atributos = $atributos;		
	}

	function add_atributo($novo_atributo){
		array_push($this->atributos, $novo_atributo);
	}

	function rm_atributo($atributo){
		foreach ($this->atributos as $key => $value):
			if($this->atributos[$key] == $atributo):
				unset($this->atributos[$key]);
			endif;
		endforeach;	
	}

	function __set($propiedade, $valor){
		$this->$propiedade = $valor;
	}

	function __get($propiedade){
		$atributo_out = 0;
		foreach ($this->atributos as $key => $value):
			if($this->atributos[$key] == $propiedade):
				if(!isset($this->$propiedade) && $this->$propiedade[$key] != 0):
					echo '<br />Atributo com nome '."<b>$propiedade</b>".' não foi inicializado!';
				else: 
					return $this->atributos[$propiedade];
				endif;
			else:
				$atributo_out = 1;		
			endif;
		endforeach;	
		if($atributo_out)
			echo '<br />A propiedade '."<b>$propiedade</b>".' não foi encontrada.<br />';
	}

	function open_file($file, $mode='a'){
		$this->ponteiro = fopen($file, $mode);	
		if ($this->ponteiro == false) die('Não foi possível criar o arquivo.');
	}

	function write_file($write){
		$this->conteudo = fwrite($this->ponteiro, $write);
	}

	function read_file(){
		while(!feof($this->ponteiro)):
			$linha = fgets($this->ponteiro, 4096);
			echo ($linha).'';
		endwhile;
		$this->close_file();
	}

	function close_file(){
		fclose($this->ponteiro);
	}
}
?>
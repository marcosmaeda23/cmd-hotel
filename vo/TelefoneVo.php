<?php

class TelefoneVo{
	
	private $id;
	private $ddd;
	private $ddi;
	private $numero;
	
	public $telefoneObrigatorio = array('ddd','numero');
	
	public $telefoneFormatado = array();
	
	/*
	 * get e set dos atributos da tabela 
	 */
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getDdd(){
		return $this->ddd;
	}
	public function setDdd($ddd){
		$this->ddd = $ddd;
	}
	public function getDdi(){
		return $this->ddi;
	}
	public function setDdi($ddi){
		$this->ddi = $ddi;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function setNumero($numero){
		$this->numero = $numero;
	}
}
?>
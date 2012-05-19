<?php
/**
 * classe do telefone
 * atributos com get e set
 */
class TelefoneVo{
	
	private $id;
	private $telefoneTipo;
	private $ddd;
	private $ddi;
	private $numero;
	private $ramal;
	private $recado;
	
	/**
	 * atributos obrigatorios da classe
	 */
	public $telefoneObrigatorio = array('telefoneTipo', 'ddd','numero');
	
	/**
	 * atributos que precisam validacoes
	 */
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
	public function getTelefoneTipo(){
		return $this->telefoneTipo;
	}
	public function setTelefoneTipo($telefoneTipo){
		$this->telefoneTipo = $telefoneTipo;
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
	public function getRamal(){
		return $this->ramal;
	}
	public function setRamal($ramal){
		$this->ramal = $ramal;
	}
	public function getRecado(){
		return $this->recado;
	}
	public function setRecado($recado){
		$this->recado = $recado;
	}
}

?>
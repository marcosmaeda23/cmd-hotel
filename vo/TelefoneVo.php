<?php
/**
 * classe do telefone
 * atributos com get e set
 */
class TelefoneVo{
	
	private $telefoneId;
	private $usuarioId;
	private $hotelId;
	private $telefoneTipo;
	private $telefoneDdd;
	private $telefoneDdi;
	private $telefoneNumero;
	private $telefoneRamal;
	private $telefoneRecado;
	
	/**
	 * atributos obrigatorios da classe
	 */
	public $telefoneObrigatorio = array('telefoneId'		=> '',
										'usuarioId'			=> '', 
										'hotelId'			=> '', 
										'telefoneTipo'		=> 'obrigatorio', 
										'telefoneDdd'		=> 'obrigatorio',
										'telefoneDdi'		=> '',
										'telefoneNumero'	=> 'obrigatorio',
										'telefoneRamal'		=> '',
										'telefoneRecado' 	=> '');
	
	/**
	 * atributos que precisam validacoes
	 */
	public $telefoneFormatado = array();
	
	/*
	 * get e set dos atributos da tabela 
	 */
	
	public function getTelefoneId(){
		return $this->telefoneId;
	}
	public function setTelefoneId($telefoneId){
		$this->telefoneId = $telefoneId;
	}
	public function getUsuarioId(){
		return $this->usuarioId;
	}
	public function setUsuarioId($usuarioId){
		$this->usuarioId = $usuarioId;
	}
	public function getHotelId(){
		return $this->hotelId;
	}
	public function setHotelId($hotelId){
		$this->hotelId = $hotelId;
	}
	public function getTelefoneTipo(){
		return $this->telefoneTipo;
	}
	public function setTelefoneTipo($telefoneTipo){
		$this->telefoneTipo = $telefoneTipo;
	}
	public function getTelefoneDdd(){
		return $this->telefoneDdd;
	}
	public function setTelefoneDdd($telefoneDdd){
		$this->telefoneDdd = $telefoneDdd;
	}
	public function getTelefoneDdi(){
		return $this->telefoneDdi;
	}
	public function setTelefoneDdi($telefoneDdi){
		$this->telefoneDdi = $telefoneDdi;
	}
	public function getTelefoneNumero(){
		return $this->telefoneNumero;
	}
	public function setTelefoneNumero($telefoneNumero){
		$this->telefoneNumero = $telefoneNumero;
	}
	public function getTelefoneRamal(){
		return $this->telefoneRamal;
	}
	public function setTelefoneRamal($telefoneRamal){
		$this->telefoneRamal = $telefoneRamal;
	}
	public function getTelefoneRecado(){
		return $this->telefoneRecado;
	}
	public function setTelefoneRecado($telefoneRecado){
		$this->telefoneRecado = $telefoneRecado;
	}
}

?>
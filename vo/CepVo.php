<?php

/**
 * classe do cep
 */
class CepVo {
	/*
	 * atributos da tabela cepXedicao, cepCadastro
	 */
	private $cepXedicaoId;
	private $cepId;
	private $cepCadastroId;
	private $hotelId;
	private $usuarioId;
	private $cepXedicaoNumero;
	private $cepXedicaoComplemento;
	private $cepXedicaoTipo;
	
	private $cepCadastroCep;
	private $cepCadastroLogradouro;
	private $cepCadastroBairro;
	private $cepCadastroCidade;
	private $cepCadastroEstado;
	private $cepCadastroPais;
	
	public $cepObrigatorio = array( 'cepXedicaoId'			=> '',
									'cepId'					=> '',
									'cepCadastroId'			=> '',
									'hotelId'				=> '',
									'usuarioId'				=> '',
									'cepXedicaoNumero'		=> 'obrigaorio',
									'cepXedicaoComplemento'	=> 'obrigaorio',
									'cepXedicaoTipo'		=> 'obrigaorio',
									
									'cepCadastroCep'		=> '',
									'cepCadastroLogradouro'	=> '',
									'cepCadastroBairro'		=> '',
									'cepCadastroCidade'		=> '',
									'cepCadastroEstado'		=> '',
									'cepCadastroPais'		=> '');
									
	/*
	 * get e set da classe cepXedicao, cepCadastro
	 */								
	public function getCepXedicaoId(){
		return $this -> cepXedicaoId;
	}								
	public function setCepXedicaoId($cepXedicaoId){
		$this -> cepXedicaoId = $cepXedicaoId;
	}								
	public function getCepId(){
		return $this -> cepId;
	}								
	public function setCepId($cepId){
		$this -> cepId = $cepId;
	}								
	public function getCepCadastroId(){
		return $this -> cepCadastroId;
	}								
	public function setCepCadastroId($cepCadastroId){
		$this -> cepCadastroId = $cepCadastroId;
	}						
	public function getHotelId(){
		return $this->hotelId;
	}
	public function setHotelId($hotelId){
		$this->hotelId = $hotelId;
	}
	public function getUsuarioId(){
		return $this->usuarioId;
	}
	public function setUsuarioId($usuarioId){
		$this->usuarioId = $usuarioId;
	}
	public function getCepXEdicaoNumero(){
		return $this->cepXedicaoNumero;
	}
	public function setCepXdicaoNumero($cepXedicaoNumero){
		$this->cepXedicaoNumero = $cepXedicaoNumero;
	}
	public function getCepXedicaoComplemento(){
		return $this->cepXedicaoComplemento;
	}
	public function setCepXedicaoComplemento($cepXedicaoComplemento){
		$this->cepXedicaoComplemento = $cepXedicaoComplemento;
	}	
	public function getCepXedicaoTipo(){
		return $this->cepXedicaoTipo;
	}
	public function setCepXedicaoTipo($cepXedicaoTipo){
		$this->cepXedicaoTipo = $cepXedicaoTipo;
	}
	// tabela cepCadastro
	public function getCepCadastroCep(){
		return $this->cepCadastroCep;
	}
	public function setCepCadastroCep($cepCadastroCep){
		$this->cepCadastroCep = $cepCadastroCep;
	}
	public function getCepCadastroLogradouro(){
		return $this->cepCadastroLogradouro;
	}
	public function setCepCadastroLogradouro($cepCadastroLogradouro){
		$this->cepCadastroLogradouro = $cepCadastroLogradouro;
	}
	public function getCepCadastroBairro(){
		return $this->cepCadastroBairro;
	}
	public function setCepCadastroBairro($cepCadastroBairro){
		$this->cepCadastroBairro = $cepCadastroBairro;
	}
	public function getCepCadastroCidade(){
		return $this->cepCadastroCidade;
	}
	public function setCepCadastroCidade($cepCadastroCidade){
		$this->cepCadastroCidade = $cepCadastroCidade;
	}
	public function getCepCadastroEstado(){
		return $this->cepCadastroEstado;
	}
	public function setCepCadastroEstado($cepCadastroEstado){
		$this->cepCadastroEstado = $cepCadastroEstado;
	}
	public function getCepCadastroPais(){
		return $this->cepCadastroPais;
	}
	public function setCepCadastroPais($cepCadastroPais){
		$this->cepCadastroPais = $cepCadastroPais;
	}
}
?>

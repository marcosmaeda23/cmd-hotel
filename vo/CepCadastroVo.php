<?php
/**
 * classe do cadastro do cep
 */
class CepCadastroVo {
	/*
	 * atributos da tabela cepCadastro
	 */
	private $cepCadastroId;	
	private $cepXedicaoId;
	private $cepCadastroCep;
	private $cepCadastroLogradouro;
	private $cepCadastroBairro;
	private $cepCadastroCidade;
	private $cepCadastroEstado;
	private $cepCadastroPais;
	
	public $cepCadastroObrigatorio = array( 'cepCadastroId'			=> '',
											'cepXedicaoId'			=> '',
											'cepCadastroCep'		=> 'obrigatorio',
											'cepCadastroLogradouro'	=> 'obrigatorio',
											'cepCadastroBairro'		=> 'obrigatorio',
											'cepCadastroCidade'		=> 'obrigatorio',
											'cepCadastroEstado'		=> 'obrigatorio',
											'cepCadastroPais'		=> 'obrigatorio');
									
	/*
	 * get e set da classe cepXedicao, cepCadastro
	 */								
	public function getCepCadastroId(){
		return $this -> cepCadastroId;
	}								
	public function setCepCadastroId($cepCadastroId){
		$this -> cepCadastroId = $cepCadastroId;
	}						
	public function getCepXedicaoId(){
		return $this -> cepXedicaoId;
	}								
	public function setCepXedicaoId($cepXedicaoId){
		$this -> cepXedicaoId = $cepXedicaoId;
	}
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

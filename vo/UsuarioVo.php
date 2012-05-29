<?php 

/**
 * classse usuario
 * atributos com get e set
 */
class UsuarioVo {
	
	private $usuarioId;					
	private $nivelId;					
	private $usuarioNome;
	private $usuarioEmail;
	private $usuarioDocumentoTipo;
	private $usuarioDocumento;
	private $usuarioDataNascimento;
	private $usuarioSexo;
	private $usuarioLogin;
	private $usuarioSenha;
	private $usuarioLembrete;
	private $usuarioStatus;
	private $usuarioDataCadastro;
	
	private $telefoneVo;		    	// array de objetos
	private $cepXedicaoVo;						// objeto
	private $cepCadastroVo;						// objeto
	
	/**
	 * define os atributos da classe e determina quais atributos serao obrigatorios
	 */
	public $usuarioObrigatorio 	= array('usuarioId' 			=> '',
										'nivelId'	 			=> 'obrigatorio',
										'usuarioNome' 			=> 'obrigatorio',
										'usuarioEmail' 			=> 'obrigatorio',
										'usuarioDocumentoTipo'	=> 'obrigatorio',
										'usuarioDocumento' 		=> 'obrigatorio',
										'usuarioDataNascimento' => 'obrigatorio',
										'usuarioSexo' 			=> 'obrigatorio', 
										'usuarioLogin' 			=> 'obrigatorio',
										'usuarioSenha' 			=> 'obrigatorio',
										'usuarioLembrete' 		=> '',
										'usuarioStatus' 		=> '',
										'usuarioDataCadastro' 	=> '');
	
	/**
	 * atributos que precisam validacoes
	 */
	public $usuarioFormatado 	= array('dataNascimento' => 'data', 
										'senha' => 'senha');
	
	/*
	 * get e set dos atributos da tabela 
	 */
	
	public function getUsuarioId(){
		return $this->usuarioId;
	}
	public function setUsuarioId($usuarioId){
		$this->usuarioId = $usuarioId;
	}
	public function getNivelId(){
		return $this->nivelId;
	}
	public function setNivelId($nivelId){
		$this->nivelId = $nivelId;
	}
	public function getUsuarioNome(){
		return $this->usuarioNome;
	}
	public function setUsuarioNome($usuarioNome){
		$this->usuarioNome = $usuarioNome;
	}
	public function getUsuarioEmail(){
		return $this->usuarioEmail;
	}
	public function setUsuarioEmail($usuarioEmail){
		$this->usuarioEmail = $usuarioEmail;
	}
	public function getUsuarioDocumentoTipo(){
		return $this->usuarioDocumentoTipo;
	}
	public function setUsuarioDocumentoTipo($usuarioDocumentoTipo){
		$this->usuarioDocumentoTipo = $usuarioDocumentoTipo;
	}
	public function getUsuarioDocumento(){
		return $this->usuarioDocumento;
	}
	public function setUsuarioDocumento($usuarioDocumento){
		$this->usuarioDocumento = $usuarioDocumento;
	}
	public function getUsuarioDataNascimento(){
		return $this->usuarioDataNascimento;
	}
	public function setUsuarioDataNascimento($usuarioDataNascimento){
		$this->usuarioDataNascimento = $usuarioDataNascimento;
	}
	public function getUsuarioSexo(){
		return $this->usuarioSexo;
	}
	public function setUsuarioSexo($usuarioSexo){
		$this->usuarioSexo = $usuarioSexo;
	}
	public function getUsuarioLogin(){
		return $this->usuarioLogin;
	}
	public function setUsuarioLogin($usuarioLogin){
		$this->usuarioLogin = $usuarioLogin;
	}
	public function getUsuarioSenha(){
		return $this->usuarioSenha;
	}
	public function setUsuarioSenha($usuarioSenha){
		$this->usuarioSenha = $usuarioSenha;
	}
	public function getUsuarioLembrete(){
		return $this->usuarioLembrete;
	}
	public function setUsuarioLembrete($usuarioLembrete){
		$this->usuarioLembrete = $usuarioLembrete;
	}
	public function getUsuarioStatus(){
		return $this->usuarioStatus;
	}
	public function setUsuarioStatus($usuarioStatus){
		$this->usuarioStatus = $usuarioStatus;
	}
	public function getUsuarioDataCadastro(){
		return $this->usuarioDataCadastro;
	}
	public function setUsuarioDataCadastro($usuarioDataCadastro){
		$this->usuarioDataCadastro = $usuarioDataCadastro;
	}
	
	/*
	 * get e set dos objetos
	 */
	public function getTelefoneVo(){
		return $this->telefoneVo;
	}
	public function setTelefoneVo($telefoneVo){
		$this->telefoneVo = $telefoneVo;
	}
	public function getCepXedicaoVo(){
		return $this->cepXedicaoVo;
	}
	public function setCepXedicaoVo($cepXedicaoVo){
		$this->cepXedicaoVo = $cepXedicaoVo;
	}
	public function getCepCadastroVo(){
		return $this->cepCadastroVo;
	}
	public function setCepCadastroVo($cepCadastroVo){
		$this->cepCadastroVo = $cepCadastroVo;
	}
}



?>
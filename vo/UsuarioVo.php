<?php 

/**
 * classse usuario
 * atributos com get e set
 */
class UsuarioVo {
	 
	private $id;					
	private $nome;
	private $email;
	private $documentoTipo;
	private $documento;
	private $login;
	private $senha;
	private $lembrete;
	private $status;
	private $dataCadastro;
	
	private $telefoneVo;    			// array
	private $nivelAcessoVo;				// objeto
	
	public $usuarioObrigatorio = array('nome','email', 'documentoTipo', 'documento');
	
	public $usuarioFormatado = array();
	
	/*
	 * get e set dos atributos da tabela 
	 */
	
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getDocumentoTipo(){
		return $this->documentoTipo;
	}
	public function setDocumentoTipo($documentoTipo){
		$this->documentoTipo = $documentoTipo;
	}
	public function getDocumento(){
		return $this->documento;
	}
	public function setDocumento($documento){
		$this->documento = $documento;
	}
	public function getLogin(){
		return $this->login;
	}
	public function setLogin($login){
		$this->login = $login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getLembrete(){
		return $this->lembrete;
	}
	public function setLembrete($lembrete){
		$this->lembrete = $lembrete;
	}
	public function getStatus(){
		return $this->status;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function getDataCadastro(){
		return $this->dataCadastro;
	}
	public function setDataCadastro($dataCadastro){
		$this->dataCadastro = $dataCadastro;
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
	public function getNivelAcessoVo(){
		return $this->nivelAcessoVo;
	}
	public function setNivelAcessoVo($nivelAcessoVo){
		$this->nivelAcessoVo = $nivelAcessoVo;
	}
}



?>
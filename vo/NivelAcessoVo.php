<?php 

/**
 * classe nivel de acesso
 */
class NivelAcessoVo {
	
	private $id;
	private $nome;
	
	/**
	 * atributos obrigatorios da classe
	 */
	public $usuarioObrigatorio = array('nome');
	
	/**
	 * atributos que precisam validacoes
	 */
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
	
}

?>
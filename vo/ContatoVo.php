<?php 
//include('../../bpm/ContatoBpm.php');
class ContatoVo {

	// atributos da tabela

	private $contato;
	private $usuario;
	private $contato_nome;
	
	
	
	
	/*
	 * get e set do usuario
	*/
	public function setContato($contato){
		$this->contato = $contato;
	}
	public function getContato(){
		return $this->contato;
	}	
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setContatoNome($contato_nome){
		$this->contato_nome = $contato_nome;
	}
	public function getContatoNome(){
		return $this->contato_nome;
	}
	
	
	
}


?>
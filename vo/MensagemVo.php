<?php 
//include('../../bpm/MensagemBpm.php');
class MensagemVo {

	// atributos da tabela

	private $mensagem;
	private $usuario;
	private $mensagem_texto;
	
	
	
	
	/*
	 * get e set do usuario
	*/
	public function setMensagem($mensagem){
		$this->mensagem = $mensagem;
	}
	public function getMensagem(){
		return $this->mensagem;
	}	
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setMensagemTexto($mensagem_texto){
		$this->mensagem_texto = $mensagem_texto;
	}
	public function getMensagemTexto(){
		return $this->mensagem_texto;
	}
	
	
	
}


?>
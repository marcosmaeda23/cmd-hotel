<?php 
class FotoVo {

	// atributos da tabela

	private $foto;
	private $usuario;
	private $foto_nome;
	private $foto_tipo;	
	
	/*
	 * get e set do usuario
	*/
	public function setFoto($foto){
		$this->foto = $foto;
	}
	public function getFoto(){
		return $this->foto;
	}	
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function setFotoNome($foto_nome){
		$this->foto_nome = $foto_nome;
	}
	public function getFotoNome(){
		return $this->foto_nome;
	}
	public function setFotoTipo($foto_tipo){
		$this->foto_tipo = $foto_tipo;
	}
	public function getFotoTipo(){
		return $this->foto_tipo;
	}
	
	
}


?>
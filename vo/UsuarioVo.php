<?php 
//include('../../bpm/UsuarioBpm.php');
/*
 * classse usuario
 */
class UsuarioVo {
	//
	
	// atributos da tabela

	private $usuario;
	private $usuario_nome;
	private $usuario_login;
	private $usuario_senha;
	private $usuario_email;
	private $usuario_lembrete;
	
	
	
	
	/*
	 * get e set do usuario
	 */
	public function setUsuario($usuario){
		$this->usuario_nome = $usuario;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	
	public function setUsuarioNome($usuario_nome){
		$this->usuario_nome = $usuario_nome;
	}
	public function getUsuarioNome(){
		return $this->usuario_nome;
	}	
	
	public function setUsuarioLogin($usuario_login){
		$this->usuario_login = $usuario_login;
	}
	public function getUsuarioLogin(){
		return $this->usuario_login;
	}
	
	public function setUsuarioSenha($usuario_senha){
		$this->usuario_senha = $usuario_senha;
	}
	public function getUsuarioSenha(){
		return $this->usuario_senha;
	}
	
	public function setUsuarioEmail($usuario_email){
		$this->usuario_email = $usuario_email;
	}
	public function getUsuarioEmail(){
		return $this->usuario_email;
	}
	
	public function setUsuarioLembrete($usuario_lembrete){
		$this->usuario_lembrete = $usuario_lembrete;
	}
	public function getUsuarioLembrete(){
		return $this->usuario_lembrete;
	}
	
}



?>
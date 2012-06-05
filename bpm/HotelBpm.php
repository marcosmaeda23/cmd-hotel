<?php 


/**
 * classe bpm da classe do usuario
 */

class UsuarioBpm extends BpmGenerico{
	
	/**
	 * metodo logar
	 * @param $usuarioVo
	 * @return 0-ok, 1-erro de login, 2-erro de senha, 3-n‹o localizado
	 */
	public function logar($usuarioVo){
		$usuarioDao = new UsuarioDao();
		$resposta = $usuarioDao ->logar($usuarioVo);		
		return $resposta;		
	}	
	
	/**
	 * metodo que verifica se o nome do usuario existe na basa de dados
	 * @param $usuarioVo
	 * @return boolean
	 */
	public function verificarLogin($usuarioVo){
		$usuarioDao = new UsuarioDao();
		$sucesso = $usuarioDao -> verificarLogin($usuarioVo);
		return $sucesso;
		
	}
}


?>
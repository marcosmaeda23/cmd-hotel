<?php 
//include('../../dao/UsuarioDao.php');
class UsuarioBpm {
	public function logar($usuarioVo){
		$usuarioDao = new UsuarioDao();
		$sucesso = $usuarioDao ->logar($usuarioVo);		
		return $sucesso;		
	}
	public function logarComLembrete($usuarioVo){
		$usuarioDao = new UsuarioDao();
		$sucesso = $usuarioDao ->logarComLembrete($usuarioVo);		
		return $sucesso;	
	}
	public function cadastrar($usuarioVo){
		$usuarioDao = new UsuarioDao();
		$sucesso = $usuarioDao -> cadastrar($usuarioVo);
		return $sucesso;
	} 
	public function verificarExistenciaEmail($usuarioVo){
		$usuarioDao = new UsuarioDao();
		$sucesso = $usuarioDao -> verificarExistenciaEmail($usuarioVo);
		return $sucesso;
	}
	

}


?>
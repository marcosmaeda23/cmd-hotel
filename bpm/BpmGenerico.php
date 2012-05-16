<?php
/**
 * classe generica da bpm
 */
class BpmGenerico {
	
	/**
	 * metodo que muda o sa
	 * @param $usuarioVo
	 * @return 0-ok, 1-erro de login, 2-erro de senha, 3-n�o localizado
	 */
	public function alterarStatus($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> alterarStatus($objeto);
		return $sucesso;	
	}
	
	/**
	 * metodo cadastrar ou alterar generico
	 * @param Objeto, entidade
	 * @return boolean
	 */
	public function cadastrarAlterar($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> cadastrarAlterar($objeto);
		return $sucesso;
	}
	/**
	 * metodo excluir generico
	 * @param Objeto, entidade
	 * @return boolean
	 */
	public function excluir($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> excluir($objeto);
		return $sucesso;
	}  
	/**
	 * metodo exibir generico
	 * @param Objeto, entidade
	 * @return Objeto
	 */
	public function exibir($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$resposta = $_objeto -> exibir($objeto);
		return $resposta;
	} 
	/**
	 * metodo pesquisar generico
	 * @param Objeto, entidade
	 * @return array de objetos
	 */
	public function pesquisar($arrayParametros, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$resposta = $_objeto -> pesquisar($arrayParametros);
		return $resposta;
	}
	/**
	 * metodo que verifica se o documento existe no banco
	 * @param objeto e a entidade
	 * @return boolean
	 */
	public function verificarExistenciaDocumento($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> verificarDocumento($objeto);
		return $sucesso;
	}
	/**
	 * metodo que verifica se o email existe no banco
	 * @param objeto e a entidade
	 * @return boolean
	 */
	public function verificarExistenciaEmail($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> verificarExistenciaEmail($objeto);
		return $sucesso;
	}
	
}
?>
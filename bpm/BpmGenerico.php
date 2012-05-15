<?php
/**
 * classe generica da bpm
 */
class BpmGenerico {
	/**
	 * metodo cadastrar generico
	 * @param Objeto, entidade
	 * @return boolean
	 */
	public function cadastrar($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> cadastrar($objeto);
		return $sucesso;
	} 
	public function verificarExistenciaEmail($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> verificarExistenciaEmail($objeto);
		return $sucesso;
	}
}
?>

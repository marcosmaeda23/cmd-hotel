<?php
/**
 * classe generica da bpm
 */
class BpmGenerico {
	
	/**
	 * metodo que altera o status
	 * @param Objeto e entidade
	 * @return boolean
	 */
	public function alterarStatus($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> alterarStatus($objeto);
		return $sucesso;	
	}
	
	/**
	 * metodo buscar
	 * busca os objetos para a listagem
	 * @return array de objetos
	 */
	public function buscar($entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$resposta = $_objeto -> buscar();
		return $resposta;
	}
	
	/**
	 * metodo buscar
	 * busca os objetos para a listagem
	 * @return array de objetos
	 */
	public function buscarComFoto($entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$resposta = $_objeto -> buscarComFoto();
		return $resposta;
	}

	/**
	 * metodo buscar
	 * busca os objetos para a listagem
	 * @return array de objetos
	 */
	public function buscarPoHotel($entidade, $idHotel){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$resposta = $_objeto -> buscarPorHotel($idHotel);
		return $resposta;
	}
	/**
	 * metodo buscar
	 * busca os objetos para a listagem
	 * @return array de objetos
	 */
	public function verificaReserva($entidade, $idHotel){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$resposta = $_objeto -> verificaReserva($idHotel);
		return $resposta;
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
	 * busca o objeto passando o id 
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
	 * @param array, entidade
  	 * @example 1 indice 'entidade' => 'cep'
	 * @return array da pesquisa
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
	public function verificarExistenciaDocumento($objeto, $entidade, $documentotipo){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> verificarDocumento($objeto, $documentotipo);
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
	/**
	 * funcao para verificar se o campo unico ja esta cadastrado no banco
	 * usado ajax
	 * @param objeto e a entidade
	 * @return boolean
	 */
	public function verificaCamposUnicos($objeto, $entidade){
		eval('$_objeto = new '.ucfirst($entidade).'Dao();');
		$sucesso = $_objeto -> verificaCamposUnicos($objeto);
		return $sucesso;
	}
	
}
?>

<?php 
//include('../../dao/ContatoDao.php');
class ContatoBpm {
	
	/**
	 * metodo para cadastrar
	 * @param objeto MensagemVo
	 * @return bool
	 */
	public function cadastrar($contatoVo){
		$contatoDao = new ContatoDao();
		$sucesso = $contatoDao -> cadastrar($contatoVo);
		return $sucesso;
	} 
	/**
	 * metodo para buscar
	 * @return objeto MensagemVo
	 */
	public function buscar($arrayBusca){
		$contatoDao = new ContatoDao();
		$sucesso = $contatoDao -> buscar($arrayBusca);
		return $sucesso;
	}
	/**
	 * metodo para buscar campos obrigatorios na Dao
	 * @return array
	 */
	public function camposObrigatorios(){
		$contatoDao = new ContatoDao();
		return  $contatoDao -> camposObrigatorios();
		
	}

}


?>
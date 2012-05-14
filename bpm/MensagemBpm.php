<?php 
//include('../../dao/MensagemDao.php');
class MensagemBpm {
	
	/**
	 * metodo para cadastrar
	 * @param objeto MensagemVo
	 * @return bool
	 */
	public function cadastrar($mensagemVo){
		$mensagemDao = new MensagemDao();
		$sucesso = $mensagemDao -> cadastrar($mensagemVo);
		return $sucesso;
	} 
	/**
	 * metodo para buscar
	 * @return objeto MensagemVo
	 */
	public function buscar($arrayBusca){
		$mensagemDao = new MensagemDao();
		$sucesso = $mensagemDao -> buscar($arrayBusca);
		return $sucesso;
	}
	/**
	 * metodo para buscar campos obrigatorios na Dao
	 * @return array
	 */
	public function camposObrigatorios(){
		$mensagemDao = new MensagemDao();
		return  $mensagemDao -> camposObrigatorios();
		
	}

}


?>
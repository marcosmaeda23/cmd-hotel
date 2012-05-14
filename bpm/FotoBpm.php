<?php 
//include('../../dao/MensagemDao.php');
class FotoBpm {
	
	/**
	 * metodo para cadastrar
	 * @param objeto MensagemVo
	 * @return bool
	 */
	public function cadastrar($fotoVo){
		$fotoDao = new FotoDao();
		$sucesso = $fotoDao -> cadastrar($fotoVo);
		return $sucesso;
	} 
	/**
	 * metodo para buscar
	 * @return objeto MensagemVo
	 */
	public function buscar($arrayBusca){
		$fotoDao = new FotoDao();
		$sucesso = $fotoDao -> buscar($arrayBusca);
		return $sucesso;
	}
	/**
	 * metodo para buscar campos obrigatorios na Dao
	 * @return array
	 */
	public function camposObrigatorios(){
		$fotoDao = new FotoDao();
		return  $fotoDao -> camposObrigatorios();
		
	}
	/**
	 * metodo para excluir foto
	 * @param parametro de exclusao where
	 */
	public function excluir($param){
		$fotoDao = new FotoDao();
		return  $fotoDao -> excluir($param);
	}

}


?>
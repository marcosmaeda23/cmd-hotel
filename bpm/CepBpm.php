<?php

/**
 * classe do cep
 */
class CepBpm extends BpmGenerico {
	
	/**
	 * metodo que busca o cep
	 * @param cepVo
	 * @return CepVo, boolean
	 */
	public function buscarCep($objetoVo) {
		$cepXedicaoDao = new CepXedicaoDao();
		$resposta = $cepXedicaoDao -> buscarCep($objetoVo);
		return $resposta;	
	}
}

?>

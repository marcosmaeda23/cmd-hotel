<?php
require_once '../../dao/Banco.php';
require_once '../../dao/Entidade.php';
require_once '../../dao/UsuarioDao.php';
require_once '../../dao/TelefoneDao.php';
require_once '../../dao/CepXedicaoDao.php';

require_once '../../bpm/BpmGenerico.php';
require_once '../../bpm/UsuarioBpm.php';
require_once '../../bpm/CepBpm.php';

require_once '../../vo/UsuarioVo.php';
require_once '../../vo/CepVo.php';
require_once '../../vo/CepCadastroVo.php';
require_once '../../vo/TelefoneVo.php';

require_once '../../biblioteca/funcoes.php';
// ------------------------------------------
// Pesquisar o cep vindo do modulo via ajax
// ------------------------------------------
if ($_POST['acao'] == 'pesquisarCep'){
	$cepBpm = new CepBpm();
	$cepVo = new CepVo();
	
	$cepVo -> setCepNumero($_POST['cep']);
	
	
	$resposta = $cepBpm -> buscarCep($cepVo);
	if ($resposta == false) {
		echo 'fracasso';
	} else {
		echo 'sucesso';
	}
 	
}

?>

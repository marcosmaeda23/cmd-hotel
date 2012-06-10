<?php
$necessario = array('usuario', 'hotel');
include('../template/iniciarDados.php');

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

if ($_POST['acao'] == 'verificaCamposUnicos') {
	//entidade, campo, valor
	eval('$_objetoVo = new '.ucfirst($_POST['entidade']).'Vo();');
	eval('$_objetoVo -> set'.ucfirst($_POST['campo']).'("'.$_POST['valor'].'");');
	eval('$_objetoBpm = new '.ucfirst($_POST['entidade']).'Bpm();');
	$sucesso = $_objetoBpm -> verificaCamposUnicos($_objetoVo, $_POST['entidade']);
	if($sucesso){
		// achou
		echo 'sucesso';
	} else {
		// nao achou
		echo 'fracasso';
	}
}


if($_POST['acao'] == 'excluir'){
	//entidade, campo, valor
	eval('$_objetoVo = new '.ucfirst($_POST['entidade']).'Vo();');
	eval('$_objetoVo -> set'.ucfirst($_POST['entidade']).'Id("'.$_POST['id'].'");');
	eval('$_objetoBpm = new '.ucfirst($_POST['entidade']).'Bpm();');
	$sucesso = $_objetoBpm -> excluir($_objetoVo, $_POST['entidade']);
	if($sucesso){
		// excluiu
		echo 'sucesso';
	} else {
		// nao excluiu
		echo 'fracasso';
	}
	
	
	
	
}

?>

<?php 
$ERRO = false;
$sucesso = false;
$erro_nome = '';


/**
 * fun‹o que sai da sess‹o
 */
function deslogar(){
	session_start();
	session_unset();
	session_destroy();
	return true;
}

/**
 * metodo que muda a data de dd/mm/yyyy para yyyy-mm-dd e vice-versa
 * @param data
 * @return data formatada
 */
function formataData($data){
	
}
/**
 * metodo que verifica se a data Ž v‡lida e moda para o formato do banco, yyyy-mm-dd
 * @param data
 * @return dataFormatada
 */
function validaData($data){
	
	
}

/**
 * fun‹o que verifica se o email Ž v‡lido
 * @param email
 * @return bool
 */
function validaEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		return true;
	}else{
		return false;
	}
}
/**
 * funcao que verifica se a senha e confirmacao da senha sao iguais e do mesmo tipo
 * @param senha e confirmacao senha
 * @return bool 
 */
function verificarConfirmacaoSenha($senha, $confirmacaoSenha){
	if($senha === $confirmacaoSenha){
		return true;
	} else {
		return false;
	}
}

?>
<?php 
$ERRO = false;
$sucesso = false;
$erro_nome = '';


/**
 * funcao qua sai da sessao
 */
function deslogar(){
	session_start();
	session_unset();
	session_destroy();
	return true;
}


/**
 * funcao que verifica se e numero
 * @param numero
 * @return bool
 */
function isNumero($numero){
	
}
/**
 * funcao que verifica se e string
 * @param string
 * @return bool
 */
function isString($string){

}
/**
 * funcao que verifica se o email eh valido
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
<?php 
$ERRO = false;
$sucesso = false;
$erro_nome = '';




/**
 * Retorna uma string de saudação ao usuário logado
 * Ex.: "Boa noite, Maria Fernanda"
 * @return string
 */
function cumprimenta() {
	$inicio_manha = '04:00';
	$inicio_tarde = '12:00';
	$inicio_noite = '19:00';
	
	$time_agora = time();
	$time_inicio_manha = strtotime(date("Y-m-d $inicio_manha"));
	$time_inicio_tarde = strtotime(date("Y-m-d $inicio_tarde"));
	$time_inicio_noite = strtotime(date("Y-m-d $inicio_noite"));
	
	if($time_agora >= $time_inicio_manha && $time_agora < $time_inicio_tarde) {
		$saudacao = "Bom dia, ";
	} else if($time_agora >= $time_inicio_tarde && $time_agora < $time_inicio_noite) {
		$saudacao = "Boa tarde, ";
	} else if($time_agora >= $time_inicio_noite || $time_agora < $time_inicio_manha) {
		$saudacao = "Boa noite, ";
	}
	
	if($_SESSION['NOME']) {
		$saudacao .= $_SESSION['NOME'];
	} 
	return $saudacao;
}

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
 * funcao para validar a data e muda para a data do banco
 * @param data dd/mm/YYYY
 * @return data YYYY-mm-dd ou false
 */
function validarData($data){
	$dt = explode("/", $data); 
	$y = $dt[2];
	$m = $dt[1];
	$d = $dt[0];
	$sucesso = checkdate($m,$d,$y);
	if (!$sucesso){	
		return false;
	} else {
		$data_db = $y."-".$m."-".$d;
		return $data_db;
	}
	
}

/**
 * funcao para validar documento
 * @param documentoTipo-'cpf','cnpj'-, documento: String
 * @return boolean
 */
function validarDocumento($documentoTipo, $documento){
	if ($documentoTipo == 'cpf') {
		/*
		// Verifiva se o número digitado contém todos os digitos
		$cpf = str_pad(ereg_replace('[^0-9]', '', $documento), 11, '0', STR_PAD_LEFT);
	
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || 
			    		$cpf == '00000000000' || 
			    		$cpf == '11111111111' || 
			    		$cpf == '22222222222' || 
			    		$cpf == '33333333333' || 
			    		$cpf == '44444444444' || 
			    		$cpf == '55555555555' || 
			    		$cpf == '66666666666' || 
			    		$cpf == '77777777777' || 
			    		$cpf == '88888888888' ||
			    		$cpf == '99999999999') {
			return false;
	    } else {   // Calcula os números para verificar se o CPF é verdadeiro
	        for ($t = 9; $t < 11; $t++) {
	            for ($d = 0, $c = 0; $c < $t; $c++) {
	                $d += $cpf{$c} * (($t + 1) - $c);
	            }	
	            $d = ((10 * $d) % 11) % 10;	
	            if ($cpf{$c} != $d) {
	                return false;
	            }
	        }	
	        return true;
		}*/
		
		return true;
	} else if ($documentoTipo == 'cnpj') {
		return true;
	} else if ($documentoTipo == 'iE') {
		return true;
	}	
}

/**
 * funcao que verifica se o email eh valido
 * @param email
 * @return bool
 */
function validarEmail($email){
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,4})$";
	$pattern = $conta.$domino.$extensao;
	if (ereg($pattern, $email)) {
		return true;
	} else {
		return false;
	}
}
/**
 * funcao que verifica se a senha e confirmacao da senha sao iguais e do mesmo tipo
 * @param senha e confirmacao senha
 * @return bool 
 */
function verificarConfirmacaoSenha($senha, $confirmacaoSenha){
	if($senha == $confirmacaoSenha){
		return true;
	} else {
		return false;
	}
}

?>
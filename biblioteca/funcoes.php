<?php 


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
 * funcao que envia o email para o cliente apos ser cadastrado
 * @param nome, email, login, senha
 * @return boolean 
 */
function enviarEmail($nome, $email, $login, $senha){
	
	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require_once("class.phpmailer.php");
	
	// Inicia a classe PHPMailer
	$mail = new PHPMailer();
	
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->Host = "smtp.dominio.net"; // Endereço do servidor SMTP
	//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	//$mail->Username = 'seumail@dominio.net'; // Usuário do servidor SMTP
	//$mail->Password = 'senha'; // Senha do servidor SMTP
	
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "seumail@dominio.net"; // Seu e-mail
	$mail->FromName = "Joãozinho"; // Seu nome
	
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress('fulano@dominio.com.br', 'Fulano da Silva');
	$mail->AddAddress('ciclano@site.net');
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
	
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
	$mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>! <br />" ;
	$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano!";
	
	// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
	
	// Envia o e-mail
	$enviado = $mail->Send();
	
	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
	// Exibe uma mensagem de resultado
	if ($enviado) {
		return true;
	} else {
		return false;
	}	
}
/***
 * Transforma uma data no formato DD/MM/AAAA pra AAAA-MM-DD ou vice-versa
 * @param string $data
 * @param boolean $resumido Antigo - n„o deve mais ser usado
 * @return string
 */
function formatarData($data, $resumido = false) {
	$_data = explode("-",$data);
	if(count($_data)==3) {
		$ano = ($resumido ? substr($_data[0], 2) : $_data[0]);
		$data_form = $_data[2]."/".$_data[1]."/".$ano;
		return $data_form;
	}
	$_data = explode("/",$data);
	if(count($_data)==3) {
		$data_db = $_data[2]."-".$_data[1]."-".$_data[0];
		return $data_db;
	}
}

/**
 * funcao que troca a mascara do valor para inserir no banco
 * @example 90,78 vira 90.78
 * @return valor formatado
 */
function formatarValor($valor){	
	if(strstr($valor, ',')){
		$valorFormatado = str_replace(",", ".", $valor);
	} else {
		$valorFormatado = str_replace(".", ",", $valor);		
	}
	
	return $valorFormatado;
}

/**
 * funcao para validar a data 
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
		$data_br = $d."-".$m."-".$y;
		return $data_br;
	}
	
}
/**
 * funcao que retira a mascara 
 * @return 
 */
function retirarMascara($valor){	
	$caracteres = array(" ", "-", "_", ",");
	$resultado = str_replace($caracteres, "", $valor);
	
	return $resultado;
}

/**
 * funcao para validar documento
 * @param documentoTipo-'cpf','cnpj'-, documento: String
 * @return boolean
 */
function validarDocumento($documentoTipo, $documento){
	$numero = retirarMascara($documento);
	if ($documentoTipo == 'cpf') {
		
		// Verifiva se o número digitado contém todos os digitos
		$cpf = str_pad(ereg_replace('[^0-9]', '', $numero), 11, '0', STR_PAD_LEFT);
	
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
		}
	} else if ($documentoTipo == 'cnpj') {
		
		
		return true;
	} else if ($documentoTipo == 'iE') {
		return true;
	}	
	return true;
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
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
 * funcao que move a foto para a pasta, 
 */
function salvarFoto($arrayFoto, $caminho){
	// Instanciamos o objeto Upload
	$handle = new Upload($arrayFoto);
	// Então verificamos se o arquivo foi carregado corretamente
	 var_dump($handle);
	if ($handle->uploaded) {
		// Definimos as configurações desejadas da imagem maior
		$handle->image_resize = true;
		$handle->image_ratio_y = false;
		$handle->image_x = 640;
		$handle->image_y = 480;
		// Definimos a qualidade da imagem a ser enviada para o servidor, por default é 85
		$handle->jpeg_quality = 70;
		// adiciona um complemento no nome do arquivo
		$handle->file_name_body_add = time();
		$handle->mime_check = true;
		/*
		// seta marca dagua 
		$handle->image_watermark = 'watermark.png';
		// posicao X e Y da marca dagua
		$handle->image_watermark_x = -10;
		$handle->image_watermark_y = -10;
		// Define a posição onde colocar a marca d'agua, a combinação pode ser 1 ou 2 para 'TBLR': top, bottom, left, right (default: NULL)
		$handle->image_watermark_position = 'LR';
		
		 
		// Definimos um novo nome para nossa imagem
		$handle->file_new_name_body = 'nome1';		 
		// Adicionamos um nome no final do arquivo, ou seja no final do nome ele inclui o _data ficando nome1_data
		$handle->file_name_body_add = '_data';		 
		// Mudamos a extensão do arquivo para txt ou outro qualquer
		$handle->file_new_name_ext = 'txt';		 
		// Formata o nome do arquivo (espaço subtituido por _)
		$handle->file_safe_name = true;		 
		// Sobrescrever o arquivo de mesmo nome, por default é false
		$handle->file_overwrite = false;
		// Converter o tipo de imagem para os ossíveis tipos: ''|'png'|'jpeg'|'gif' default: ''
		$handle->image_convert = 'jpg';
		
		 
		// Em caso da opção image_resize == true
		// Definimos o tamanho da Largura, por default é 150
		$handle->image_x = 100;
		 
		// Definimos o tamanho da altura, por default é 150
		$handle->image_y = 200;
		 
		// Se true, redimensiona a imagem conservar o tamanhos original, utilizando image_x E image_y como tamanhos máximo se true (padrão: falso)
		$handle->image_ratio = true;
		 
		// Corta a imagem
		$handle->image_ratio_crop = true;
		  
		// Redimenciona proporcional a imagem original em X (default: false)
		$handle->image_ratio_x = true;
		 
		// Redimenciona proporcional a imagem original em Y (default: false)
		$handle->image_ratio_y = true;
		// Aplicamos um texto sobre a imagem (default: NULL)
		$handle->image_text = 'Revista PHP';
		 
		// Determinamos a região da imagem que aplicamos o texto, 'h' horizontal ou 'v' vertical (default: 'h')
		$handle->image_text_direction = 'v';		 
		// Definimos a cor do texto em hexadecimal (default: #FFFFFF)
		$handle->image_text_color = '#FF0000';		 
		// Definimos a opacidade do texto, valores entre 0 e 100 (default: 100)
		$handle->image_text_percent = 50;		 
		// Aplicamos cor de fundo no texto, em hexadecimal (default: NULL)
		$handle->image_text_background = '#FFFFFF';		 
		// Definimos a opacidade do background, valores entre 0 e 100 (default: 100)
		$handle->image_text_background_percent = 50;		 
		// Tamanho da fonte, valores de 1 a 5. default: 5
		$handle->image_text_font = 4;		 
		// Região da imagem para mostrar o texto em X (default: NULL)
		$handle->image_text_x = 5;		 
		// Região da imagem para mostrar o texto em Y (default: NULL)
		$handle->image_text_y = 5;		 
		// Região da imagem para mostrar o texto, a combinação de 1 ou 2 para 'TBLR': top, bottom, left, right (default: NULL)
		$handle->image_text_position = 'LR';		 
		// Definimos o espaçamento em X e Y (default: 0)
		$handle->image_text_padding = 5;		 
		// Definimos o espaçamento em X (default: NULL)
		$handle->image_text_padding_x = 2;		 
		// Definimos o espaçamento em Y (default: NULL)
		$handle->image_text_padding_y = 10;
		 
		// Alinhamos o texto, 'L', 'C' ou 'R' (default: 'C')
		$handle->image_text_alignment = 'R';		 
		// Aplicando espaçamento entre as linhas (default: 0)
		$handle->image_text_line_spacing = 3;
		
		// Cortando a imagem em varios pontos. aceita 4, 2 ou 1. Valor 'T R B L' ou 'TB LR' ou 'TBLR'. Dimensão pode ser de 20, ou 20% ou 20px (default: NULL)
		$handle->image_crop = array(50,40,30,20); // ou '-20 20%'...
 	
		*/
		// Criamos automaticamente o diretória caso não exista no servidor, por default é true
		$handle->auto_create_dir = true;
		// Definimos a pasta para onde a imagem maior será armazenada
		$handle->Process('../upload/'.$caminho);
		 
		// Em caso de sucesso no upload podemos fazer outras ações como insert em um banco de cados
		if ($handle->processed) {
			// Aqui nos devifimos nossas configurações de imagem do thumbs
			$handle->image_resize = true;
			$handle->image_ratio_y = false;
			$handle->image_x = 100;
			$handle->image_y = 75;
			$handle->image_contrast = 10;
			$handle->jpeg_quality = 70;
			$handle->file_name_body_add = time();
			 
			// Definimos a pasta para onde a imagem thumbs será armazenada
			$handle->Process('../upload/thumb/'.$caminho);
			// Excluimos os arquivos temporarios
			$handle-> Clean();
			if ($handle->processed) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}		 
	} else {
		return false;
	}
	// retorna p nome da variavel
	//$nome_da_imagem = $handle->file_dst_name;		 	
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
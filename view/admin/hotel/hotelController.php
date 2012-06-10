<?php
$necessario = array('hotel');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 

if ($_POST['acao'] == 'cadastrarHotel') {
    $hotelVo = new HotelVo();
    $hotelBpm = new HotelBpm();
    $telefoneVo = new TelefoneVo();
    $cepXedicaoVo = new CepXedicaoVo();
    $cepCadastroVo = new CepCadastroVo();
    
     if(!empty($_POST['hotelId'])){
    	$verificarUnicos = false;    	
    }
    // verifica se os campos do hotel estao vazios		
    foreach ($hotelVo->hotelObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave])) {
                $erro_nome = 'Preencha todos os campos do formulário.';
                $ERRO = true;
            }
        }
    }
    // verifica se os campos do telefone estao vazios na posicao 0		
    foreach ($telefoneVo->telefoneObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave][0])) {
                $erro_nome = 'Preencha todos os campo do formulárioX.';
                $ERRO = true;
            }
        }
    }

    // verifica se os campos do cadastro do cep estao vazios
    if (isset($_POST['cepCadastroLogradouro'])) {
        foreach ($cepCadastroVo->cepCadastroObrigatorio as $chave => $valor) {
            // faz a validacao dos campos obrigatorios, setados na classe
            if ($valor == 'obrigatorio') {
                if (empty($_POST[$chave])) {
                    $erro_nome = 'Preencha todos os campos do formulárioCALASTRO LOGRADOURO.';
                    $ERRO = true;
                }
            }
        }
    }
    // verifica se os campos do CepXedicao estao completos
    foreach ($cepXedicao->$cepXedicaoObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave])) {
                $erro_nome = 'Preencha todos os campos do formulário CEPXEDIÇÂO.';
                $ERRO = true;
            }
        }
    }
    // se não teve enhum erro de campos obrigatorios
    if (!$ERRO) {
        // loop para fazer as validacoes do post inteiro

        foreach ($_POST as $chave => $valor) {
            // validacoes
            if ($chave == 'hotelEmail') {
                // verifica se o email esta no formato valido
                $sucesso = validarEmail($valor);
                if (!$sucesso) {
                    $ERRO = true;
                    $erro_nome .= 'O email não é válido.';
                    break;
                }
                if($verificarUnicos) {
	                // verificar se email ja existe no banco	        
	                $hotelVo->setHotelEmail($valor);
	
	                $sucesso = $hotelBpm->verificarExistenciaEmail($hotelVo, 'hotel');
	                if (!$sucesso) {
	                    $ERRO = true;
	                    $erro_nome .= 'O email já está cadastrado na base de dados.';
	                    break;
	                }
                }
                if($verificarUnicos) {
	                // verificar se email ja existe no banco	        
	                $hotelVo->setHotelCnpj($valor);
	
	                $sucesso = $hotelBpm->verificarExistenciaDocumento($hotelVo, 'hotel', 'cnpj');
	                if (!$sucesso) {
	                    $ERRO = true;
	                    $erro_nome .= 'O cnpj já está cadastrado na base de dados.';
	                    break;
	                }
                }
            }
        }
    }
    // aqui insere dentro dos objetos respectivos
    if (!$ERRO) {
        for ($j = 0; $j < count($_POST['telefoneTipo']); $j++) {
            eval('$telefoneVo' . $j . ' = new TelefoneVo();');
        }
        // loop so para inserir os valores dentro dos objetos
        foreach ($_POST as $chave => $valor) {
            //var_dump($chave);
            // verifica os atributos do ususario e insere dentro dele
            if (array_key_exists($chave, $hotelVo->hotelObrigatorio)) {
                eval('$hotelVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
            // verifica os atributos do cep edicao
            if (array_key_exists($chave, $cepXedicaoVo->cepXedicaoObrigatorio)) {
                eval('$cepXedicaoVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
            // verifica os atributos do cepCadastro
            if (array_key_exists($chave, $cepCadastroVo->cepCadastroObrigatorio)) {
                eval('$cepCadastroVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
            // inserindo manualmente pois não rolou colocar dinamico, telefone é array
            for ($j = 0; $j < count($_POST['telefoneTipo']); $j++) {
                eval('$telefoneVo' . $j . ' ->setTelefoneId(' . $_POST["telefoneId"][$j] . ');');
                eval('$telefoneVo' . $j . ' ->setTelefoneDdd(' . $_POST["telefoneDdd"][$j] . ');');
                eval('$telefoneVo' . $j . ' ->setTelefoneDdi(' . $_POST["telefoneDdi"][$j] . ');');
                eval('$telefoneVo' . $j . ' ->setTelefoneNumero(' . $_POST["telefoneNumero"][$j] . ');');
                eval('$telefoneVo' . $j . ' ->setTelefoneRamal(' . $_POST["telefoneRamal"][$j] . ');');
                eval('$telefoneVo' . $j . ' ->setTelefoneTipo(' . $_POST["telefoneTipo"][$j] . ');');
                eval('$telefoneVo' . $j . ' ->setTelefoneRecado(' . $_POST["telefoneRecado"][$j] . ');');
            }
        }
        // coloca o objeto dantro do array
        $telefone = array();
        for ($i = 0; $i < count($_POST['telefoneTipo']); $i++) {
            eval('$telefone[] = $telefoneVo' . $i . ';');
        }
        $hotelVo->setTelefoneVo($telefone);
        $hotelVo->setCepXedicaoVo($cepXedicaoVo);
        $hotelVo->setCepCadastroVo($cepCadastroVo);
    }
    if (!$ERRO) {
        $sucesso = $hotelBpm->cadastrarAlterar($hotelVo, 'hotel');
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o hotel';
        }
    }

    if (!$ERRO) {
        echo '<script language="JavaScript">';
        echo 'alert("Bem vindo");';
        echo 'location.href="../home/index.php";';
        echo '</script>';
    } else {
        echo '<script language="JavaScript">';
        echo 'alert("' . $erro_nome . '");';
        echo 'location.href="index.php";';
        echo '</script>';
    }
}
?>

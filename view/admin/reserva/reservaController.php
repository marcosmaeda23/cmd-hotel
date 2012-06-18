<?php

$necessario = array('reserva', 'itemReserva');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 
if ($_POST['acao'] == 'verificaReserva') {

	$itemReservaVo = new itemReservaVo();
	$itemReservaVo ->setItemReservaDataInicial($_POST['itemReservaDataInicial']);
	$itemReservaVo ->setItemReservaDataFinal($_POST['itemReservaDataFinal']);
	$itemReservaVo ->setQuartoId($_POST['quartoId']);

	$itemReservaBpm = new itemReservaBpm();
	
	$sucesso = $itemReservaBpm->verificaReserva($itemReservaVo, 'itemReserva');
	if($sucesso){
		$_POST['acao'] = 'cadastrarReserva';
	} else {
		return 'fracasso';
	}


}

if ($_POST['acao'] == 'cadastrarReserva') {
    $reservaVo = new ReservaVo();
    $reservaBpm = new ReservaBpm();

    $itemReservaVo = new ItemReservaVo();
    $itemReservaBpm = new ItemReservaBpm();

    if (!empty($_POST['reservaId'])) {
        $verificarUnicos = false;
    }
    // verifica se os campos do reserva estao vazios		
    foreach ($reservaVo->reservaObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave])) {
                $erro_nome = 'Preencha todos os campos do formulário.';
                $ERRO = true;
            }
        }
    }

    // verifica se os campos do CepXedicao estao completos
    foreach ($itemReservaVo->itemReservaObrigatorio as $chave => $valor) {
        // faz a validacao dos campos obrigatorios, setados na classe
        if ($valor == 'obrigatorio') {
            if (empty($_POST[$chave])) {
                $erro_nome = 'Preencha todos os campos do formulário.';
                $ERRO = true;
            }
        }
    }
    // se não teve enhum erro de campos obrigatorios
    if (!$ERRO) {
        // loop para fazer as validacoes do post inteiro

        foreach ($_POST as $chave => $valor) {
            // validacoes

            if ($chave == 'itemReservaDataInicial') {
                // verifica se a data eh invalida, se for muda para a data do banco
                $chave = validarData($valor);
                if ($chave == false) {
                    $ERRO = true;
                    $erro_nome .= 'A data não é válida.';
                    break;
                }
            }
            if ($chave == 'itemReservaDataFinal') {
                // verifica se a data eh invalida, se for muda para a data do banco
                $chave = validarData($valor);
                if ($chave == false) {
                    $ERRO = true;
                    $erro_nome .= 'A data não é válida.';
                    break;
                }
            }
        }
    }
    // aqui insere dentro dos objetos respectivos
    if (!$ERRO) {

        // loop so para inserir os valores dentro dos objetos
        foreach ($_POST as $chave => $valor) {
            //var_dump($chave);
            // verifica os atributos do reserva e insere dentro dele
            if (array_key_exists($chave, $reservaVo->reservaObrigatorio)) {
                eval('$reservaVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
            // verifica os atributos do itemReservaVo
            if (array_key_exists($chave, $itemReservaVo->itemReservaObrigatorio)) {
                eval('$itemReservaVo->set' . ucfirst($chave) . '("' . $valor . '");');
            }
        }
    }
    var_dump($itemReservaVo);

    if (!$ERRO) {
        $reservaId = $reservaBpm->cadastrarAlterar($reservaVo, 'reserva');
        $itemReservaVo->setReservaId($reservaId);
        $sucesso = $itemReservaBpm->cadastrarAlterar($itemReservaVo, 'itemReserva');
        if (!$sucesso) {
            $ERRO = true;
            $erro_nome .= 'O ocorreu um erro ao cadastrar o Reserva';
        }
    }

    if (!$ERRO) {
       echo 'fracasso';
    } else {
        echo 'sucesso';
    }
}
?>

<?php

$necessario = array('reserva', 'itemReserva');
include('../template/iniciarDados.php');

// -------------------------------
// para cadastrar ou alterar
// ------------------------------- 
if ($_POST['acao'] == 'verificaReserva') {

    $reservaVo = new ReservaVo();
    $reservaBpm = new ReservaBpm();
	$itemReservaVo = new itemReservaVo();
	$itemReservaBpm = new itemReservaBpm();
	
	$itemReservaVo ->setItemReservaDataInicial($_POST['itemReservaDataInicial']);
	$itemReservaVo ->setItemReservaDataFinal($_POST['itemReservaDataFinal']);
	$itemReservaVo ->setQuartoId($_POST['quartoId']);

	
	$sucesso = $itemReservaBpm->verificaReserva($itemReservaVo, 'itemReserva');
	if(!$sucesso){
		return 'fracasso';
	} else {
	    // aqui insere dentro dos objetos respectivos
	   
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
	
	
        $reservaId = $reservaBpm->cadastrarAlterar($reservaVo, 'reserva');
        echo $reservaId;
        $itemReservaVo->setReservaId($reservaId);
        $sucesso = $itemReservaBpm->cadastrarAlterar($itemReservaVo, 'itemReserva');
        if ($sucesso === false) {
	       	echo 'fracasso';
        } else {
	    	echo 'sucesso';        	
        }
	
	}
}
?>

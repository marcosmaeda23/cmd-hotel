<?php

/**
 * classe do ItemReserva
 */
class ItemReservaVo {
    /*
     * atributos da tabela ItemReserva
     */

    private $itemReservaId;
    private $quartoId;
    private $cardapioId;
    private $ambienteId;
    private $servicoId;
    private $reservaId;
    private $itemReservaDataInicial;
    private $itemReservaDataFinal;
    private $itemReservaDataCadastro;
    
    public $itemReservaObrigatorio = array(
        'itemReservaId' => '',
        'quartoId' => '',
        'cardapioId' => '',
        'ambienteId' => '',
        'servicoId' => '',
        'reservaId' => '',
        'itemReservaDataInicial' => '',
        'itemReservaDataFinal' => '',
        'itemReservaDataCadastro' => ''
    );

    /*
     * get e set da classe ItemReserva
     */
    public function getItemReservaId() {
        return $this->itemReservaId;
    }

    public function setItemReservaId($itemReservaId) {
        $this->itemReservaId = $itemReservaId;
    }

    public function getQuartoId() {
        return $this->quartoId;
    }

    public function setQuartoId($quartoId) {
        $this->quartoId = $quartoId;
    }

    public function getCardapioId() {
        return $this->cardapioId;
    }

    public function setCardapioId($cardapioId) {
        $this->cardapioId = $cardapioId;
    }

    public function getAmbienteId() {
        return $this->ambienteId;
    }

    public function setAmbienteId($ambienteId) {
        $this->ambienteId = $ambienteId;
    }

    public function getServicoId() {
        return $this->servicoId;
    }

    public function setServicoId($servicoId) {
        $this->servicoId = $servicoId;
    }

    public function getReservaId() {
        return $this->reservaId;
    }

    public function setReservaId($reservaId) {
        $this->reservaId = $reservaId;
    }

    public function getItemReservaDataInicial() {
        return $this->itemReservaDataInicial;
    }

    public function setItemReservaDataInicial($itemReservaDataInicial) {
        $this->itemReservaDataInicial = $itemReservaDataInicial;
    }

    public function getItemReservaDataFinal() {
        return $this->itemReservaDataFinal;
    }

    public function setItemReservaDataFinal($itemReservaDataFinal) {
        $this->itemReservaDataFinal = $itemReservaDataFinal;
    }

    public function getItemReservaDataCadastro() {
        return $this->itemReservaDataCadastro;
    }

    public function setItemReservaDataCadastro($itemReservaDataCadastro) {
        $this->itemReservaDataCadastro = $itemReservaDataCadastro;
    }
}

?>

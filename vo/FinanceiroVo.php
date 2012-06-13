<?php

/**
 * classe do Financeiro 
 */
class FinanceiroVo {
    /*
     * atributos da tabela Financeiro
     */

    private $financeiroId;
    private $reservaId;
    private $usuarioSistemaId;
    private $valor;
    private $dataCadastro;
    
    public $financeiroObrigatorio = array(
        'financeiroId' => '',
        'reservaId' => '',
        'usuarioSistemaId' => '',
        'valor' => '',
        'dataCadastro' => ''
    );

    /*
     * get e set da classe Financeiro
     */
    public function getFinanceiroId() {
        return $this->financeiroId;
    }

    public function setFinanceiroId($financeiroId) {
        $this->financeiroId = $financeiroId;
    }

    public function getReservaId() {
        return $this->reservaId;
    }

    public function setReservaId($reservaId) {
        $this->reservaId = $reservaId;
    }

    public function getUsuarioSistemaId() {
        return $this->usuarioSistemaId;
    }

    public function setUsuarioSistemaId($usuarioSistemaId) {
        $this->usuarioSistemaId = $usuarioSistemaId;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
}
?>

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
    private $pagamentoId;
    private $usuarioSistemaId;
    private $financeiroValor;
    private $financeiroDataCadastro;
    
    public $financeiroObrigatorio = array(
        'financeiroId' => '',
        'reservaId' => '',
        'pagamentoId' => '',
        'usuarioSistemaId' => '',
        'financeiroValor' => '',
        'financeiroDataCadastro' => ''
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

    public function getPagamentoId() {
        return $this->pagamentoId;
    }

    public function setPagamentoId($pagamentoId) {
        $this->pagamentoId = $pagamentoId;
    }

    public function getUsuarioSistemaId() {
        return $this->usuarioSistemaId;
    }

    public function setUsuarioSistemaId($usuarioSistemaId) {
        $this->usuarioSistemaId = $usuarioSistemaId;
    }

    public function getFinanceiroValor() {
        return $this->financeiroValor;
    }

    public function setFinanceiroValor($financeiroValor) {
        $this->financeiroValor = $financeiroValor;
    }

    public function getFinanceiroDataCadastro() {
        return $this->financeiroDataCadastro;
    }

    public function setFinanceiroDataCadastro($financeiroDataCadastro) {
        $this->financeiroDataCadastro = $financeiroDataCadastro;
    }
}
?>

<?php

/**
 * classe do Pacote 
 */
class PacoteVo {
    /*
     * atributos da tabela PacoteVo
     */

    private $pacoteId;
    private $quartoId;
    private $cardapioId;
    private $ambienteId;
    private $servicoId;
    private $nome;
    private $dataInicial;
    private $dataFinal;
    private $periodo;
    private $pessoas;
    private $desconto;
    private $dataCadastro;
    
    public $pacoteObrigatorio = array(
        'pacoteId' => '',
        'quartoId' => '',
        'cardapioId' => '',
        'ambienteId' => '',
        'servicoId' => '',
        'nome' => '',
        'dataInicial' => '',
        'dataFinal' => '',
        'periodo' => '',
        'pessoas' => '',
        'desconto' => '',
        'dataCadastro' => ''
    );

    /*
     * get e set da classe Pacote
     */
    public function getPacoteId() {
        return $this->pacoteId;
    }

    public function setPacoteId($pacoteId) {
        $this->pacoteId = $pacoteId;
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDataInicial() {
        return $this->dataInicial;
    }

    public function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    public function getDataFinal() {
        return $this->dataFinal;
    }

    public function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function getPessoas() {
        return $this->pessoas;
    }

    public function setPessoas($pessoas) {
        $this->pessoas = $pessoas;
    }

    public function getDesconto() {
        return $this->desconto;
    }

    public function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

}

?>

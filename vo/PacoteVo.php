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
    private $ambienteId;
    private $servicoId;
    private $cardapioId;
    private $pacoteNome;
    private $pacoteDataInicial;
    private $pacoteDataFinal;
    private $pacotePeriodo;
    private $pacotePessoas;
    private $pacoteDesconto;
    private $pacoteDataCadastro;
    
    public $pacoteObrigatorio = array(
        'pacoteId' => '',
        'quartoId' => '',
        'ambienteId' => '',
        'servicoId' => '',
        'cardapioId' => '',
        'pacoteNome' => '',
        'pacoteDataInicial' => '',
        'pacoteDataFinal' => '',
        'pacotePeriodo' => '',
        'pacotePessoas' => '',
        'pacoteDesconto' => '',
        'pacoteDataCadastro' => ''
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

    public function getCardapioId() {
        return $this->cardapioId;
    }

    public function setCardapioId($cardapioId) {
        $this->cardapioId = $cardapioId;
    }

    public function getPacoteNome() {
        return $this->pacoteNome;
    }

    public function setPacoteNome($pacoteNome) {
        $this->pacoteNome = $pacoteNome;
    }

    public function getPacoteDataInicial() {
        return $this->pacoteDataInicial;
    }

    public function setPacoteDataInicial($pacoteDataInicial) {
        $this->pacoteDataInicial = $pacoteDataInicial;
    }

    public function getPacoteDataFinal() {
        return $this->pacoteDataFinal;
    }

    public function setPacoteDataFinal($pacoteDataFinal) {
        $this->pacoteDataFinal = $pacoteDataFinal;
    }

    public function getPacotePeriodo() {
        return $this->pacotePeriodo;
    }

    public function setPacotePeriodo($pacotePeriodo) {
        $this->pacotePeriodo = $pacotePeriodo;
    }

    public function getPacotePessoas() {
        return $this->pacotePessoas;
    }

    public function setPacotePessoas($pacotePessoas) {
        $this->pacotePessoas = $pacotePessoas;
    }

    public function getPacoteDesconto() {
        return $this->pacoteDesconto;
    }

    public function setPacoteDesconto($pacoteDesconto) {
        $this->pacoteDesconto = $pacoteDesconto;
    }

    public function getPacoteDataCadastro() {
        return $this->pacoteDataCadastro;
    }

    public function setPacoteDataCadastro($pacoteDataCadastro) {
        $this->pacoteDataCadastro = $pacoteDataCadastro;
    }
}

?>

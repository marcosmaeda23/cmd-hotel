<?php

/**
 * classe do QuartoXcama
 */
class QuartoXcamaVo {
    /*
     * atributos da tabela QuartoXcama
     */

    private $cepId;
    private $cepNumero;
    private $logradouroId;
    private $logradouroNome;
    private $logradouroBairro;
    private $cidadeId;
    private $cidadeNome;
    private $estadoId;
    private $estadoNome;
    private $estadoUf;
    private $paisId;
    private $paisNome;
    public $cepObrigatorio = array('cepId' => '',
        'cepNumero' => '',
        'logradouroId' => '',
        'logradouroNome' => '',
        'logradouroBairro' => '',
        'cidadeId' => '',
        'cidadeNome' => '',
        'estadoId' => '',
        'estadoNome' => '',
        'estadoUf' => '',
        'paisId' => '',
        'paisNome' => '');

    /*
     * get e set da classe cepXedicao, cepCadastro
     */

    public function getCepId() {
        return $this->cepId;
    }

    public function setCepId($cepId) {
        $this->cepId = $cepId;
    }

    public function getCepNumero() {
        return $this->cepNumero;
    }

    public function setCepNumero($cepNumero) {
        $this->cepNumero = $cepNumero;
    }

    public function getLogradouroId() {
        return $this->logradouroId;
    }

    public function setLogradouroId($logradouroId) {
        $this->logradouroId = $logradouroId;
    }

    public function getLogradouroNome() {
        return $this->logradouroNome;
    }

    public function setLogradouroNome($logradouroNome) {
        $this->logradouroNome = $logradouroNome;
    }

    public function getLogradouroBairro() {
        return $this->logradouroBairro;
    }

    public function setLogradouroBairro($logradouroBairro) {
        $this->logradouroBairro = $logradouroBairro;
    }

    public function getCidadeId() {
        return $this->cidadeId;
    }

    public function setCidadeId($cidadeId) {
        $this->cidadeId = $cidadeId;
    }

    public function getCidadeNome() {
        return $this->cidadeNome;
    }

    public function setCidadeNome($cidadeNome) {
        $this->cidadeNome = $cidadeNome;
    }

    public function getEstadoId() {
        return $this->estadoId;
    }

    public function setEstadoId($estadoId) {
        $this->estadoId = $estadoId;
    }

    public function getEstadoNome() {
        return $this->estadoNome;
    }

    public function setEstadoNome($estadoNome) {
        $this->estadoNome = $estadoNome;
    }

    public function getEstadoUf() {
        return $this->estadoUf;
    }

    public function setEstadoUf($estadoUf) {
        $this->estadoUf = $estadoUf;
    }

    public function getPaisId() {
        return $this->paisId;
    }

    public function setPaisId($paisId) {
        $this->paisId = $paisId;
    }

    public function getPaisNome() {
        return $this->paisNome;
    }

    public function setPaisNome($paisNome) {
        $this->paisNome = $paisNome;
    }

}

?>

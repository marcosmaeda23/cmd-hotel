<?php

/**
 * classe do LogradouroVo
 */
class LogradouroVo {
    /*
     * atributos da tabela Logradouro
     */

    private $logradouroId;
    private $cidadeId;
    private $logradouroNome;
    private $logradouroBairro;
    
    public $logradouroObrigatorio = array(
        'logradouroId' => '',
        'cidadeId' => '',
        'logradouroNome' => '',
        'logradouroBairro' => ''
    );

    /*
     * get e set da classe Logradouro
     */
    public function getLogradouroId() {
        return $this->logradouroId;
    }

    public function setLogradouroId($logradouroId) {
        $this->logradouroId = $logradouroId;
    }

    public function getCidadeId() {
        return $this->cidadeId;
    }

    public function setCidadeId($cidadeId) {
        $this->cidadeId = $cidadeId;
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
}
?>

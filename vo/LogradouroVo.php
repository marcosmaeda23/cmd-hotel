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
    private $nome;
    private $bairro;
    
    public $logradouroObrigatorio = array(
        'logradouroId' => '',
        'cidadeId' => '',
        'nome' => '',
        'bairro' => ''
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

}

?>

<?php

/**
 * classe do Cidade 
 */
class CidadeVo {
    /*
     * atributos da tabela Cidade
     */
    
    private $cidadeId;
    private $estadoId;
    private $nome;
    
    public $cidadeObrigatorio = array(
        'cidadeId' => '',
        'estadoId' => '',
        'nome' => ''
        );

    /*
     * get e set da classe Cidade
     */
    public function getCidadeId() {
        return $this->cidadeId;
    }

    public function setCidadeId($cidadeId) {
        $this->cidadeId = $cidadeId;
    }

    public function getEstadoId() {
        return $this->estadoId;
    }

    public function setEstadoId($estadoId) {
        $this->estadoId = $estadoId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>

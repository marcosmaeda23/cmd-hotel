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
    private $cidadeNome;
    
    public $cidadeObrigatorio = array(
        'cidadeId' => '',
        'estadoId' => '',
        'cidadeNome' => ''
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

    public function getCidadeNome() {
        return $this->cidadeNome;
    }

    public function setCidadeNome($cidadeNome) {
        $this->cidadeNome = $cidadeNome;
    }
}
?>

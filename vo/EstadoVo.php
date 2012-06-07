<?php

/**
 * classe do Estado 
 */
class EstadoVo {
    /*
     * atributos da tabela Estado
     */

    private $estadoId;
    private $paisId;
    private $nome;
    private $uf;
    public $estadoObrigatorio = array(
        'estadoId' => '',
        'paisId' => '',
        'nome' => '',
        'uf' => ''
    );

    /*
     * get e set da classe Estado
     */
    
    public function getEstadoId() {
        return $this->estadoId;
    }

    public function setEstadoId($estadoId) {
        $this->estadoId = $estadoId;
    }

    public function getPaisId() {
        return $this->paisId;
    }

    public function setPaisId($paisId) {
        $this->paisId = $paisId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getUf() {
        return $this->uf;
    }

    public function setUf($uf) {
        $this->uf = $uf;
    }
}
?>

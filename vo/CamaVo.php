<?php

/**
 * classe do cep 
 */
class CamaVo {
    /*
     * atributos da tabela Cama
     */

    private $camaId;
    private $nome;
    
    public $camaObrigatorio = array(
        'camaId' => '',
        'nome' => ''
    );

    /*
     * get e set da classe Cama
     */

    public function getCamaId() {
        return $this->camaId;
    }

    public function setCamaId($camaId) {
        $this->camaId = $camaId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}

?>

<?php

/**
 * classe do pais 
 */
class PaisVo {
    /*
     * atributos da tabela pais
     */

    private $paisId;
    private $nome;
    public $cepObrigatorio = array(
        'paisId' => '',
        'nome' => ''
    );

    /*
     * get e set da classe pais
     */
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
}

?>

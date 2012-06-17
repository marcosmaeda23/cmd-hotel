<?php

/**
 * classe do pais 
 */
class PaisVo {
    /*
     * atributos da tabela pais
     */

    private $paisId;
    private $paisNome;
    
    public $paisObrigatorio = array(
        'paisId' => '',
        'paisNome' => ''
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

    public function getPaisNome() {
        return $this->paisNome;
    }

    public function setPaisNome($paisNome) {
        $this->paisNome = $paisNome;
    }
}

?>

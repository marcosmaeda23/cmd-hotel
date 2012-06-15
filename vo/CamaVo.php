<?php

/**
 * classe do cep 
 */
class CamaVo {
    /*
     * atributos da tabela Cama
     */

    private $camaId;
    private $camaNome;
    
    public $camaObrigatorio = array(
        'camaId' => '',
        'camaNome' => ''
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
    public function getCamaNome() {
        return $this->camaNome;
    }

    public function setCamaNome($camaNome) {
        $this->camaNome = $camaNome;
    }
}
?>

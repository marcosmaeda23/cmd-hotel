<?php

/**
 * classe do QuartoXcama
 */
class QuartoXcamaVo {
    /*
     * atributos da tabela QuartoXcama
     */

    private $quartoXcamaId;
    private $camaId;
    private $quartoId;
    
    public $quartoXcamaObrigatorio = array(
        'quartoXcamaId' => '',
        'camaId' => '',
        'quartoId' => ''
    );

    /*
     * get e set da classe QuartoXcama
     */
    public function getQuartoXcamaId() {
        return $this->quartoXcamaId;
    }

    public function setQuartoXcamaId($quartoXcamaId) {
        $this->quartoXcamaId = $quartoXcamaId;
    }

    public function getCamaId() {
        return $this->camaId;
    }

    public function setCamaId($camaId) {
        $this->camaId = $camaId;
    }

    public function getQuartoId() {
        return $this->quartoId;
    }

    public function setQuartoId($quartoId) {
        $this->quartoId = $quartoId;
    }
}

?>

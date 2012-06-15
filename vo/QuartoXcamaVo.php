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
    private $tipoQuartoId;
    
    public $quartoXcamaObrigatorio = array(
        'quartoXcamaId' => '',
        'camaId' => '',
        'tipoQuartoId' => ''
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

    public function getTipoQuartoId() {
        return $this->tipoQuartoId;
    }

    public function setTipoQuartoId($tipoQuartoId) {
        $this->tipoQuartoId = $tipoQuartoId;
    }
}

?>

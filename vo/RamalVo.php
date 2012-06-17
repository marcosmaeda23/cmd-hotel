<?php

/**
 * classe do Ramal 
 */
class RamalVo {
    /*
     * atributos da tabela RamalVo
     */

    private $ramalId;
    private $quartoId;
    private $ambienteId;
    private $ramalNumero;
    
    public $ramalObrigatorio = array(
        'ramalId' => '',
        'quartoId' => '',
        'ambienteId' => '',
        'ramalNumero' => ''
    );

    /*
     * get e set da classe RamalVo
     */
    public function getRamalId() {
        return $this->ramalId;
    }

    public function setRamalId($ramalId) {
        $this->ramalId = $ramalId;
    }

    public function getQuartoId() {
        return $this->quartoId;
    }

    public function setQuartoId($quartoId) {
        $this->quartoId = $quartoId;
    }

    public function getAmbienteId() {
        return $this->ambienteId;
    }

    public function setAmbienteId($ambienteId) {
        $this->ambienteId = $ambienteId;
    }

    public function getRamalNumero() {
        return $this->ramalNumero;
    }

    public function setRamalNumero($ramalNumero) {
        $this->ramalNumero = $ramalNumero;
    }
}

?>

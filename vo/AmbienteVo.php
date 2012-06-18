<?php

/**
 * classe do Ambiente 
 */
class AmbienteVo {
    /*
     * atributos da tabela Ambiente
     */

    private $ambienteId;
    private $statusId;
    private $hotelId;
    private $ambienteNome;
    private $ambienteObservacao;
    private $ambienteValor;
    private $ambienteDataCadastro;
    
    public $ambienteObrigatorio = array(
        'ambienteId' => '',
        'hotelId' => '',
        'statusId' => '',
        'ambienteNome' => '',
        'ambienteObservacao' => '',
        'ambienteValor' => '',
        'ambienteDataCadastro' => ''
    );

    /*
     * get e set da classe Ambiente
     */
    public function getAmbienteId() {
        return $this->ambienteId;
    }

    public function setAmbienteId($ambienteId) {
        $this->ambienteId = $ambienteId;
    }

    public function getAmbienteNome() {
        return $this->ambienteNome;
    }

    public function setAmbienteNome($ambienteNome) {
        $this->ambienteNome = $ambienteNome;
    }

    public function getAmbienteObservacao() {
        return $this->ambienteObservacao;
    }

    public function setAmbienteObservacao($ambienteObservacao) {
        $this->ambienteObservacao = $ambienteObservacao;
    }

    public function getAmbienteValor() {
        return $this->ambienteValor;
    }

    public function setAmbienteValor($ambienteValor) {
        $this->ambienteValor = $ambienteValor;
    }

    public function getStatusId() {
        return $this->statusId;
    }

    public function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

    public function getAmbienteDataCadastro() {
        return $this->ambienteDataCadastro;
    }

    public function setAmbienteDataCadastro($ambienteDataCadastro) {
        $this->ambienteDataCadastro = $ambienteDataCadastro;
    }

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }
}
?>

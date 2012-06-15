<?php

/**
 * classe do Ambiente 
 */
class AmbienteVo {
    /*
     * atributos da tabela Ambiente
     */

    private $ambienteId;
    private $ambienteNome;
    private $ambienteObservacao;
    private $ambienteValor;
    private $ambienteReservado;
    private $ambienteDataCadastro;
    private $hotelId;
    
    public $ambienteObrigatorio = array(
        'ambienteId' => '',
        'ambienteNome' => '',
        'ambienteObservacao' => '',
        'ambienteValor' => '',
        'ambienteReservado' => '',
        'ambienteDataCadastro' => '',
        'hotelId' => ''
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

    public function getAmbienteReservado() {
        return $this->ambienteReservado;
    }

    public function setAmbienteReservado($ambienteReservado) {
        $this->ambienteReservado = $ambienteReservado;
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

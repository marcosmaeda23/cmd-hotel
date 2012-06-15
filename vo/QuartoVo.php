<?php

/**
 * classe do Quarto 
 */
class QuartoVo {
    /*
     * atributos da tabela Quarto
     */

    private $quartoId;
    private $tipoQuartoId;
    private $hotelId;
    private $quartoNumero;
    private $quartoDescricao;
    private $quartoValor;
    private $quartoDataCadastro;
    private $statusQuartoId;
    
    public $cepObrigatorio = array(
        'quartoId' => '',
        'tipoQuartoId' => '',
        'hotelId' => '',
        'quartoNumero' => '',
        'quartoDescricao' => '',
        'quartoValor' => '',
        'quartoDataCadastro' => '',
        'statusQuartoId' => ''
    );

    /*
     * get e set da classe Quarto
     */    

    public function getQuartoId() {
        return $this->quartoId;
    }

    public function setQuartoId($quartoId) {
        $this->quartoId = $quartoId;
    }

    public function getTipoQuartoId() {
        return $this->tipoQuartoId;
    }

    public function setTipoQuartoId($tipoQuartoId) {
        $this->tipoQuartoId = $tipoQuartoId;
    }

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function getQuartoNumero() {
        return $this->quartoNumero;
    }

    public function setQuartoNumero($quartoNumero) {
        $this->quartoNumero = $quartoNumero;
    }

    public function getQuartoDescricao() {
        return $this->quartoDescricao;
    }

    public function setQuartoDescricao($quartoDescricao) {
        $this->quartoDescricao = $quartoDescricao;
    }

    public function getQuartoValor() {
        return $this->quartoValor;
    }

    public function setQuartoValor($quartoValor) {
        $this->quartoValor = $quartoValor;
    }

    public function getQuartoDataCadastro() {
        return $this->quartoDataCadastro;
    }

    public function setQuartoDataCadastro($quartoDataCadastro) {
        $this->quartoDataCadastro = $quartoDataCadastro;
    }

    public function getStatusQuartoId() {
        return $this->statusQuartoId;
    }

    public function setStatusQuartoId($statusQuartoId) {
        $this->statusQuartoId = $statusQuartoId;
    }
}

?>

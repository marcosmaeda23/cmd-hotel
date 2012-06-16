<?php

/**
 * classe do Quarto 
 */
class QuartoVo {
    /*
     * atributos da tabela Quarto
     */

    private $quartoId;
    private $quartoTipoId;
    private $hotelId;
    private $statusId;
    private $quartoNumero;
    private $quartoDescricao;
    private $quartoValor;
    private $quartoDataCadastro;
    
    public $quartoObrigatorio = array(
        'quartoId' => '',
        'quartoTipoId' => '',
        'hotelId' => '',
        'quartoNumero' => '',
        'quartoDescricao' => '',
        'quartoValor' => '',
        'quartoDataCadastro' => '',
        'statusId' => ''
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
    public function getQuartoTipoId() {
        return $this->quartoTipoId;
    }

    public function setQuartoTipoId($quartoTipoId) {
        $this->quartoTipoId = $quartoTipoId;
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
    public function getStatusId() {
        return $this->statusId;
    }

    public function setStatusId($statusId) {
        $this->statusId = $statusId;
    }
}

?>

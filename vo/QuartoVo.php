<?php

/**
 * classe do Quarto 
 */
class QuartoVo {
    /*
     * atributos da tabela Quarto
     */

    private $quartoId;
    private $hotelId;
    private $tipoQuarto;
    private $numero;
    private $descricao;
    private $valor;
    private $reservado;
    private $dataCadastro;
    
    public $cepObrigatorio = array(
        'quartoId' => '',
        'hotelId' => '',
        'tipoQuarto' => '',
        'numero' => '',
        'descricao' => '',
        'valor' => '',
        'reservado' => '',
        'dataCadastro' => ''
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

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function getTipoQuarto() {
        return $this->tipoQuarto;
    }

    public function setTipoQuarto($tipoQuarto) {
        $this->tipoQuarto = $tipoQuarto;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getReservado() {
        return $this->reservado;
    }

    public function setReservado($reservado) {
        $this->reservado = $reservado;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }   
}

?>

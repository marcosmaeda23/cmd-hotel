<?php

/**
 * classe do Ambiente 
 */
class AmbienteVo {
    /*
     * atributos da tabela Ambiente
     */

    private $ambienteId;
    private $hotelId;
    private $nome;
    private $observacao;
    private $valor;
    private $reservado;
    private $dataCadastro;
    
    public $ambienteObrigatorio = array(
        'ambienteId' => '',
        'hotelId' => '',
        'nome' => '',
        'observacao' => '',
        'valor' => '',
        'reservado' => '',
        'dataCadastro' => ''
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

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getObservacao() {
        return $this->observacao;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
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

<?php

/**
 * classe do Servico
 */
class ServicoVo {
    /*
     * atributos da tabela Servico
     */

    private $servicoId;
    private $hotelId;
    private $nome;
    private $observacao;
    private $valor;
    private $dataCadastro;
    
    public $servicoObrigatorio = array(
        'servicoId' => '',
        'hotelId' => '',
        'nome' => '',
        'observacao' => '',
        'valor' => '',
        'dataCadastro' => ''
    );

    /*
     * get e set da classe Servico
     */
    public function getServicoId() {
        return $this->servicoId;
    }

    public function setServicoId($servicoId) {
        $this->servicoId = $servicoId;
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

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
}

?>

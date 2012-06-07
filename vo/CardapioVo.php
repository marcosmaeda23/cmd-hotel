<?php

/**
 * classe do Cardapio 
 */
class CardapioVo {
    /*
     * atributos da tabela Cardapio
     */

    private $cardapioId;
    private $hotelId;
    private $tipoId;
    private $nome;
    private $tempo;
    private $descricao;
    private $valorCalorico;
    private $valor;
    private $observacao;
    private $dataCadastro;
    
    public $cardapioObrigatorio = array(
        'cardapioId' => '',
        'hotelId' => '',
        'tipoId' => '',
        'nome' => '',
        'tempo' => '',
        'descricao' => '',
        'valorCalorico' => '',
        'valor' => '',
        'observacao' => '',
        'dataCadastro' => '',
    );

    /*
     * get e set da classe cepXedicao, cepCadastro
     */
    public function getCardapioId() {
        return $this->cardapioId;
    }

    public function setCardapioId($cardapioId) {
        $this->cardapioId = $cardapioId;
    }

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function getTipoId() {
        return $this->tipoId;
    }

    public function setTipoId($tipoId) {
        $this->tipoId = $tipoId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getTempo() {
        return $this->tempo;
    }

    public function setTempo($tempo) {
        $this->tempo = $tempo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getValorCalorico() {
        return $this->valorCalorico;
    }

    public function setValorCalorico($valorCalorico) {
        $this->valorCalorico = $valorCalorico;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getObservacao() {
        return $this->observacao;
    }

    public function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

}
?>

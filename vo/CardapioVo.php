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
    private $fotoId;
    private $cardapioTipoId;
    private $cardapioNome;
    private $cardapioTempo;
    private $cardapioDescricao;
    private $cardapioValorCalorico;
    private $cardapioValor;
    private $cardapioObservacao;
    private $cardapioDataCadastro;
    
    private $fotoVo;
    private $hotelVo;
    private $cardapioTipoVo;
    
    public $cardapioObrigatorio = array(
        'cardapioId' => '',
        'hotelId' => 'obrigatorio',
        'cardapioTipoId' => 'obrigatorio',
        'cardapioNome' => 'obrigatorio',
        'cardapioTempo' => '',
        'cardapioDescricao' => '',
        'cardapioValorCalorico' => '',
        'cardapioValor' => 'obrigatorio',
        'cardapioObservacao' => '',
        'cardapioDataCadastro' => ''
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

    public function getFotoId() {
        return $this->fotoId;
    }

    public function setFotolId($fotoId) {
        $this->fotoId = $fotoId;
    }

    public function getCardapioTipoId() {
        return $this->cardapioTipoId;
    }

    public function setCardapioTipoId($cardapioTipoId) {
        $this->cardapioTipoId = $cardapioTipoId;
    }

    public function getCardapioNome() {
        return $this->cardapioNome;
    }

    public function setCardapioNome($cardapioNome) {
        $this->cardapioNome = $cardapioNome;
    }

    public function getCardapioTempo() {
        return $this->cardapioTempo;
    }

    public function setCardapioTempo($cardapioTempo) {
        $this->cardapioTempo = $cardapioTempo;
    }

    public function getCardapioDescricao() {
        return $this->cardapioDescricao;
    }

    public function setCardapioDescricao($cardapioDescricao) {
        $this->cardapioDescricao = $cardapioDescricao;
    }

    public function getCardapioValorCalorico() {
        return $this->cardapioValorCalorico;
    }

    public function setCardapioValorCalorico($cardapioValorCalorico) {
        $this->cardapioValorCalorico = $cardapioValorCalorico;
    }

    public function getCardapioValor() {
        return $this->cardapioValor;
    }

    public function setCardapioValor($cardapioValor) {
        $this->cardapioValor = $cardapioValor;
    }

    public function getCardapioObservacao() {
        return $this->cardapioObservacao;
    }

    public function setCardapioObservacao($cardapioObservacao) {
        $this->cardapioObservacao = $cardapioObservacao;
    }

    public function getCardapioDataCadastro() {
        return $this->cardapioDataCadastro;
    }

    public function setCardapioDataCadastro($cardapioDataCadastro) {
        $this->cardapioDataCadastro = $cardapioDataCadastro;
    }

    public function getFotoVo() {
        return $this->fotoVo;
    }

    public function setFotoVo($fotoVo) {
        $this->fotoVo = $fotoVo;
    }

    public function getHotelVo() {
        return $this->hotelVo;
    }

    public function setHoteVo($hotelVo) {
        $this->hotelVo = $hotelVo;
    }

    public function getCardapioTipoVo() {
        return $this->cardapioTipoVo;
    }

    public function setCardapioTipoVo($cardapioTipoVo) {
        $this->cardapioTipoVo = $cardapioTipoVo;
    }

}

?>

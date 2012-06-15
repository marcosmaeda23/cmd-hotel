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
    private $dataCadastro;
    
    private $fotoVo;
    private $hotelVo;
    private $cardapioTipoVo;
    
    public $cardapioObrigatorio = array('cardapioId' 			=> '',
								        'hotelId' 				=> 'obrigatorio',
								        'cardapioTipoId'	 	=> 'obrigatorio',
								        'cardapioNome' 			=> 'obrigatorio',
								        'cardapioTempo' 		=> '',
								        'cardapioDescricao' 	=> '',
								        'cardapioValorCalorico' => '',
								        'cardapioValor' 		=> 'obrigatorio',
								        'cardapioObservacao' 	=> '',
								        'cardapioDataCadastro' 	=> '');

    
    
    
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
        return $this->FotoId;
    }

    public function setFotolId($fotoId) {
        $this->fotoId = $fotoId;
    }

    public function getTipoId() {
        return $this->tipoId;
    }

    public function setTipoId($tipoId) {
        $this->tipoId = $tipoId;
    }

    public function getCadastroNome() {
        return $this->nome;
    }

    public function setCadastroNome($nome) {
        $this->nome = $nome;
    }

    public function getCadastroTempo() {
        return $this->tempo;
    }

    public function setCadastroTempo($tempo) {
        $this->tempo = $tempo;
    }

    public function getCadastroDescricao() {
        return $this->descricao;
    }

    public function setCadastroDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getCadastroValorCalorico() {
        return $this->valorCalorico;
    }

    public function setCadastroValorCalorico($valorCalorico) {
        $this->valorCalorico = $valorCalorico;
    }

    public function getCadastroValor() {
        return $this->valor;
    }

    public function setCadastroValor($valor) {
        $this->valor = $valor;
    }

    public function getCadastroObservacao() {
        return $this->observacao;
    }

    public function setCadastroObservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getCadastroDataCadastro() {
        return $this->dataCadastro;
    }

    public function setCadastroDataCadastro($dataCadastro) {
        $this->cardapioDataCadastro = $dataCadastro;
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

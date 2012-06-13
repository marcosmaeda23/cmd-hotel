<?php

/**
 * classe do Cardapio Tipo 
 */
class CardapioTipoVo {
    /*
     * atributos da tabela Cardapio Tipo
     */

    private $cardapioTipoId;
    private $cardapioTipoNome;
    private $cardapioTipoDataCadastro;
    
    public $cardapioTipoObrigatorio = array('cardapioTipoId' 			=> '',
 											'cardapioTipoNome'			=> 'obrigatorio',
 											'cardapioTipoDataCadastro' 	=> '');

    /*
     * get e set da classe cepXedicao, cepCadastro
     */

    public function getCardapioTipoId() {
        return $this->cardapioTipoId;
    }

    public function setCardapioTipoId($cardapioTipoId) {
        $this->cardapioTipoId = $cardapioTipoId;
    }

    public function getCardapioTipoNome() {
        return $this->cardapioTipoNome;
    }

    public function setCardapioTipoNome($cardapioTipoNome) {
        $this->cardapioTipoNome = $cardapioTipoNome;
    }
	public function getCardapioTipoDataCadastro() {
        return $this->cardapioTipoDataCadastro;
    }

    public function setCardapioTipoDataCadastro($cardapioTipoDataCadastro) {
        $this->cardapioTipoDataCadastro = $cardapioTipoDataCadastro;
    }
}

?>

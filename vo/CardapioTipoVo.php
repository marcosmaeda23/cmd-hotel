<?php

/**
 * classe do Cardapio Tipo 
 */
class CardapioTipoVo {
    /*
     * atributos da tabela Cardapio Tipo
     */

    private $cardapioId;
    private $nome;
    
    public $cardapioTipoObrigatorio = array(
        'cardapioId' => '',
        'nome' => '',
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}

?>

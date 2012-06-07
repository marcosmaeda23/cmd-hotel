<?php

/**
 * classe do Pagamento 
 */
class PagamentoVo {
    /*
     * atributos da tabela Pagamento
     */

    private $pagamentoId;
    private $nome;

    public $pagamentoObrigatorio = array(
        'pagamentoId' => '',
        'nome' => ''
        );

    /*
     * get e set da classe Pagamento
     */
    public function getPagamentoId() {
        return $this->pagamentoId;
    }

    public function setPagamentoId($pagamentoId) {
        $this->pagamentoId = $pagamentoId;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}

?>

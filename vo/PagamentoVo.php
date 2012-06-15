<?php

/**
 * classe do Pagamento 
 */
class PagamentoVo {
    /*
     * atributos da tabela Pagamento
     */

    private $pagamentoId;
    private $pagamentoNome;

    public $pagamentoObrigatorio = array(
        'pagamentoId' => '',
        'pagamentoNome' => ''
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
    public function getPagamentoNome() {
        return $this->pagamentoNome;
    }

    public function setPagamentoNome($pagamentoNome) {
        $this->pagamentoNome = $pagamentoNome;
    }


}

?>

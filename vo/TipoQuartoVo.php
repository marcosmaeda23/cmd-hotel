<?php

/**
 * classe do TipoQuarto
 */
class TipoQuartoVo {
    /*
     * atributos da tabela TipoQuarto
     */

    private $tipoQuartoId;
    private $descricao;
    
    public $tipoQuartoObrigatorio = array(
        'tipoQuartoId' => '',
        'descricao' => ''
    );

    /*
     * get e set da classe TipoQuarto
     */
    public function getTipoQuartoId() {
        return $this->tipoQuartoId;
    }

    public function setTipoQuartoId($tipoQuartoId) {
        $this->tipoQuartoId = $tipoQuartoId;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
?>

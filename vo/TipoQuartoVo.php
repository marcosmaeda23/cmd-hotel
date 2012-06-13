<?php

/**
 * classe do TipoQuarto
 */
class TipoQuartoVo {
    /*
     * atributos da tabela TipoQuarto
     */

    private $tipoQuartoId;
    private $tipoQuartoId;
    
    public $tipoQuartoObrigatorio 	= array('tipoQuartoId' 			=> '',
        									'tipoQuartoDescricao' 	=> 'obrigatorio');

    /*
     * get e set da classe TipoQuarto
     */
    public function getTipoQuartoId() {
        return $this->tipoQuartoId;
    }

    public function setTipoQuartoId($tipoQuartoId) {
        $this->tipoQuartoId = $tipoQuartoId;
    }

    public function getTipoQuartoDescricao() {
        return $this->tipoQuartoDescricao;
    }

    public function setTipoQuartoDescricao($tipoQuartoDescricao) {
        $this->tipoQuartoDescricao = $tipoQuartoDescricao;
    }
}
?>

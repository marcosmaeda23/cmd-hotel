<?php

/**
 * classe do Quarto Tipo
 */
class QuartoTipoVo {
    /*
     * atributos da tabela Quarto Tipo
     */

    private $quartoTipoId;
    private $quartoTipoDescricao;
    private $quartoTipoDataCadastro;
    
    public $quartoTipoObrigatorio = array(
        'quartoTipoId' => '',
        'quartoTipoDescricao' => 'obrigatorio',
        'quartoTipoDataCadastro' => '');

    /*
     * get e set da classe Quarto Tipo
     */

    public function getQuartoTipoId() {
        return $this->quartoTipoId;
    }

    public function setQuartoTipoId($quartoTipoId) {
        $this->quartoTipoId = $quartoTipoId;
    }

    public function getQuartoTipoDescricao() {
        return $this->quartoTipoDescricao;
    }

    public function setQuartoTipoDescricao($quartoTipoDescricao) {
        $this->quartoTipoDescricao = $quartoTipoDescricao;
    }

    public function getQuartoTipoDataCadastro() {
        return $this->quartoTipoDataCadastro;
    }

    public function setQuartoTipoDataCadastro($quartoTipoDataCadastro) {
        $this->quartoTipoDataCadastro = $quartoTipoDataCadastro;
    }

}

?>

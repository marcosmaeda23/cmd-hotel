<?php

/**
 * classe nivel de acesso
 */
class NivelVo {

    private $nivelId;
    private $nivelNome;

    /**
     * atributos obrigatorios da classe
     */
    public $usuarioObrigatorio = array('nivelNome');

    /**
     * atributos que precisam validacoes
     */
    public $usuarioFormatado = array();

    /*
     * get e set dos atributos da tabela 
     */
    public function getNivelId() {
        return $this->nivelId;
    }

    public function setNivelId($nivelId) {
        $this->nivelId = $nivelId;
    }

    public function getNivelNome() {
        return $this->nivelNome;
    }

    public function setNivelNome($nivelNome) {
        $this->nivelNome = $nivelNome;
    }
}
?>
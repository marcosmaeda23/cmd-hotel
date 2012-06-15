<?php

/**
 * classe do Status
 */
class StatusVo {
    /*
     * atributos da tabela Status
     */

    private $statusId;
    private $statusDescricao;
    
    public $tipoQuartoObrigatorio = array(
        'statusId' => '',
        'statusDescricao' => 'obrigatorio'
    );

    /*
     * get e set da classe TipoQuarto
     */

    public function getStatusId() {
        return $this->statusId;
    }

    public function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

    public function getStatusDescricao() {
        return $this->statusDescricao;
    }

    public function setStatusDescricao($statusDescricao) {
        $this->statusDescricao = $statusDescricao;
    }

}

?>

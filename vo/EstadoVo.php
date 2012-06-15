<?php

/**
 * classe do Estado 
 */
class EstadoVo {
    /*
     * atributos da tabela Estado
     */
    
    private $estadoId;
    private $paisId;
    private $estadoNome;
    private $estadoUf;
    
    public $estadoObrigatorio = array(
        'estadoId' => '',
        'paisId' => '',
        'estadoNome' => '',
        'estadoUf' => ''
    );

    /*
     * get e set da classe Estado
     */
    public function getEstadoId() {
        return $this->estadoId;
    }

    public function setEstadoId($estadoId) {
        $this->estadoId = $estadoId;
    }

    public function getPaisId() {
        return $this->paisId;
    }

    public function setPaisId($paisId) {
        $this->paisId = $paisId;
    }

    public function getEstadoNome() {
        return $this->estadoNome;
    }

    public function setEstadoNome($estadoNome) {
        $this->estadoNome = $estadoNome;
    }

    public function getEstadoUf() {
        return $this->estadoUf;
    }

    public function setEstadoUf($estadoUf) {
        $this->estadoUf = $estadoUf;
    }
}
?>

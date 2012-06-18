<?php

/**
 * classe do Foto 
 */
class FotoVo {
    /*
     * atributos da tabela Foto
     */

    private $fotoId;
    private $tipoQuartoId;
    private $ambienteId;
    private $cardapioId;
    private $servicoId;
    private $fotoNome;
    private $fotoNomeThumb;
    private $fotoDataCadastro;
    
    public $fotoObrigatorio = array(
        'fotoId' => '',
        'tipoQuartoId' => '',
        'ambienteId' => '',
        'cardapioId' => '',
        'servicoId' => '',
        'fotoNome' => 'obrigatorio',
        'fotoNomeThumb' => '',
        'dataCadastro' => ''
        );

    /*
     * get e set da classe cepXedicao, cepCadastro
     */

    public function getFotoId() {
        return $this->fotoId;
    }

    public function setFotoId($fotoId) {
        $this->fotoId = $fotoId;
    }

    public function getTipoQuartoId() {
        return $this->tipoQuartoId;
    }

    public function setTipoQuartoId($tipoQuartoId) {
        $this->tipoQuartoId = $tipoQuartoId;
    }

    public function getAmbienteId() {
        return $this->ambienteId;
    }

    public function setAmbienteId($ambienteId) {
        $this->ambienteId = $ambienteId;
    }

    public function getCardapioId() {
        return $this->cardapioId;
    }

    public function setCardapioId($cardapioId) {
        $this->cardapioId = $cardapioId;
    }

    public function getServicoId() {
        return $this->servicoId;
    }

    public function setServicoId($servicoId) {
        $this->servicoId = $servicoId;
    }

    public function getFotoNome() {
        return $this->fotoNome;
    }

    public function setFotoNome($fotoNome) {
        $this->fotoNome = $fotoNome;
    }
    public function getFotoNomeThumb() {
        return $this->fotoNomeThumb;
    }

    public function setFotoNomeThumb($fotoNomeThumb) {
        $this->fotoNomeThumb = $fotoNomeThumb;
    }

    public function getFotoDataCadastro() {
        return $this->fotoDataCadastro;
    }

    public function setFotoDataCadastro($fotoDataCadastro) {
        $this->fotoDataCadastro = $fotoDataCadastro;
    }

}

?>

<?php

/**
 * classe do cepEdicao
 */
class CepXedicaoVo {
    /*
     * atributos da tabela cepXedicao 	 
     */

    private $cepXedicaoId;
    private $cepId;
    private $hotelId;
    private $usuarioId;
    private $cepXedicaoNumero;
    private $cepXedicaoComplemento;
    private $cepXedicaoTipo;
    private $cepCadastroVo;    // objeto
    private $cepVo;      // objeto
    
    public $cepXedicaoObrigatorio = array('cepXedicaoId' => '',
        'cepId' => '',
        'hotelId' => '',
        'usuarioId' => '',
        'cepXedicaoNumero' => 'obrigatorio',
        'cepXedicaoComplemento' => '',
        'cepXedicaoTipo' => 'obrigatorio');

    /*
     * get e set da classe cepXedicao, cepCadastro
     */

    public function getCepXedicaoId() {
        return $this->cepXedicaoId;
    }

    public function setCepXedicaoId($cepXedicaoId) {
        $this->cepXedicaoId = $cepXedicaoId;
    }

    public function getCepId() {
        return $this->cepId;
    }

    public function setCepId($cepId) {
        $this->cepId = $cepId;
    }

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function getCepXEdicaoNumero() {
        return $this->cepXedicaoNumero;
    }

    public function setCepXedicaoNumero($cepXedicaoNumero) {
        $this->cepXedicaoNumero = $cepXedicaoNumero;
    }

    public function getCepXedicaoComplemento() {
        return $this->cepXedicaoComplemento;
    }

    public function setCepXedicaoComplemento($cepXedicaoComplemento) {
        $this->cepXedicaoComplemento = $cepXedicaoComplemento;
    }

    public function getCepXedicaoTipo() {
        return $this->cepXedicaoTipo;
    }

    public function setCepXedicaoTipo($cepXedicaoTipo) {
        $this->cepXedicaoTipo = $cepXedicaoTipo;
    }

    public function getCepCadastroVo() {
        return $this->cepCadastroVo;
    }

    public function setCepCadastroVo($cepCadastroVo) {
        $this->cepCadastroVo = $cepCadastroVo;
    }

    public function getCepVo() {
        return $this->cepVo;
    }

    public function setCepVo($cepVo) {
        $this->cepVo = $cepVo;
    }

}

?>

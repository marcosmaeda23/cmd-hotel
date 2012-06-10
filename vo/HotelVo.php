<?php

/**
 * classe do hotel
 */
class HotelVo {

    private $hotelId;
    private $hotelNome;
    private $hotelCnpj;
    private $hotelInscricaoEstadual;
    private $hotelEmail;
    private $hotelObservacao;
    private $hotelGerente;
    private $hotelDataCadastro;
    
    private $telefoneVo;        // array de objetos
    private $cepXedicaoVo;      // objeto
    private $cepCadastroVo;     // objeto

    /**
     * define os atributos da classe e determina quais atributos serao obrigatorios
     */
    public $hotelObrigatorio = array(
        'hotelId'               => '',
        'hotelNome'             => 'obrigatorio',
        'hotelCnpj'             => 'obrigatorio',
        'hotelInscricaoEstadual' => 'obrigatorio',
        'hotelEmail'            => 'obrigatorio',
        'hotelObservacao'       => '',
        'hotelGerente'          => 'obrigatorio'
        );

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function gethotelNome() {
        return $this->hotelNome;
    }

    public function setHotelNome($hotelNome) {
        $this->hotelNome = $hotelNome;
    }

    public function getHotelCnpj() {
        return $this->hotelCnpj;
    }

    public function setHotelCnpj($hotelCnpj) {
        $this->hotelCnpj = $hotelCnpj;
    }

    public function getHotelInscricaoEstadual() {
        return $this->hotelInscricaoEstadual;
    }

    public function setHotelInscricaoEstadual($hotelInscricaoEstadual) {
        $this->hotelInscricaoEstadual = $hotelInscricaoEstadual;
    }

    public function getHotelEmail() {
        return $this->hotelEmail;
    }

    public function setHotelEmail($hotelEmail) {
        $this->hotelEmail = $hotelEmail;
    }
    
    public function getHotelObservacao() {
        return $this->hotelObservacao;
    }

    public function setHotelObservacao($hotelObservacao) {
        $this->hotelObservacao = $hotelObservacao;
    }
    
    public function getHotelGerente() {
        return $this->hotelGerente;
    }

    public function setHotelGerente($hotelGerente) {
        $this->hotelGerente = $hotelGerente;
    }
    public function getHotelDataCadastro() {
        return $this->hotelDataCadastro;
    }

    public function setHotelDataCadastro($hotelDataCadastro) {
        $this->hotelDataCadastro = $hotelDataCadastro;
    }
    /*
     * get e set dos objetos
     */

    public function getTelefoneVo() {
        return $this->telefoneVo;
    }

    public function setTelefoneVo($telefoneVo) {
        $this->telefoneVo = $telefoneVo;
    }

    public function getCepXedicaoVo() {
        return $this->cepXedicaoVo;
    }

    public function setCepXedicaoVo($cepXedicaoVo) {
        $this->cepXedicaoVo = $cepXedicaoVo;
    }

    public function getCepCadastroVo() {
        return $this->cepCadastroVo;
    }

    public function setCepCadastroVo($cepCadastroVo) {
        $this->cepCadastroVo = $cepCadastroVo;
    }
}
?>

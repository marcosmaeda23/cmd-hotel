<?php
/**
 * classe do Servico
 */
class ServicoVo {
    /*
     * atributos da tabela Servico
     */

    private $servicoId;
    private $hotelId;
    private $servicoNome;
    private $servicoObservacao;
    private $servicoValor;
    private $servicoDataCadastro;
    
    public $servicoObrigatorio 	= array('servicoId' 			=> '',
   										'hotelId' 				=> 'obrigatorio',
        								'servicoNome' 			=> 'obrigatorio',
								        'servicoObservacao' 	=> '',
								        'servicoValor' 			=> 'obrigatorio',
								        'servicoDataCadastro' 	=> '');

    /*
     * get e set da classe Servico
     */
    public function getServicoId() {
        return $this->servicoId;
    }

    public function setServicoId($servicoId) {
        $this->servicoId = $servicoId;
    }

    public function getHotelId() {
        return $this->hotelId;
    }

    public function setHotelId($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function getServicoNome() {
        return $this->servicoNome;
    }

    public function setServicoNome($servicoNome) {
        $this->servicoNome = $servicoNome;
    }

    public function getServicoObservacao() {
        return $this->servicoObservacao;
    }

    public function setServicoObservacao($servicoObservacao) {
        $this->servicoObservacao = $servicoObservacao;
    }

    public function getServicoValor() {
        return $this->servicoValor;
    }

    public function setServicoValor($servicoValor) {
        $this->servicoValor = $servicoValor;
    }

    public function getServicoDataCadastro() {
        return $this->servicoDataCadastro;
    }

    public function setServicoDataCadastro($servicoDataCadastro) {
        $this->servicoDataCadastro = $servicoDataCadastro;
    }
}

?>

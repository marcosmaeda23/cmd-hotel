<?php

/**
 * classe do Reserva
 */
class ReservaVo {
    /*
     * atributos da tabela Reserva
     */

    private $reservaId;
    private $usuarioId;
    private $checkIn;
    private $finalizado;
    
    public $cepObrigatorio = array(
        'reservaId' => '',
        'usuarioId' => '',
        'checkIn' => '',
        'finalizado' => ''
    );

    /*
     * get e set da classe Reserva
     */

    public function getReservaId() {
        return $this->reservaId;
    }

    public function setReservaId($reservaId) {
        $this->reservaId = $reservaId;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function getCheckIn() {
        return $this->checkIn;
    }

    public function setCheckIn($checkIn) {
        $this->checkIn = $checkIn;
    }

    public function getFinalizado() {
        return $this->finalizado;
    }

    public function setFinalizado($finalizado) {
        $this->finalizado = $finalizado;
    }

}

?>

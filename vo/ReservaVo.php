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
    private $reservaCheckIn;
    private $reservaFinalizado;
    
    public $reservaObrigatorio = array(
        'reservaId' => '',
        'usuarioId' => '',
        'reservaCheckIn' => '',
        'reservaFinalizado' => ''
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

    public function getReservaCheckIn() {
        return $this->reservaCheckIn;
    }

    public function setReservaCheckIn($reservaCheckIn) {
        $this->reservaCheckIn = $reservaCheckIn;
    }

    public function getReservaFinalizado() {
        return $this->reservaFinalizado;
    }

    public function setReservaFinalizado($reservaFinalizado) {
        $this->reservaFinalizado = $reservaFinalizado;
    }
}
?>

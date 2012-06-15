<?php

/**
 * classe nivel de acesso
 */
class UsuarioXchatVo {

    private $usuarioXchatId;
    private $usuarioId;
    private $chatId;

    /**
     * atributos obrigatorios da classe
     */
    
    public $usuarioObrigatorio = array(
        'usuarioXchatId' => '',
        'usuarioId' => '',
        'chatId' => '',
        'ramalNumero' => ''
    );
    
    /**
     * atributos que precisam validacoes
     */
    public $usuarioFormatado = array();

    /*
     * get e set dos atributos da tabela 
     */
    public function getChatId() {
        return $this->chatId;
    }

    public function setChatId($chatId) {
        $this->chatId = $chatId;
    }

    public function getChatConversa() {
        return $this->chatConversa;
    }

    public function setChatConversa($chatConversa) {
        $this->chatConversa = $chatConversa;
    }
}
?>
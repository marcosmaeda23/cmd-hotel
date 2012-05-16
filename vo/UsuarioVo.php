<?php 

/**
 * classse usuario
 * atributos com get e set
 */
class UsuarioVo {
	 
	private $id;
	private $nome;
	private $email;
	private $documentoTipo;
	private $documento;
	
	private $telefoneVo;
	private $acessoSistemaVo;
	private $nivelAcessoVo;
	
	private $atributosObrigatorios = array('nome','email', 'documentoTipo', 'documento');
	
	private $atributosFormatados = array();
	
}



?>
<?php
/**
 * classe do hotel
 */
class HotelVo {
	
	private $hotelId;
	private $hotelNome;
	private $hotelEmail;
	private $hotelCnpj;
	private $hotelInscricaoEstadual;
	private $hotelObservacao;
	private $hotelGerente;
	
	private $telefoneVo;		   			 	// array de objetos
	private $cepXedicaoVo;						// objeto
	private $cepCadastroVo;						// objeto
	
	/**
	 * define os atributos da classe e determina quais atributos serao obrigatorios
	 */
	public $hotelObrigatorio 	= array('hotelId' 					=> '',
										'hotelNome'	 				=> 'obrigatorio',
										'hotelEmail' 				=> 'obrigatorio',
										'hotelCnpj' 				=> 'obrigatorio',
										'hotelInscricaoEstadual'	=> 'obrigatorio',
										'hotelObservacao' 			=> '',
										'hotelGerente'				=> 'obrigatorio');
	
	/**
	 * atributos que precisam validacoes
	 */
	public $usuarioFormatado 	= array('hotelEmail' => 'email', 
										'hotelCnpj' => 'cnpj');
}

?>

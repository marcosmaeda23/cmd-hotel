<?php

/**
 * classe com o metodo exclusivo do usuario
 */
class CardapioDao extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    /**
     * nome da tabela 
     */
    protected $entidade 			= 'cardapio';

    /**
     * chave estrangeira
     * @example $chaveEstrangeira 	= array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira 	= array('hotelId INT NOT NULL',
    										'cardapioTipoId INT NOT NULL');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate 			= array('hotelId' 			=> 'cascade',
    										'cardapioTipoId' 	=> 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete 			= array('hotelId' 			=> 'cascade',
    										'cardapioTipoId' 	=> 'cascade');

    /**
     * se tiver algum atributo como unique setado, inclui na tabela
     * @deprecated id
     * @example $uniqueKey = array('email', 'documento');
     */
    protected $uniqueKey 			= array('email', 'documento', 'login');

    /**
     * seta a base de dados para fazer a atualizacao ou criacao
     * @deprecated id, status, dataCadastro, ordem - esses sao setados separados 
     * @example  $dadosBase	= array('nome VARCHAR(100) NOT NULL', 'login VARCHAR(100) NOT NULL')
     */
     protected $dadosBase 			= array('nome VARCHAR(100) NOT NULL',
									        'tempo VARCHAR(100) NOT NULL',
									        'descricao VARCHAR(200) NOT NULL',
									        'valorCalorico DECIMAL(3,0) NULL',
									        'valor DECIMAL(10,2) NOT NULL',
									        'observacao VARCHAR(800) NULL');

    /**
     * Array contendo a ordem para salvar no banco
     */
    protected $ordemBase 			= array();

    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro 		= true;

    /**
     *  se true coloca um campo status na tabela
     *  padrao 1 - ativo, 2 - inativo
     */
    protected $status 				= false;

    /**
     * deixa os dados ordenados, acrescenta um campo ordem na tabela
     */
    protected $ordenado 			= false;
	/**
	 * limite de para a pesquisa
	 */
	protected $limite 				= '0, 10';
    /**
     * arquivo com foto
     */
    protected $foto 				= true;

    /**
     * se foto true , as fotos vao para esta pasta
     */
    protected $fotoPasta 			= '../cardapio/upload/';

    // =================================================================
    // METODOS =========================================================
    // =================================================================


}
?>
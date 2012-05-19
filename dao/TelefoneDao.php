<?php


/**
 * classe com o metodo exclusivo do telefone
 */
class TelefoneDao extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    /**
     * nome da tabela 
     */
    protected $entidade = 'telefone';

    /**
     * chave estrangeira
     * @example $chaveEstrangeira = array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira = array('usuario INT NULL',
    									'hotel INT NULL');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate = array('usuario' => 'cascade', 'hotel' => 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete = array('usuario' => 'cascade', 'hotel' => 'cascade');
	/**
     * se tiver algum atributo como unique setado, inclui na tabela
     * @deprecated id
     * @example $uniqueKey = array('email', 'documento');
     */
    protected $uniqueKey = array();
    /**
     * seta a base de dados para fazer a atualizacao ou criacao
     * @deprecated id, status, dataCadastro, ordem - esses sao setados separados 
     * @example  $dadosBase	= array('nome VARCHAR(100) NOT NULL', 'login VARCHAR(100) NOT NULL')
     */
    protected $dadosBase = array('ddd DECIMAL(5) NOT NULL',
						        'ddi DECIMAL(5) NULL',
						        'telefoneTipo ENUM(\'residencial\',\'celular\',\'comercial\') DEFAULT \'celular\' NOT NULL',
						        'numero VARCHAR(15) NOT NULL',
						        'ramal DECIMAL(5) NOT NULL');   

	/**
	 * Array contendo a ordem para salva no banco
	 */
	private $ordemBase	= array();
    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro = true;
    /**
     *  se true coloca um campo status na tabela
     */
    protected $status = false;    

    /**
     * deixa os dados ordenados, acrescenta um campo ordem na tabela
     */
    protected $ordenado = false;

    /**
     * arquivo com foto
     */
    protected $foto = false;

    /**
     * se foto true , as fotos vao para esta pasta
     */
    protected $fotoPasta = '';

    // =================================================================
    // METODOS =========================================================
    // =================================================================

}

?>

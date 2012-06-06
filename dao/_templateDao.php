<?php

/**
 * classe com o metodo exclusivo do usuario
 */
class Template extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    /**
     * nome da tabela 
     */
    protected $entidade 			= 'template';

    /**
     * chave estrangeira
     * @example $chaveEstrangeira 	= array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira 	= array('nivelId INT NOT NULL');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate 			= array('nivelId' => 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete 			= array('nivelId' => 'cascade');

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
									        'email VARCHAR(100) NOT NULL',
									        'documentoTipo ENUM(\'cpf\',\'cnpj\',\'passaporte\') DEFAULT \'cpf\' NOT NULL',
									        'documento VARCHAR(100) NOT NULL',
									        'dataNascimento DATE NOT NULL',
									        'sexo ENUM(\'f\',\'m\') NOT NULL',
									        'login VARCHAR(100) NOT NULL',
									        'senha VARCHAR(100) NOT NULL',
									        'lembrete VARCHAR(150) NOT NULL');

    /**
     * Array contendo a ordem para salvar no banco
     */
    protected $ordemBase 			= array('telefone', 'cepXedicao', 'cepCadastro');

    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro 		= true;

    /**
     *  se true coloca um campo status na tabela
     */
    protected $status 				= true;

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
    protected $foto 				= false;

    /**
     * se foto true , as fotos vao para esta pasta
     */
    protected $fotoPasta 			= '';

    // =================================================================
    // METODOS =========================================================
    // =================================================================


}
?>

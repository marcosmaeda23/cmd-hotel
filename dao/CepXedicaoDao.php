<?php


/**
 * classe com o metodo exclusivo do cep
 */
class CepXedicaoDao extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    /**
     * nome da tabela 
     */
    protected $entidade = 'cepXedicao';

    /**
     * chave estrangeira
     * @example $chaveEstrangeira = array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira = array('cepId INT NULL',
    									'usuarioId INT NULL',
    									'hotelId INT NULL');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate = array('cepId' => 'cascade', 'usuarioId' => 'cascade', 'hotelId' => 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete = array('cepId' => 'cascade', 'usuarioId' => 'cascade', 'hotelId' => 'cascade');
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
    protected $dadosBase = array('numero VARCHAR(100) NOT NULL',
						        'complemento VARCHAR(100) NULL',
						        'tipo DECIMAL(1,0) NOT NULL');   

	/**
	 * Array contendo a ordem para salva no banco
	 */
	private $ordemBase	= array();
    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro = false;
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
	
	public function buscarCep($objeto){
		$sql = 'SELECT * FROM cep
					INNER JOIN logradouro 	ON cep.logradouroID	= logradouro.logradouroID 
					INNER JOIN cidade 		ON cidade.cidadeId	= logradouro.cidadeId
					INNER JOIN estado 		ON estado.estadoId	= cidade.estadoId
					INNER JOIN pais 		ON pais.paisId 		= estado.paisId
				WHERE cep.cepNumero = '. retirarMascara($objeto -> getCepNumero());
		$query = mysql_query($sql);
		$qtde = mysql_affected_rows();
		
		if ($qtde == 1) {
			while ($row = mysql_fetch_object($query)){
				// setado o resultado no objeto
				$objeto -> setcepId($row -> cepId);
				$objeto -> setCepNumero($row -> cepNumero);
				$objeto -> setLogradouroId($row -> logradouroId);
				$objeto -> setLogradouroNome($row -> logradouroNome);
				$objeto -> setLogradouroBairro($row -> logradouroBairro);
				$objeto -> setCidadeId($row -> cidadeId);
				$objeto -> setCidadeNome($row -> cidadeNome);
				$objeto -> setEstadoId($row -> estadoId);
				$objeto -> setEstadoNome($row -> estadoNome);
				$objeto -> setEstadoUf($row -> estadoUf);
				$objeto -> setPaisId($row -> paisId);
				$objeto -> setPaisNome($row -> paisNome);
			}			
			return $objeto;
		} else {
			return false;
		}
		
		
	}
}

?>

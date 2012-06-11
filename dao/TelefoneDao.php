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
    protected $chaveEstrangeira = array('usuarioId INT NULL',
    									'hotelId INT NULL');

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
    protected $dadosBase = array('ddd DECIMAL (5) NOT NULL',
						        'ddi DECIMAL (5) NULL',
						        'tipo ENUM (\'residencial\',\'celular\',\'comercial\') DEFAULT \'celular\' NOT NULL',
						        'numero VARCHAR (15) NOT NULL',
						        'recado VARCHAR (15) NULL',
						        'ramal DECIMAL (5) NOT NULL');   

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
    
	/**
	 * metodo para cadastrar ou alterar, verifica $dadosBase para pegar todos os atributos do banco
	 * se tiver o id junto com o objeto altera senao cadastra
	 * @return bool
	 */
	public function cadastrarAlterar($objetoVo){
		$ERRO = false;
		// verifica se tiver o id dentro do objeto para salvar ou alterar
		for ( $i = 0; $i < count($objetoVo); $i++ ) {
			eval('$id['.$i.'] = $objetoVo['.$i.']->get'.ucfirst($this->entidade).'Id();');
			// seta qual o dos array é para cadastrar e qual e para alterar
			if (empty($id[$i])){
				$cadastrar[] = $i;
			} else {
				$atualizar[] = $i;
			}
		}
		if (!empty($cadastrar)){
			// nao tem o id dentro do objeto, insert
			$sql = 'INSERT INTO '.$this->entidade.' ( ';
			// verifica as chaves estrangeiras
			for ( $j = 0; $j < count($this->chaveEstrangeira); $j++ ) {
				$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
				$sql .= $_dadosEstrangeiro[0];
				if ($j + 1 <= count($this->chaveEstrangeira)){
					$sql .= ', ';
				}
			}			
			for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
				$_dadosBase = explode(' ', $this->dadosBase[$j]);
				$sql .= $this->entidade.ucfirst($_dadosBase[0]);
				if ($j + 1 <> count($this->dadosBase)){
					$sql .= ', ';
				}
			}
			// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
			if($this->momentoCadastro){
				$sql .= ', '.$this->entidade.'DataCadastro';
			}	
			if($this->status){
				$sql .= ', '.$this->entidade.'Status';
			}	
			$sql .= ' ) VALUES ';
			$i = 0;
			foreach ( $cadastrar as $key => $value ) {
				$sql .= '  ( ';
				//chave estrangeira
				for ( $j = 0; $j < count($this->chaveEstrangeira); $j++ ) {
					$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
					eval('$valor = $objetoVo['.$value.'] -> get'.ucfirst($_dadosEstrangeiro[0]).'();');
					if (empty($valor)) {
						$sql .= 'null';
					} else {
						$sql .= $valor;
					}
					if ($j + 1 <= count($this->chaveEstrangeira)){
						$sql .= ', ';
					}
				}
				for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
					$_dadosBase = explode(' ', $this->dadosBase[$j]);
					eval('$valor = $objetoVo['.$value.'] -> get'.ucfirst($this->entidade).ucfirst($_dadosBase[0]).'();');
					if (is_string($valor) || $_dadosBase[0] == 'numero'){
						$sql .= "'";
					}
					if (empty($valor)) {
						$sql .= 'null';
					} else {
						$sql .= $valor;
					}
					if (is_string($valor) || $_dadosBase[0] == 'numero'){
						$sql .= "'";
					}
					if ($j+1 <> count($this->dadosBase)){
						$sql .= ', ';
					}
				}
				// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
				if($this->momentoCadastro){
					$sql .= ", '".date('Y-m-d H:m:s')."'";
				}
				if($this->status){
					$sql .= ', ';					
					eval('$sql .= $objetoVo -> get'.ucfirst($this->entidade).'Status();');
				}
				$sql .= ' )';
				if ($i+ 1 < count($cadastrar)){
					$sql .= ', ';
				}
				$i++;
			}
			$sql .= ' ;';
			//$_sql .= '  -  '.$sql;
            //echo $_sql;
			$query = mysql_query($sql);  
			if (!$query){
				$ERRO = true;
			}
		}		
		if (!empty($atualizar)){	
			// tem o id dentro do objeto, update
			$sql = 'UPDATE '.$this->entidade. ' SET ( ';
			for ( $j = 0; $j < count($this->chaveEstrangeira); $j++ ) {
				$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
				$sql .= $_dadosEstrangeiro[0];
				if ($j + 1 == count($this->chaveEstrangeira)){
					$sql .= ', ';
				}
			}			
			for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
				$_dadosBase = explode(' ', $this->dadosBase[$j]);
				$sql .= $this->entidade.ucfirst($_dadosBase[0]);
				if ($j + 1 <> count($this->dadosBase)){
					$sql .= ', ';
				}
			}
			// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
			if($this->momentoCadastro){
				$sql .= ', '.$this->entidade.'DataCadastro';
			}	
			if($this->status){
				$sql .= ', '.ucfirst($this->entidade).'Status';
			}	
			$sql .= ') WHERE '.$this->entidade.'Id = '.$id;
			//var_dump($objetoVo);
			//$query = mysql_query($sql);
			//$_id = mysql_insert_id();
		}	
		
			
		if($ERRO){
			return false;
		} else {
			return true;
		}
	}

}

?>

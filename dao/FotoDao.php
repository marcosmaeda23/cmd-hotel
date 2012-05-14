<?php 
//include('Entidade.php');
class FotoDao extends Entidade{
	// =================================================================
	// SETANDO =========================================================
	// =================================================================
	/**
	 * nome da tabela e tbm de chave primaria
	 */
	protected $entidade 						= 'foto';
	/**
	 * chave estrangeira
	 * @example $chaveEstrangeira = array('usuarioSistema INT(11) NOT NULL')
	 */
	protected $chaveEstrangeira 				= array('usuario');
	/**
	 * se tiver a chave estrangeira setado arruma a relacao e defineo update
	 * @example $onUpdate = array('usuarioSistema' => 'cascade');
	 */
	protected $onUpdate							= array('usuario' => 'cascade');
	/**
	 * se tiver a chave estrangeira setado arruma a relacao e defineo delete
	 * @example $onUpdate = array('usuarioSistema' => 'set null');
	 */
	protected $onDelete							= array('usuario' => 'cascade');
	/**
	 * seta a base de dados para fazer a atualizacao ou criacao, acrescenta o prefixo do nome da entidade
	 * @example  $dadosBase	= array('nome VARCHAR(100) NOT NULL', 'login VARCHAR(100) NOT NULL')
	 */
	protected $dadosBase						= array('nome TEXT NOT NULL',
														'tipo ENUM(\'familia\', \'amigo\') DEFAULT \'amigo\'');
	/**
	 * seta os dados que precisam ser obrigatorios e o campo que sera mostrada do campo
	 * @example $atributosObrigatorios = array('usuario_nome' => 'nome do usuário', 'usuario_email' => 'email do usuário');
	 */
	protected $atributosObrigatorios			= array('foto_nome' => 'mensagem');
	/**
	 * desformata os dados para ser inserido no banco e faz a validacao, data no formato ('dd/mm/yyy') fica ('yyyy-mm-dd')
	 * @param  data, preco, email, cpf, cnpj
	 * @example  $atributosFormatado = array('usuario_email' => 'email');
	 */
	private $atributosFormatado					= array();
	/**
	 * se true coloca um campo momento_cadastro com o prefixo nome da entidade
	 */
	protected $momentoCadastro					= true;
	/**
	 * deixa os dados ordenados, acrescenta um campo ordem com o prefixo nome da entidade
	 */
	protected $ordenado							= false;
	/**
	 * limite de itens na busca
	 */
	protected $limiteBusca						= 10;
	/**
	 * arquivo com foto
	 */
	protected $foto								= true;
	/**
	 * se foto true , as fotos vao para esta pasta
	 */
	protected $fotoPasta						= '../../upload/';
	// =================================================================
	// METODOS =========================================================
	// =================================================================
	
	/**
	 * metodo que cadastra 
	 * @param atributos e valores
	 * @see Entidade::cadastrar()
	 * @return bool
	 */
	public function cadastrar($fotoVO){
		$atributos = '';
		$valores = '';
	
		$atributos .= 'foto_nome, foto_tipo, usuario';	
		if($this->foto){
			$foto_nome = $fotoVO->getFotoNome();			
			$valores .= '"'.$foto_nome['foto']['name'].'",';
			$sucesso = move_uploaded_file($foto_nome['foto']['tmp_name'],  $this->fotoPasta.$foto_nome['foto']['name']);
			//var_dump($foto_nome);
			if(!$sucesso){				
				return false;
			}
		} 
		//var_dump($fotoVO);
		//exit();
		$valores .= '"'.$fotoVO->getFotoTipo().'",';
		$valores .= $fotoVO->getUsuario();
		
	
		$sucesso = Entidade :: cadastrar($atributos, $valores);
		if(!$sucesso){
			return false;
		} else{			
			return true;			
		}	
	}
	/**
	 * meotodo para buscar as mensagens
	 * @return Array objeto MensagemVo
	 */
	public function buscar($arrayBusca = null){
		$sql = 'SELECT * FROM '.$this->entidade;
		
		if($arrayBusca){
			$sql .= ' WHERE ';
			foreach ($arrayBusca as $chave => $valor){
				$sql .= $chave .' = ';
				if(is_string($valor)){
					$sql .= ' " ';
				} 
				$sql .= $valor;
				if(is_string($valor)){
					$sql .= ' " ';
				}
			}
		}
		if($this->limiteBusca){
			$sql .= ' LIMIT 0 , '.$this->limiteBusca;
		}
		$query = mysql_query($sql);
		if(!$query){
			return false;
		} else {
			$arrayFotoVo = array();
			while($row = mysql_fetch_object($query)) {
				$fotoVo = new FotoVo(); 
				$fotoVo-> setfoto($row->foto);
				$fotoVo-> setUsuario($row->usuario);
				$fotoVo-> setFotoNome($row->foto_nome);
				$fotoVo-> setFotoTipo($row->foto_tipo);
				
				$arrayFotoVo [] = $fotoVo;
				
			}
		}				
		//var_dump($arrayMensagemVo);
		return $arrayFotoVo;
	}
	/**
	 * metodo para excluir 
	 * @param where
	 */
	public function excluir($param){
		// buscar o nome do arquivo para excluir do diretorio
		$sql = 'SELECT foto_nome FROM '. $this->entidade;
		$sql .= $param;
		$query = mysql_query($sql);
		while($row = mysql_fetch_object($query)) {
			$foto_nome = ($row->foto_nome);		
		}
		// apagar
		$sql = 'DELETE FROM '. $this->entidade;
		$sql .= $param;
		$query = mysql_query($sql);
		if(!$query){
			return false;
		} else {
			$sucesso = unlink($this->fotoPasta.$foto_nome);
			if(!$sucesso){
				return false;
			} else{
				return true;
			}
		}
	}
	
}



?>
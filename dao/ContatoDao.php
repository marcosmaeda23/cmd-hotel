<?php 
//include('Entidade.php');
class ContatoDao extends Entidade{
	// =================================================================
	// SETANDO =========================================================
	// =================================================================
	/**
	 * nome da tabela e tbm de chave primaria
	 */
	protected $entidade 						= 'contato';
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
	protected $dadosBase						= array('nome VARCHAR(100) NOT NULL');
	/**
	 * seta os dados que precisam ser obrigatorios e o campo que sera mostrada do campo
	 * @example $atributosObrigatorios = array('usuario_nome' => 'nome do usuário', 'usuario_email' => 'email do usuário');
	 */
	protected $atributosObrigatorios			= array('contato_nome' => 'nome do contato');
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
	protected $foto								= false;
	/**
	 * se foto true , as fotos vao para esta pasta
	 */
	protected $fotoPasta						= '../upload/';
	// =================================================================
	// METODOS =========================================================
	// =================================================================
	
	/**
	 * metodo que cadastra 
	 * @param atributos e valores
	 * @see Entidade::cadastrar()
	 * @return bool
	 */
	public function cadastrar($contatoVo){
		$atributos = '';
		$valores = '';
	
		$atributos .= 'contato_nome, usuario';
		$valores .= '"'.$contatoVo->getContatoNome().'",';
		$valores .= $contatoVo->getUsuario();

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
			$arrayContatoVo = array();
			while($row = mysql_fetch_object($query)) {
				$contatoVo = new ContatoVo();
				$contatoVo-> setContato($row->contato);
				$contatoVo-> setUsuario($row->usuario);
				$contatoVo-> setContatoNome($row->contato_nome);
		
				$arrayContatoVo [] = $contatoVo;
			}
		}		
		//var_dump($arrayMensagemVo);
		return $arrayContatoVo;
	}
	
}



?>
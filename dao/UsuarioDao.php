<?php 
//include('Entidade.php');
/*
 * classe com o metodo exclusivo do usuario
 */
class UsuarioDao extends Entidade {
	// =================================================================
	// SETANDO =========================================================
	// ================================================================= 
	/**
	 * nome da tabela e tbm de chave primaria
	 */
	protected $entidade 						= 'usuario';
	/**
	 * chave estrangeira
	 * @example $chaveEstrangeira = array('usuarioSistema INT(11) NOT NULL')
	 */
	protected $chaveEstrangeira 				= array();
	/**
	 * se tiver a chave estrangeira setado arruma a relacao e defineo update 
	 * @example $onUpdate = array('usuarioSistema' => 'cascade');
	 */
	protected $onUpdate							= array();
	/**
	 * se tiver a chave estrangeira setado arruma a relacao e defineo delete
	* @example $onUpdate = array('usuarioSistema' => 'set null');
	*/
	protected $onDelete							= array();
	/**
	 * seta a base de dados para fazer a atualizacao ou criacao, acrescenta o prefixo do nome da entidade
	 * @example  $dadosBase	= array('nome VARCHAR(100) NOT NULL', 'login VARCHAR(100) NOT NULL')
	 */
	protected $dadosBase						= array('nome VARCHAR(100) NOT NULL', 
														'email VARCHAR(100) NOT NULL',														
														'documentoTipo ENUM(\'cpf\',\'cnpj\',\'passaporte\') DEFAULT \'cpf\' NOT NULL', 
														'documento VARCHAR(100) NOT NULL');
	
	/**
	 * desformata os dados para ser inserido no banco e faz a validacao, data no formato ('dd/mm/yyy') fica ('yyyy-mm-dd')
	 * @param  data, preco, email, cpf, cnpj
	 * @example  $atributosFormatado = array('usuario_email' => 'email');
	 */
	private $atributosFormatado				= array('usuario_email' => 'email');
	/**
	 * se true coloca um campo momento_cadastro com o prefixo nome da entidade
	 */
	protected $momentoCadastro					= true;
	/**
	 * deixa os dados ordenados, acrescenta um campo ordem com o prefixo nome da entidade
	 */
	protected $ordenado							= false;
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
	 * metodo para setar a sessao
	 */
	public function setarSessao($usuario, $usuario_nome){
		session_start();
		$_SESSION['usuario'] = (int)$usuario;
		$_SESSION['usuario_nome'] =$usuario_nome;
		$_SESSION['sistema'] = 'Hotel_cmd';
	}
	/**
	 * metodo de login do usuario
	 * @param $usuarioVo
	 * @return 0-ok, 1-erro de login, 2-erro de senha, 3-n�o localizado
	 */
	public function logar($usuarioVo){
		
		$sql = 'SELECT usuario, usuario_nome, usuario_login, usuario_senha FROM usuario ';
		$sql .= ' WHERE usuario_login = "'.$usuarioVo->getUsuarioLogin().'" ';
		$query = mysql_query($sql);
		$qtde = mysql_affected_rows();	
		
		if($qtde > 0){
			while($row =  mysql_fetch_object($query)){
				if($row->senha == md5($usuarioVo->getUsuarioLogin())){
					if($row->nome == $usuarioVo->getUsuarioNome()){
						return 0;
					} else {
						return 1;
					}
				} else {
					return 2;
				}
				$usuario = $row->usuario;
				$usuario_nome = $row->usuario_nome;
			}
			$this->setarSessao($usuario, $usuario_nome);
		} else {
			return 3;
		}
	}
		
	/**
	 * metodo que cadastra e loga o usuario
	 * @param atributos e valores
	 * @see Entidade::cadastrar()
	 * @return bool
	 */
	public function cadastrar($usuarioVo){
		$atributos = '';
		$valores = '';
		
		$atributos .= 'usuario_nome, usuario_login, usuario_senha, usuario_email, usuario_lembrete';
		$valores .= '"'.$usuarioVo->getUsuarioNome().'",';
		$valores .= '"'.$usuarioVo->getUsuarioLogin().'",';
		$valores .= '"'.$usuarioVo->getUsuarioSenha().'",';
		$valores .= '"'.$usuarioVo->getUsuarioEmail().'",';
		$valores .= '"'.$usuarioVo->getUsuarioLembrete().'"';

		$sucesso = entidade :: cadastrar($atributos, $valores);
		if(!$sucesso){
			return false;
		} else{
			$sucesso = $this-> logar($usuarioVo);
			if(!$sucesso){
				return false;
			}
		}
		return true;
		
	}
	/**
	 * metodo que verifica a existencia do email na base de dados
	 * @param usuario_email
	 * @return bool
	 */
	public function verificarExistenciaEmail($usuarioVo){
		$sql = 'SELECT usuario_email FROM usuario WHERE usuario_email = "'.$usuarioVo->getUsuarioEmail().'"';
		$query = mysql_query($sql);
		$qtde = mysql_affected_rows();
		if($qtde == 1){
			return false;
		} else {
			return true;
		}
	}
	/**
	 * metodo para veidica se o login ja existe no banco
	 * @param login
	 * @return boolean 
	 */
	public function verificaLogin($usuario){
		$sql = 'SELECT '.$usuario->getLogin().' , FROM ';
		return true;
	}
	
	
}

?>
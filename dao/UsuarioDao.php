Ï<?php


/**
 * classe com o metodo exclusivo do usuario
 */
class UsuarioDao extends Entidade {

	// =================================================================
	// SETANDO =========================================================
	// ================================================================= 
	/**
	 * nome da tabela 
	 */
	protected $entidade = 'usuario';

	/**
	 * chave estrangeira
	 * @example $chaveEstrangeira = array('usuarioSistema INT(11) NOT NULL')
	 */
	protected $chaveEstrangeira = array (
		'nivelId INT NOT NULL'
	);

	/**
	 * se tiver a chave estrangeira setado arruma a relacao e defineo update 
	 * @example $onUpdate = array('usuarioSistema' => 'cascade');
	 */
	protected $onUpdate = array (
		'nivelId' => 'cascade'
	);

	/**
	 * se tiver a chave estrangeira setado arruma a relacao e define o delete
	 * @example $onUpdate = array('usuarioSistema' => 'set null');
	 */
	protected $onDelete = array (
		'nivelId' => 'cascade'
	);
	/**
	 * se tiver algum atributo como unique setado, inclui na tabela
	 * @deprecated id
	 * @example $uniqueKey = array('email', 'documento');
	 */
	protected $uniqueKey = array (
		'email',
		'documento',
		'login'
	);
	/**
	 * seta a base de dados para fazer a atualizacao ou criacao
	 * @deprecated id, status, dataCadastro, ordem - esses sao setados separados 
	 * @example  $dadosBase	= array('nome VARCHAR(100) NOT NULL', 'login VARCHAR(100) NOT NULL')
	 */

	private $usuarioId;
	private $usuarioNome;
	private $usuarioEmail;
	private $usuarioDocumentoTipo;
	private $usuarioDocumento;
	private $usuarioDataNascimento;
	private $usuarioSexo;
	private $usuarioLogin;
	private $usuarioSenha;
	private $usuarioLembrete;
	private $usuarioStatus;
	private $usuarioDataCadastro;

	protected $dadosBase = array (
		'nome VARCHAR(100) NOT NULL',
		'email VARCHAR(100) NOT NULL',
		'documentoTipo ENUM(\'cpf\',\'cnpj\',\'passaporte\') DEFAULT \'cpf\' NOT NULL',
		'documento VARCHAR(100) NOT NULL',
		'dataNascimento DATE NOT NULL',
		'sexo ENUM(\'f\',\'m\') NOT NULL',
		'login VARCHAR(100) NOT NULL',
		'senha VARCHAR(100) NOT NULL',
		'lembrete VARCHAR(150) NOT NULL'
	);

	/**
	 * Array contendo a ordem para salvar no banco
	 */
	protected $ordemBase = array (
		'telefone',
		'cepXedicao',
		'cepCadastro'
	);
	/**
	 * se true coloca um campo dataCadastro na tabela
	 */
	protected $momentoCadastro = true;
	/**
	 *  se true coloca um campo status na tabela
	 */
	protected $status = true;

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
	 * metodo para setar a sessao
	 * @param id, nome, nivel
	 * @return 0
	 */
	public function setarSessao($id, $nome, $nivel) {
		session_start();
		$_SESSION['ID'] = (int) $id;
		$_SESSION['NOME'] = $nome;
		$_SESSION['NIVEL'] = $nivel;
		$_SESSION['SISTEMA'] = 'Hotel_cmd';
		return 0;
	}

	/**
	 * metodo DAO de logar do usuario
	 * @param $usuarioVo
	 * @return 0-ok, 1-erro de login, 2-erro de senha, 3-nï¿½o localizado
	 */
	public function logar($usuarioVo) {

		$sql = 'SELECT usuarioId, usuarioNome, usuarioLogin, usuarioSenha, nivelId FROM usuario ';
		$sql .= 'WHERE usuarioLogin = "' . $usuarioVo->getUsuarioLogin() . '"';
		$query = mysql_query($sql);
		$qtde = mysql_affected_rows();
		if ($qtde > 0) {
			while ($row = mysql_fetch_object($query)) {
				if ($row->usuarioSenha == $usuarioVo->getUsuarioSenha()) {
					if ($row->usuarioLogin == $usuarioVo->getUsuarioLogin()) {
						$id = $row->usuarioId;
						$nome = $row->usuarioNome;
						$nivel = $row->nivelId;
						$sucesso = $this->setarSessao($id, $nome, $nivel);
						return $sucesso;
					} else {
						return 1;
					}
				} else {
					return 2;
				}
			}
		} else {
			return 3;
		}
	}

	/**
	 * metodo que cadastra chamando a cadastroAlterar da entidade
	 * @param objeto
	 * @see Entidade::cadastrarAlterar()
	 * @return boolean 
	 */
	public function cadastrarAlterar($usuarioVo) {
		// cadastra o objeto principal retorna o id do usuario ou false
		$idUsuario = entidade :: cadastrarAlterar($usuarioVo);
		if ($idUsuario === false) {
			return false;
		} else {
			// verifica se tem setado a $ordemBase e cadastra o restante das tabelas	
			for ($i = 0; $i < count($this->ordemBase); $i++) {
				$_entidade = $this->ordemBase[$i];
				if ($_entidade == 'telefone') {
					eval ('$_objeto = $usuarioVo -> get' . ucfirst($_entidade) . 'Vo();');
					$telefoneDao = new TelefoneDao();
					for ($j = 0; $j < count($_objeto); $j++) {
						$_objeto[$j]->setUsuarioId($idUsuario);
					}
					$sucesso = $telefoneDao->cadastrarAlterar($_objeto);
					if ($sucesso === false) {
						return false;
					}
				}
				if ($_entidade == 'cepXedicao') {
					eval ('$_objeto = $usuarioVo -> get' . ucfirst($_entidade) . 'Vo();');
					$_objeto->setUsuarioId($idUsuario);
					$cepXedicaoDao = new CepXedicaoDao();
					$idCepXedicao = $cepXedicaoDao->cadastrarAlterar($_objeto);
					// verifica se esta setado como 1 para gravar o cadastro cep
					$cepCadastrar = $_objeto->getCepXedicaoTipo() == 1 ? true : false;
					if ($idCepXedicao === false) {
						return false;
					}
				}
				if ($_entidade == 'cepCadastro') {
					// true - cadastra, false nao cadastra
					if ($cepCadastrar) {
						eval ('$_objeto = $usuarioVo -> get' . ucfirst($_entidade) . 'Vo();');
						$cepCadastroDao = new CepCadastroDao();
						$_objeto->setCepXedicaoId($idCepXedicao);
						$sucesso = $cepCadastroDao->cadastrarAlterar($_objeto);
						if ($sucesso === false) {
							return false;
						}
					}
				}
			}
		}
		return true;
	}

	/**
	* metodo para exibir os atributos do objeto
	* @param id da entidade
	* @return objeto da entidade
	*/
	public function exibir($objetoVo) {
		$sql = 'SELECT cepXedicaoTipo FROM cepXedicao WHERE usuarioId = ' . $objetoVo->getUsuarioId();
		$query = mysql_query($sql);
		$resposta = mysql_fetch_object($query);
		$qtde = mysql_affected_rows();
		$tipo = $resposta->cepXedicaoTipo;
		$cepXedicaoVo = new CepXedicaoVo();
		if ($qtde == 1) {
			if ($tipo == 1) {
				// tem o cep cadastrado
				$sql = 'SELECT * FROM ' . $this->entidade . '
								INNER JOIN cepXedicao ON cepXedicao.usuarioId = usuario.usuarioId
								INNER JOIN cepCadastro ON cepCadastro.cepXedicaoId = cepXedicao.cepXedicaoId
								WHERE usuario.usuarioId = ' . $objetoVo->getUsuarioId();
				$query = mysql_query($sql);
				while ($resposta = mysql_fetch_object($query)) {
					for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
						$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
						eval ('$objetoVo->set' . ucfirst($_dadosEstrangeiro[0]) . '($resposta->' . $_dadosEstrangeiro[0] . ');');
					}
				}
				for ($j = 0; $j < count($this->dadosBase); $j++) {
					$_dadosBase = explode(' ', $this->dadosBase[$j]);
					eval ('$objetoVo->set' . ucfirst($this->entidade) . ucfirst($_dadosBase[0]) . '($resposta->' . $this->entidade . ucfirst($_dadosBase[0]) . ');');

				}
				if ($this->momentoCadastro) {
					eval ('$objetoVo->set' . ucfirst($this->entidade) . 'DataCadastro($resposta->' . $this->entidade . 'DataCadastro);');
				}
				if ($this->status) {
					eval ('$objetoVo->set' . ucfirst($this->entidade) . 'Status($resposta->' . $this->entidade . 'Status);');
				}
				foreach ($cepXedicaoVo->cepXedicaoObrigatorio as $chave => $valor) {
					//$_dadosBase = explode(' ', $this->dadosBase[$j]);
					eval ('$cepXedicaoVo->set' . ucfirst($chave) . '($resposta->' . $chave . ');');
				}
			}
			$objetoVo->setCepXedicaoVo($cepXedicaoVo);
		} else {
			// nao tem o cep cadastrado
			$sql = 'SELECT * FROM usuario
						INNER JOIN cepXedicao ON cepXedicao.usuarioId = usuario.usuarioId
						INNER JOIN cep ON cep.cepId = cepXedicao.cepId
						INNER JOIN logradouro ON logradouro.logradouroId = cep.logradouroId
						INNER JOIN cidade ON cidade.cidadeId = logradouro.cidadeId
						INNER JOIN estado ON estado.estadoId = cidade.estadoId
						INNER JOIN pais ON pais.paisId = estado.paisId
						WHERE usuario.usuarioId = ' . $objetoVo->getUsuarioId();
			$query = mysql_query($sql);
			while ($resposta = mysql_fetch_object($query)) {
				for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
					$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
					eval ('$objetoVo->set' . ucfirst($_dadosEstrangeiro[0]) . '($resposta->' . $_dadosEstrangeiro[0] . ');');
				}
				for ($j = 0; $j < count($this->dadosBase); $j++) {
					$_dadosBase = explode(' ', $this->dadosBase[$j]);
					eval ('$objetoVo->set' . ucfirst($this->entidade) . ucfirst($_dadosBase[0]) . '($resposta->' . $this->entidade . ucfirst($_dadosBase[0]) . ');');
				}
				if ($this->momentoCadastro) {
					eval ('$objetoVo->set' . ucfirst($this->entidade) . 'DataCadastro($resposta->' . $this->entidade . 'DataCadastro);');
				}
				if ($this->status) {
					eval ('$objetoVo->set' . ucfirst($this->entidade) . 'Status($resposta->' . $this->entidade . 'Status);');
				}
			}
		}
		// buscar o telefone caso tenha algum usuario
		$sql = 'SELECT * FROM telefone
				WHERE telefone.usuarioId = ' . $objetoVo->getUsuarioId();
		$query = mysql_query($sql);
		// cria o array de telefone
		$telefoneArray = array ();
		while ($resposta = mysql_fetch_object($query)) {
			$telefoneVo = new TelefoneVo();
			foreach ($telefoneVo->telefoneObrigatorio as $chave => $valor) {
				eval ('$telefoneVo->set' . ucfirst($chave) . '($resposta->' . $chave . ');');
			}
			$telefoneArray[] = $telefoneVo;
		}
		// coloca o array de telefones dentro do objeto
		$objetoVo->setTelefoneVo($telefoneArray);
		if ($qtde == 1) {
			return $objetoVo;
		} else {
			return false;
		}
	}/**
	 * metodo para verifica se o login ja existe no banco
	 * @param login
	 * @return boolean 
	 */
	public function verificarLogin($usuarioVo) {
		$sql = 'SELECT usuarioLogin FROM usuario WHERE usuarioLogin = "' . $usuarioVo->getUsuarioLogin() . ' "';
		$query = mysql_query($sql);
		$qtde = mysql_affected_rows();
		if ($qtde == 1) {
			return false;
		} else {
			return true;
		}
	}

}
?>
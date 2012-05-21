<?php

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
    protected $chaveEstrangeira = array('nivelId INT NOT NULL');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate = array('nivelId' => 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete = array('nivelId' => 'cascade');
	/**
     * se tiver algum atributo como unique setado, inclui na tabela
     * @deprecated id
     * @example $uniqueKey = array('email', 'documento');
     */
    protected $uniqueKey = array('email', 'documento', 'login');
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
	
    protected $dadosBase = array('nome VARCHAR(100) NOT NULL',
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
	protected $ordemBase	= array('telefone', 'cep');
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
     * @return 0-ok, 1-erro de login, 2-erro de senha, 3-n�o localizado
     */
    public function logar($usuarioVo) {

        $sql = 'SELECT usuarioId, usuarioNome, usuarioLogin, usuarioSenha, nivelId FROM usuario ';
        $sql .= 'WHERE usuarioLogin = "'.$usuarioVo->getUsuarioLogin().'"';
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
     * @param atributos e valores
     * @see Entidade::cadastrarAlterar()
     * @return id 
     */    
    public function cadastrarAlterar($usuarioVo) {
    	//var_dump($usuarioVo);
        $id = entidade :: cadastrarAlterar($usuarioVo);        
        if ($id === false){
        	return false;
        } else {
        	// verifica se tem setado a $ordemBase e cadastra o restante das tabelas
		
        	for ( $i = 0; $i < count($this->ordemBase); $i++ ) {
				$_entidade = $this->ordemBase[$i];
				if ($_entidade == 'telefone') {
					eval('$_objeto = $usuarioVo -> get'.ucfirst($_entidade).'Vo();');
					$_objeto->setUsuarioId($id);
					var_dump($_objeto);
					$sucesso = entidade :: cadastrarAlterar($_objeto); 
					if ($sucesso === false){
			        	return false;
			        }
				}
				if ($_entidade == 'cep') {
					
				} 
			}        	 
        }       
    }

    /**
     * metodo que verifica a existencia do email na base de dados
     * @param usuario_email
     * @return bool
     */
    public function verificarExistenciaEmail($usuarioVo) {
        $sql = 'SELECT usuarioEmail FROM usuario WHERE usuarioEmail = "'.$usuarioVo->getUsuarioEmail().'"';
        $query = mysql_query($sql);
        $qtde = mysql_affected_rows();
        if ($qtde == 1) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * metodo para verifica se o login ja existe no banco
     * @param login
     * @return boolean 
     */
    public function verificarLogin($usuarioVo) {
        $sql = 'SELECT usuarioLogin FROM usuario WHERE usuarioLogin = "'.$usuarioVo->getUsuarioLogin().' "';
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
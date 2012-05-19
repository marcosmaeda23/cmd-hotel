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
    protected $chaveEstrangeira = array();

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate = array();

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete = array();
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
    protected $dadosBase = array('nome VARCHAR(100) NOT NULL',
						        'email VARCHAR(100) NOT NULL',
						        'documentoTipo ENUM(\'cpf\',\'cnpj\',\'passaporte\') DEFAULT \'cpf\' NOT NULL',
						        'documento VARCHAR(100) NOT NULL',
						        'login VARCHAR(100) NOT NULL',
						        'senha VARCHAR(100) NOT NULL',
						        'lembrete VARCHAR(150) NOT NULL');   

	/**
	 * Array contendo a ordem para salva no banco
	 */
	private $ordemBase	= array('usuario', 'telefone', 'cep');
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

        $sql = 'SELECT id, nome, login, senha, nivelId FROM usuario ';
        $sql .= 'WHERE login = "'.$usuarioVo->getLogin().'"';
        $query = mysql_query($sql);
        $qtde = mysql_affected_rows();
        if ($qtde > 0) {
            while ($row = mysql_fetch_object($query)) {
                $usuarioVo->getSenha() . ' - ' . $row->senha;
                if ($row->senha == $usuarioVo->getSenha()) {
                    if ($row->login == $usuarioVo->getLogin()) {
                        $id = $row->id;
                        $nome = $row->nome;
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
     * metodo que cadastra e loga o usuario
     * @param atributos e valores
     * @see Entidade::cadastrar()
     * @return bool
     */
    public function cadastrar($usuarioVo) {
        $sucesso = entidade :: cadastrar($usuarioVo);
    	return $sucesso;
    	/*
        $atributos = '';
        $valores = '';

        $atributos .= 'usuario_nome, usuario_login, usuario_senha, usuario_email, usuario_lembrete';
        $valores .= '"' . $usuarioVo->getUsuarioNome() . '",';
        $valores .= '"' . $usuarioVo->getUsuarioLogin() . '",';
        $valores .= '"' . $usuarioVo->getUsuarioSenha() . '",';
        $valores .= '"' . $usuarioVo->getUsuarioEmail() . '",';
        $valores .= '"' . $usuarioVo->getUsuarioLembrete() . '"';

        if (!$sucesso) {
            return false;
        } else {
            $sucesso = $this->logar($usuarioVo);
            if (!$sucesso) {
                return false;
            }
        }
        return true;
        */
    }

    /**
     * metodo que verifica a existencia do email na base de dados
     * @param usuario_email
     * @return bool
     */
    public function verificarExistenciaEmail($usuarioVo) {
        $sql = 'SELECT email FROM usuario WHERE email = "'.$usuarioVo->getEmail().'"';
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
        $sql = 'SELECT login FROM usuario WHERE login = "'.$usuarioVo->getLogin().' "';
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
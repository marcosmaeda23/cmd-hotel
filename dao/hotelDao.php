<?php

/**
 * classe com o metodo exclusivo do hotel
 */
class HotelDao extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    

    /**
     * nome da tabela 
     */
    protected $entidade 			= 'hotel';
    /**
     * chave estrangeira
     * @example $chaveEstrangeira 	= array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira 	= array();
	/**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate 			= array();

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete 			= array();
    /**
     * se tiver algum atributo como unique setado, inclui na tabela
     * @deprecated id
     * @example $uniqueKey = array('email', 'documento');
     */
    protected $uniqueKey 		= array('cnpj', 'nome', 'inscricaoEstadual', 'email');
    /**
     * seta a base de dados para fazer a atualizacao ou criacao
     * @deprecated id, status, dataCadastro, ordem - esses sao setados separados 
     * @example  $dadosBase	= array('nome VARCHAR(100) NOT NULL', 'login VARCHAR(100) NOT NULL')
     */
	protected $dadosBase 		= array('nome VARCHAR (100) NOT NULL',
								        'cnpj VARCHAR (100) NOT NULL',
								        'inscricaoEstadual VARCHAR (100) NOT NULL',
								        'email VARCHAR (100) NOT NULL',
								        'observacao VARCHAR (800) NULL',
								        'gerente VARCHAR (100) NOT NULL' );

    /**
     * Array contendo a ordem para salvar no banco
     */
    protected $ordemBase = array('telefone', 'cepXedicao', 'cepCadastro');
    /**
     *  se true coloca um campo status na tabela
     */
    protected $status 				= false;

    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro 		= true;

    /**
     * limite de para a pesquisa
     */
    protected $limite 				= '0, 10';

    /**
     * deixa os dados ordenados, acrescenta um campo ordem na tabela
     */
    protected $ordenado 			= false;

    // =================================================================
    // METODOS =========================================================
    // =================================================================

    /**
     * metodo que cadastra chamando a cadastroAlterar da entidade
     * @param objeto
     * @see Entidade::cadastrarAlterar()
     * @return boolean 
     */
    public function cadastrarAlterar($hotelVo) {
        // cadastra o objeto principal retorna o id do hotel ou false
        $idHotel = entidade :: cadastrarAlterar($hotelVo);
        if ($idHotel == false) {
            return false;
        } else {
            // verifica se tem setado a $ordemBase e cadastra o restante das tabelas	
            for ($i = 0; $i < count($this->ordemBase); $i++) {
                $_entidade = $this->ordemBase[$i];
                if ($_entidade == 'telefone') {
                    eval('$_objeto = $hotelVo -> get' . ucfirst($_entidade) . 'Vo();');
                    $telefoneDao = new TelefoneDao();
                    for ($j = 0; $j < count($_objeto); $j++) {
                        $_objeto[$j]->setHotelId($idHotel);
                    }
                    $sucesso = $telefoneDao ->cadastrarAlterar($_objeto);

                    if ($sucesso === false) {
                        return false;
                    }
                }
                if ($_entidade == 'cepXedicao') {
                    eval('$_objeto = $hotelVo -> get' . ucfirst($_entidade) . 'Vo();');
                    $_objeto->setHotelId($idHotel);
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
                        eval('$_objeto = $hotelVo -> get' . ucfirst($_entidade) . 'Vo();');
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
        $sql = 'SELECT cepXedicaoTipo FROM cepXedicao WHERE hotelId = ' . $objetoVo->getHotelId();
        $query = mysql_query($sql);
        $resposta = mysql_fetch_object($query);
        $qtde = mysql_affected_rows();
        $tipo = $resposta->cepXedicaoTipo;
        $cepXedicaoVo = new CepXedicaoVo();
        $cepCadastroVo = new CepCadastroVo();
        if ($qtde == 1) {
            if ($tipo == 1) {
                // tem o cep cadastrado
                $sql = 'SELECT * FROM ' . $this->entidade . '
								INNER JOIN cepXedicao ON cepXedicao.hotelId = hotel.hotelId
								INNER JOIN cepCadastro ON cepCadastro.cepXedicaoId = cepXedicao.cepXedicaoId
								WHERE hotel.hotelId = ' . $objetoVo->getHotelId();
                $query = mysql_query($sql);
                while ($resposta = mysql_fetch_object($query)) {
                    for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
                        $_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
                        eval('$objetoVo->set' . ucfirst($_dadosEstrangeiro[0]) . '($resposta->' . $_dadosEstrangeiro[0] . ');');
                    }
                    for ($j = 0; $j < count($this->dadosBase); $j++) {
                        $_dadosBase = explode(' ', $this->dadosBase[$j]);
                        if ($_dadosBase[1] == 'DATE') {
                            eval('$objetoVo->set' . ucfirst($this->entidade) . ucfirst($_dadosBase[0]) . '(formatarData($resposta->' . $this->entidade . ucfirst($_dadosBase[0]) . '));');
                        } else {
                            eval('$objetoVo->set' . ucfirst($this->entidade) . ucfirst($_dadosBase[0]) . '($resposta->' . $this->entidade . ucfirst($_dadosBase[0]) . ');');
                        }
                    }
                    if ($this->momentoCadastro) {
                        eval('$objetoVo->set' . ucfirst($this->entidade) . 'DataCadastro($resposta->' . $this->entidade . 'DataCadastro);');
                    }
                    if ($this->status) {
                        eval('$objetoVo->set' . ucfirst($this->entidade) . 'Status($resposta->' . $this->entidade . 'Status);');
                    }
                    // pega o cepXedicao e coloca os atributos dentro
                    foreach ($cepXedicaoVo->cepXedicaoObrigatorio as $chave => $valor) {
                        eval('$cepXedicaoVo->set' . ucfirst($chave) . '($resposta->' . $chave . ');');
                    }
                    // pega o cepCadastro e coloca os atributos dentro
                    foreach ($cepCadastroVo->cepCadastroObrigatorio as $chave => $valor) {
                        eval('$cepCadastroVo->set' . ucfirst($chave) . '($resposta->' . $chave . ');');
                    }
                }
            }
            $objetoVo->setCepXedicaoVo($cepXedicaoVo);
            $objetoVo->setCepCadastroVo($cepCadastroVo);
        } else {
            // nao tem o cep cadastrado
            $sql = 'SELECT * FROM hotel
						INNER JOIN cepXedicao ON cepXedicao.hotelId = hotel.hotelId
						INNER JOIN cep ON cep.cepId = cepXedicao.cepId
						INNER JOIN logradouro ON logradouro.logradouroId = cep.logradouroId
						INNER JOIN cidade ON cidade.cidadeId = logradouro.cidadeId
						INNER JOIN estado ON estado.estadoId = cidade.estadoId
						INNER JOIN pais ON pais.paisId = estado.paisId
						WHERE hotel.hotelId = ' . $objetoVo->getHotelId();
            $query = mysql_query($sql);
            while ($resposta = mysql_fetch_object($query)) {
                for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
                    $_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
                    eval('$objetoVo->set' . ucfirst($_dadosEstrangeiro[0]) . '($resposta->' . $_dadosEstrangeiro[0] . ');');
                }
                for ($j = 0; $j < count($this->dadosBase); $j++) {
                    $_dadosBase = explode(' ', $this->dadosBase[$j]);
                    eval('$objetoVo->set' . ucfirst($this->entidade) . ucfirst($_dadosBase[0]) . '($resposta->' . $this->entidade . ucfirst($_dadosBase[0]) . ');');
                }
                if ($this->momentoCadastro) {
                    eval('$objetoVo->set' . ucfirst($this->entidade) . 'DataCadastro($resposta->' . $this->entidade . 'DataCadastro);');
                }
                if ($this->status) {
                    eval('$objetoVo->set' . ucfirst($this->entidade) . 'Status($resposta->' . $this->entidade . 'Status);');
                }
            }
        }
        // buscar o telefone caso tenha algum usuario
        $sql = 'SELECT * FROM telefone
				WHERE telefone.hotelId = ' . $objetoVo->getHotelId();
        $query = mysql_query($sql);
        // cria o array de telefone
        $telefoneArray = array();
        while ($resposta = mysql_fetch_object($query)) {
            $telefoneVo = new TelefoneVo();
            foreach ($telefoneVo->telefoneObrigatorio as $chave => $valor) {
                eval('$telefoneVo->set' . ucfirst($chave) . '($resposta->' . $chave . ');');
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
    }

}

?>
<?php

/**
 * classe com o metodo exclusivo do gerente
 */
class QuartoDao extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    /**
     * nome da tabela 
     */
    protected $entidade = 'quarto';

    /**
     * chave estrangeira
     * @example $chaveEstrangeira 	= array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira = array(
        'hotelId INT NOT NULL',
        'quartoTipoId INT NOT NULL',
        'statusId INT NOT NULL'
        );

    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate = array(
        'hotelId' => 'cascade',
        'quartoTipoId' => 'cascade',
        'statusId' => 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete = array(
        'hotelId' => 'cascade',
        'quartoTipoId' => 'cascade',
        'statusId' => 'cascade');

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
     * reservado 1-nao reservado, 2-resevado, 3-manutencao, 4-indisponivel
     */
    protected $dadosBase = array(
        'numero VARCHAR (100) NOT NULL',
        'descricao VARCHAR (800) NOT NULL',
        'valor DECIMAL (10,2) NOT NULL');

    /**
     * metodo para buscar os objetos 
     * @param sem param
     * @return array de objeto
     */
    public function buscar() {
        $sql = 'SELECT * FROM ' . $this->entidade . ' LIMIT ' . $this->limite;
        $query = mysql_query($sql);
        $arrayObjeto = array();
        $qtde = mysql_affected_rows();
        if ($qtde > 0) {
            while ($rows = mysql_fetch_object($query)) {
                eval('$objetoVo = new ' . ucfirst($this->entidade) . 'Vo();');
                eval('$objetoVo -> set' . ucfirst($this->entidade) . 'Id("$rows->' . $this->entidade . 'Id");');
                eval('$objetoVo -> set' . ucfirst($this->entidade) . 'Descricao("$rows->' . $this->entidade . 'Descricao");');
                $arrayObjeto[] = $objetoVo;
            }
        }
        return $arrayObjeto;
    }

    /**
     * Array contendo a ordem para salvar no banco
     */
    protected $ordemBase = array();

    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro = true;

    /**
     *  se true coloca um campo status na tabela
     * 	padrao 1 - ativo, 2 - inativo
     */
    protected $status = false;

    /**
     * deixa os dados ordenados, acrescenta um campo ordem na tabela
     */
    protected $ordenado = false;

    /**
     * limite de para a pesquisa
     */
    protected $limite = '0, 10';

    /**
     * arquivo com foto
     */
    protected $foto = true;

    /**
     * se foto true , as fotos vao para esta pasta
     */
    protected $fotoPasta = '../quarto/upload/';

    // =================================================================
    // METODOS =========================================================
    // =================================================================
}

?>
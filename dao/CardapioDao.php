<?php

/**
 * classe com o metodo exclusivo do usuario
 */
class CardapioDao extends Entidade {

    // =================================================================
    // SETANDO =========================================================
    // ================================================================= 
    /**
     * nome da tabela 
     */
    protected $entidade = 'cardapio';

    /**
     * chave estrangeira
     * @example $chaveEstrangeira 	= array('usuarioSistema INT(11) NOT NULL')
     */
    protected $chaveEstrangeira = array(
        'cardapioTipoId INT NOT NULL',
        'hotelId INT NOT NULL');
    /**
     * se tiver a chave estrangeira setado arruma a relacao e defineo update 
     * @example $onUpdate = array('usuarioSistema' => 'cascade');
     */
    protected $onUpdate = array(
        'cardapioTipoId' => 'cascade',
        'hotelId' => 'cascade');

    /**
     * se tiver a chave estrangeira setado arruma a relacao e define o delete
     * @example $onUpdate = array('usuarioSistema' => 'set null');
     */
    protected $onDelete = array(
        'cardapioTipoId' => 'cascade',
        'hotelId' => 'cascade');

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
    protected $dadosBase = array(
        'nome VARCHAR(100) NOT NULL ',
        'tempo VARCHAR(100) NULL ',
        'descricao VARCHAR(200) NOT NULL ',
        'valorCalorico DECIMAL (0,2) NULL ',
        'valor DECIMAL (10,2) NOT NULL ',
        'observacao VARCHAR(800) NULL ',
        );

    /**
     * Array contendo a ordem para salvar no banco
     */
    protected $ordemBase = array('foto');

    /**
     * se true coloca um campo dataCadastro na tabela
     */
    protected $momentoCadastro = true;

    /**
     *  se true coloca um campo status na tabela
     *  padrao 1 - ativo, 2 - inativo
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
    protected $fotoPasta = '../cardapio/upload/';

    // =================================================================
    // METODOS =========================================================
    // =================================================================

    /**
     * 
     */
    public function cadastrarAlterar($objetoVo) {
        $idCardapio = entidade :: cadastrarAlterar($objetoVo);        
        if ($idCardapio === false) {
            return false;
        } else {
            // verifica se tem setado a $ordemBase e cadastra o restante das tabelas	
            for ($i = 0; $i < count($this->ordemBase); $i++) {
                $_entidade = $this->ordemBase[$i];
                if ($_entidade == 'foto') {
                    eval('$_objeto = $objetoVo -> get' . ucfirst($_entidade) . 'Vo();');
                    $_objeto->setCardapioId($idCardapio);
                    $fotoDao = new FotoDao();

                    $sucesso = $fotoDao->cadastrarAlterar($_objeto);

                    if ($sucesso === false) {
                        return false;
                    }
                }
            }
        }

        return true;
    }

}

?>
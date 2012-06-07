<?php

//include('Banco.php');

class Entidade extends Banco {

    /**
     * construtor que abre a conexao com o banco
     */
    public function __construct() {
        $banco = new Banco();
        $sucesso = $banco->conectar();
    }

    public function __destruct() {
//        $banco = new Banco();
//        $sucesso = $banco->fechar();
    }

    /**
     * metodo para alterar
     * @param id da entidade
     * @return bool
     */
    public function alterar() {
        
    }

    /**
     * metodo para cadastrar ou alterar, verifica $dadosBase para pegar todos os atributos do banco
     * se tiver o id junto com o objeto altera senao cadastra
     * @return bool
     */
    public function cadastrarAlterar($objetoVo) {
        //var_dump($objetoVo);
        // verifica se tiver o id dentro do objeto para salvar ou alterar

        eval('$id = $objetoVo->get' . ucfirst($this->entidade) . 'Id();');
        if (empty($id)) {
            // nao tem o id dentro do objeto, insert
            $sql = 'INSERT INTO ' . $this->entidade . ' ( ';
            // verifica as chaves estrangeiras
            for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
                $_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
                $sql .= $_dadosEstrangeiro[0];
                if ($j + 1 <= count($this->chaveEstrangeira)) {
                    $sql .= ', ';
                }
            }
            for ($j = 0; $j < count($this->dadosBase); $j++) {
                $_dadosBase = explode(' ', $this->dadosBase[$j]);
                $sql .= $this->entidade . ucfirst($_dadosBase[0]);
                if ($j + 1 <> count($this->dadosBase)) {
                    $sql .= ', ';
                }
            }
            // se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
            if ($this->momentoCadastro) {
                $sql .= ', ' . $this->entidade . 'DataCadastro';
            }
            if ($this->status) {
                $sql .= ', ' . $this->entidade . 'Status';
            }
            $sql .= ' ) VALUES ( ';
            //chave estrangeira
            for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
                $_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
                eval('$valor = $objetoVo -> get' . ucfirst($_dadosEstrangeiro[0]) . '();');
                if (empty($valor)) {
                    $sql .= 'null';
                } else {
                    $sql .= $valor;
                }
                if ($j + 1 <= count($this->chaveEstrangeira)) {
                    $sql .= ', ';
                }
            }
            for ($j = 0; $j < count($this->dadosBase); $j++) {
                $_dadosBase = explode(' ', $this->dadosBase[$j]);
                eval('$valor = $objetoVo -> get' . ucfirst($this->entidade) . ucfirst($_dadosBase[0]) . '();');
                if (is_string($valor)) {
                    $sql .= "'";
                }
                if (empty($valor)) {
                    $sql .= 'null';
                } else {
                    if ($_dadosBase[1] == 'DATE') {
                        $sql .= formatarData($valor);
                    } else {
                        $sql .= $valor;
                    }
                }
                if (is_string($valor)) {
                    $sql .= "'";
                }
                if ($j + 1 <> count($this->dadosBase)) {
                    $sql .= ', ';
                }
            }
            // se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
            if ($this->momentoCadastro) {
                $sql .= ", '" . date('Y-m-d H:m:s') . "'";
            }
            if ($this->status) {
                $sql .= ', ';
                eval('$sql .= $objetoVo -> get' . ucfirst($this->entidade) . 'Status();');
            }
            $sql .= ' ) ;';
            $query = mysql_query($sql);
            $_id = mysql_insert_id();
        } else {
            exit();
            // tem o id dentro do objeto, update
            $sql = 'UPDATE ' . $this->entidade . ' SET ( ';
            for ($j = 0; $j < count($this->chaveEstrangeira); $j++) {
                $_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
                $sql .= $_dadosEstrangeiro[0];
                if ($j + 1 == count($this->chaveEstrangeira)) {
                    $sql .= ', ';
                }
            }
            for ($j = 0; $j < count($this->dadosBase); $j++) {
                $_dadosBase = explode(' ', $this->dadosBase[$j]);
                $sql .= $this->entidade . ucfirst($_dadosBase[0]);
                if ($j + 1 <> count($this->dadosBase)) {
                    $sql .= ', ';
                }
            }
            // se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
            if ($this->momentoCadastro) {
                $sql .= ', ' . $this->entidade . 'DataCadastro';
            }
            if ($this->status) {
                $sql .= ', ' . ucfirst($this->entidade) . 'Status';
            }
            $sql .= ') WHERE ' . $this->entidade . 'Id = ' . $id;
            //var_dump($objetoVo);
            //$query = mysql_query($sql);
            //$_id = mysql_insert_id();
        }


        if (!$query) {
            return false;
        } else {
            return $_id;
        }
    }

    /**
     * metodo para excluir 
     * @param id da entidade
     * @return bool
     */
    public function excluir() {
        
    }

    /**
     * metodo para pesquisar
     * @param array da pesquisa
     * @example 1 array ('entidade' => 'cep')
     * @return array da pesquisa
     */
    public function pesquisar($arrayParametros) {
        
    }

    /**
     * metodo para buscar os objetos 
     * @param 
     * @return array de objeto
     */
    public function buscar() {
        $sql = 'SELECT * FROM ' . $this->entidade . ' LIMIT ' . $this->limite;
        $query = mysql_query($query);
        $arrayObjeto = array();
        while ($rows = mysql_fetch_object($query)) {
            
        }

        exit();
    }

    /**
     * metodo para veificar se o numenro do documento ja esta na basa de dados
     * @param objeto e o tipo do documento
     * @return boolean
     */
    public function verificarExistenciaDocumento($objeto, $documentoTipo) {
        
    }

    /**
     * metodo que verifica a existencia do email na base de dados
     * @param usuario_email
     * @return boolean
     */
    public function verificarExistenciaEmail($objetoVo) {
        $sql = 'SELECT ' . $this->entidade . 'Email FROM ' . $this->entidade . ' WHERE ' .
                $this->entidade . 'Email = "';
        eval('$valor = $objetoVo -> get' . ucfirst($this->entidade) . 'Email();');
        $sql .= $valor . '"';
        $query = mysql_query($sql);
        $qtde = mysql_affected_rows();
        if ($qtde == 1) {
            return false;
        } else {
            return true;
        }
    }
    /**
	 * funcao para verificar se o campo unico ja esta cadastrado no banco
	 * usado ajax
	 * @param objeto e a entidade
	 * @return boolean
	 */
	public function verificaCamposUnicos($objetoVo){
		
		for ( $i = 0; $i < count($this->uniqueKey); $i++ ) {
	        eval('$valor = $objetoVo -> get' . ucfirst($this->entidade) .ucfirst($this->uniqueKey[$i]). '();');
	        $campo =  $this->entidade.ucfirst($this->uniqueKey[$i]);
	        if(!empty($valor)){
	        	break;
	        }
		}
		$sql = 'SELECT ' . $campo . ' FROM ' . $this->entidade ;
        $sql .= ' WHERE '. $campo .' = "'. $valor.'"';
        $query = mysql_query($sql);
        $qtde = mysql_affected_rows();      
        if ($qtde == 1) {
        	//achou
            return true;
        } else {
        	//nao achou
            return false;
        }
	}

}

?>

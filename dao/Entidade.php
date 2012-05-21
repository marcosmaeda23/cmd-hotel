<?php 

//include('Banco.php');

class Entidade extends Banco{
	/**
	 * construtor que abre a conexao com o banco
	 */
	public function __construct(){
		$banco = new Banco();
		$sucesso = $banco->conectar();
	}
	public function __destruct() {
		$banco = new Banco();
		$sucesso = $banco->fechar();
		
	}
	/**
	 * metodo para alterar
	 * @param id da entidade
	 * @return bool
	 */
	public function alterar(){
	
	}

	/**
	 * metodo para cadastrar ou alterar, verifica $dadosBase para pegar todos os atributos do banco
	 * se tiver o id junto com o objeto altera senao cadastra
	 * @return bool
	 */
	public function cadastrarAlterar($objetoVo){

		// verifica se tiver o id dentro do objeto para salvar ou alterar
		eval('$id = $objetoVo->get'.ucfirst($this->entidade).'Id();');
		if (empty($id)) {
			// nao tem o id dentro do objeto, insert
			$sql = 'INSERT INTO '.$this->entidade.'( ';
			// verifica as chaves estrangeiras
			for ( $j = 0; $j < count($this->chaveEstrangeira); $j++ ) {
				$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
				$sql .= $_dadosEstrangeiro[0];
				if ($j + 1 == count($this->chaveEstrangeira)){
					$sql .= ', ';
				}
			}			
			for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
				$_dadosBase = explode(' ', $this->dadosBase[$j]);
				$sql .= $this->entidade.ucfirst($_dadosBase[0]);
				if ($j + 1 <> count($this->dadosBase)){
					$sql .= ', ';
				}
			}
			// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
			if($this->momentoCadastro){
				$sql .= ', '.$this->entidade.'DataCadastro';
			}	
			if($this->status){
				$sql .= ', '.ucfirst($this->entidade).'Status';
			}	
			$sql .= ' ) VALUES ( ';
			//chave estrangeira
			for ( $j = 0; $j < count($this->chaveEstrangeira); $j++ ) {
				$_dadosEstrangeiro = explode(' ', $this->chaveEstrangeira[$j]);
				eval('$sql .= $objetoVo -> get'.ucfirst($_dadosEstrangeiro[0]).'();');
				if ($j + 1 == count($this->chaveEstrangeira)){
					$sql .= ', ';
				}
			}
			for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
				$_dadosBase = explode(' ', $this->dadosBase[$j]);
				eval('$valor = $objetoVo -> get'.ucfirst($this->entidade).ucfirst($_dadosBase[0]).'();');
				if (is_string($valor)){
					$sql .= '"';
				}
				$sql .= $valor;
				if (is_string($valor)){
					$sql .= '"';
				}
				if ($j+1 <> count($this->dadosBase)){
					$sql .= ', ';
				}
			}
			// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
			if($this->momentoCadastro){
				$sql .= ',  "'.date('Y-m-d H:m:s').'"';
			}
			if($this->status){
				$sql .= ', ';					
				eval('$sql .= $objetoVo -> get'.ucfirst($this->entidade).'Status();');
			}
			$sql .= ') ';
			
			echo $sql;
			//var_dump($objetoVo);
			//$query = mysql_query($sql);
			//$_id = mysql_insert_id();
			
		} else {
			// tem o id dentro do objeto, update
			$sql = 'UPDATE '.$this->entidade. ' SET ( ';
			
			$sql .= ') WHERE '.$this->entidade.'Id = '.$id;
			//var_dump($objetoVo);
			//$query = mysql_query($sql);
			//$_id = mysql_insert_id();
			echo $sql;
		}
		
				
		exit();
		
		if(!$query){
			return false;
		} else {
			return $_id;
		}
	}
	
	/**
	 * metodo que verifica os campos obrigatorios
	 * @return array do campos obrigatorios
	 */
	public function camposObrigatorios(){		
		return $this->atributosObrigatorios;		
	}
	/**
	 * metodo para excluir 
	 * @param id da entidade
	 * @return bool
	 */
	public function excluir(){
		
	} 
		
	/**
	 * metodo para selecionar a entidade
	 * @param id da entidade
	 * @return objeto da entidade
	 */
	public function selecionar(){
		
	}
	
}


?>
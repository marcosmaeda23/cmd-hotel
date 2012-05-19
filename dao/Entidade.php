<?php 

//include('Banco.php');

class Entidade extends Banco{
	/**
	 * construtor que abre a conexao cxom o banco
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
	public function cadastrar($objetoVo){
		// pega os itens do array ordembase para ver qual ordem para salvar no banco
		
		for ( $i = 0;  $i < count($this->ordemBase); $i++ ) {
			if ($i = 0){
				$atributos = '';
				$valores = '';
				$sql = 'INSERT INTO '.$this->ordemBase[$i].'(';
				for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
					$_dadosBase = explode(' ', $this->dadosBase);
					$atributos .= $_dadosBase[0];
					if ($j + 1 <> count($this->dadosBase)){
						$atributos .= ', ';
					}
				}
				// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
				if($this->momentoCadastro){
					$atributos .= ', dataCadastro';
				}	
				$sql .= ') VALUES (';
				for ( $j = 0; $j < count($this->dadosBase); $j++ ) {
					$_dadosBase = explode(' ', $this->dadosBase);
					eval('$valores .= '.$this->ordemBase[$j].'Vo->get'.ucfirst($_dadosBase[0]).'Vo();');
					if ($j+1 <> count($this->dadosBase)){
						$valores .= ', ';
					}
				}
				// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
				if($this->momentoCadastro){
					$valores .= ',"'.date('Y-m-d H:m:s').'"';
				}
				$sql .= ') ';
				$query = mysql_query($sql);
			} else { 
				
							
			}			
		}
		
		if(!$query){
			return false;
		} else {
			return true;
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
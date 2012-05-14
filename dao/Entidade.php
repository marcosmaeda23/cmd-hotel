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
	 * metodo para cadastrar, verifica $dadosBase para pegar todos os atributos do banco
	 * @return bool
	 */
	public function cadastrar($atributos, $valores){
		// se na Dao tiver setado momentoCadastro = true, cadastra o momento na tabela
		if($this->momentoCadastro){
			$atributos .= ','.$this->entidade.'_momento_cadastro';
			$valores .= ',"'.date('Y-m-d').'"';
		}	
			
			
		$sql = 'INSERT INTO '.$this->entidade.'('.$atributos.') VALUES ('.$valores.')';
		$query = mysql_query($sql);
	
		if(!$query){
			return false;
		} else {
			return true;
		}
	}
	
	/**
	 * metodo qu verifica os campos obrigatorios
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
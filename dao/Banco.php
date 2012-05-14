<?php
/*
 * classe de metodos do banco
 * 
 */
class Banco {
	
	
	/*
	 * metodo para conectar no banco 
	 * @return bool
	 */
	public function conectar(){
		$link = mysql_connect('localhost', 'root', '');
		if (!$link){	
			die ('Erro na conexao com o servidor' . mysql_error());
		}
		$db_selected = mysql_select_db('trabalho' , $link);
	
		if (!$db_selected){
			die('Erro ao selecionar o Banco de Dados' . mysql_error());
		}
		return true;
	}
	
	/*
	 * fecha a conexao com o banco
	 * @return bool
	 */
	public function fechar(){
		return mysql_close();
	}
	/*
	 * metodo para a criacao/atualizacao do banco
	 * @return bool
	 */
	public function prepararBaseDados(){
		
	}

}
?>
<?php


class Conexao
{
	
	private $host = 'localhost';
	private $dbname = 'listatarefas';
	private $user = 'root';
	private $pass = '';

	public function conectar(){
		try {
			$conexao = new PDO(
				"mysql:host=$this->host;$this->dbname",
				'$this->user',
				'$this->pass'
			);

			return $conexao;
			
		} catch (PDOException $e) {
			echo '<p>'.$e->getMessage().'</p>'
		}


	}

}

?>
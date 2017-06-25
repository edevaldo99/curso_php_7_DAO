<?php 

class Sql extends PDO{//Estende da classe PDO

	private $conn;

	//Faz a conecção ao estanciar essa classe
	public function __construct(){
		$this->conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");
	}

	//Vai fazendo o bindParam com a function setParam
	private function setParams($statement, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($statement, $key, $value);
		}
	}

	//faz um bindParam de cada vez a cada chamada do metodo setParam
	public function setParam($statement, $key, $value){
		$statement->bindParam($key, $value);
	}

	//Execulta a query SQL
	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	//Faz um select que exige retorno de dados
	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);//somente dados associativos
	}

}

?>
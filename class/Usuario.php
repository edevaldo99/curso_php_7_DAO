<?php 

class Usuario {

	//Campos da tabela usuarios.
	private $id;
	private $login;
	private $senha;
	private $cadastro;

	//ID
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	//Login
	public function getLogin(){
		return $this->login;
	}
	public function setLogin($login){
		$this->login = $login;
	}

	//Senha
	public function getSenha(){
		return $this->senha;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}

	//Cadastro
	public function getCadastro(){
		return $this->cadastro;
	}
	public function setCadastro($cad){
		$this->cadastro = $cad;
	}

	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE id = :ID", 
			array(
			":ID" => $id
			)); 
		if(count($results) > 0){
			$row = $results[0];

			$this->setId($row['id']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setCadastro(new DateTime($row['cadastro']));
		}
	}

	public function __toString(){
		return json_encode(array(
			"id"=>$this->getId(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"cadastro"=>$this->getCadastro()->format("d/m/Y H:i:s")
			));
	}
}

 ?>
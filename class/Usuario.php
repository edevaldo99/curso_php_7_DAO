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

			$this->setData($results[0]);
		}
	}

	//Busca todos os usuarios
	public static function getList(){
		$sql = new SQL();
		$result = $sql->select("SELECT * FROM tb_usuarios order by login");
		return $result;
	}

	//busca somente os usuarios através de pesquisa
	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
				':SEARCH'=>"%".$login."%"
			));
	}

	//Faz login e carrega um usuario
	public function login($login, $password){
		$sql = new SQL();
		$total = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :SENHA", array(
			':LOGIN'=>$login,
			':SENHA'=>$password
			));
		if(count($total) > 0){
			$row = $total[0];
			$this->setData($row);
		}else{
			throw new Exception("Login e/ou senha inválidos.");
		}
	}

	//Insere um usuario na tabela atraver de store procedure e retorna para a variavel todos os dados que foram inseridos
	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
			":LOGIN"=>$this->getLogin(),
			":PASSWORD"=>$this->getSenha()
			));
		if(count($results) > 0){
			$this->setData($results[0]);
		};

	}

	public function update($login, $password){
		$this->setLogin($login);
		$this->setSenha($password);

		$sql = new Sql();
		$sql->query("UPDATE tb_usuarios set login = :LOGIN, senha = :PASSWORD WHERE id = :ID", array(
			":LOGIN"=>$this->getLogin(),
			":PASSWORD"=>$this->getSenha(),
			":ID"=>$this->getId()
			));
	}

	public function delete(){
		$sql = new SQL();
		$sql->query("DELETE FROM tb_usuarios WHERE id = :ID", array(":ID"=>$this->getId()));
		$this->setId(0);
		$this->setLogin("");
		$this->setSenha("");
		$this->setData(null);
	}

	//Atribui os valores as variaveis da classe que são passadas através de um array
	public function setData($data){
			$this->setId($data['id']);
			$this->setLogin($data['login']);
			$this->setSenha($data['senha']);
			$this->setCadastro(new DateTime($data['cadastro']));
	}

	//Ao instanciar a classe automaticamente cria um usuario. Se não quiser criar, apenas não passar argumentos.
	public function __construct($login = "", $senha = ""){
		$this->setLogin($login);
		$this->setSenha($senha);
	}

	//Função que mostra todas as informações da Classe Usuario
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
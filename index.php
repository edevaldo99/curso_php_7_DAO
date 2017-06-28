<?php 

require_once("config.php");

//Carrega um usuario
/*
$user = new Usuario();
$user->loadById(2);
echo $user;
*/

//Carrega um lista de usuarios
/*
$lista = Usuario::getList();
echo json_encode($lista);
*/

//Carrega uma lista de usuarios buscando pelo login
/*
$busca = Usuario::search("u");
echo json_encode($busca);
*/

//Carrega um usuario usando o login e a senha
/*
$usuario = new Usuario();
$usuario->login("user", "pass");
echo $usuario;
*/

//Cria um usuario
/*
$aluno = new Usuario("Andressa", "@ndr3ss4");
$aluno->insert();
echo $aluno;
*/

//Altera um usuario
/*
$altera = new Usuario();
$altera->loadById(8);//Primeiro carrega o usuario, o sistema saber qual carregar
$altera->update("professor", "pr0f3ss0R");
*/

//Delete um usuario
$delete = new Usuario();
$delete->loadById(5);
$delete->delete();

?>
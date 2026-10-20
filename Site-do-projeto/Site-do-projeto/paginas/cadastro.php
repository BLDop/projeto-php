<?php
require_once"../includes/cabecalho.php";
require_once "../dados/dados.php";
require_once"../includes/rodape.php";
/**@var array $usuarios */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$novoUsuario = [
"id" => count($usuarios) + 1,
"nome" => $nome,
"email" => $email,
"senha" => $senha,
"tipo" => "usuario"
];

$usuarios[] = $novoUsuario;

}
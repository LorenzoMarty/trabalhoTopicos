<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

require_once "conecta.php";
$conexao = conectar();

$sql = "SELECT * FROM usuario WHERE email='$email'";
$resultado = executarSQL($conexao, $sql);

$usuario = mysqli_fetch_assoc($resultado);
if($usuario == null){
    echo "Email não existe no sistema! Por favor, primeiro realize o cadastro no sistema.";
    die();
}
if($senha == $usuario['senha']){
    $_SESSION['email'] = $usuario['email'];
    header("Location: principal.php");
}else{
    echo "Senha inválida! Tente novamente.";
}

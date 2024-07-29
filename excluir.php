<?php
session_start();
require_once "conecta.php";
$conexao = conectar();

$email = $_GET['email'];
$diretorio = "/img/usuarios/";

$sql1 = "SELECT * FROM usuario WHERE email='$email'";
$usuario = conectarUsuario($conexao);

unlink($diretorio . $usuario['foto']);

$sql = "DELETE FROM usuario WHERE email='$email'";

$resultado = mysqli_query($conexao, $sql);
session_destroy();
header("Location: index.php");

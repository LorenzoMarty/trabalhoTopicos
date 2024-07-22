<?php session_start();
require_once "conecta.php";
$conexao = conectar();
$sql = "SELECT * FROM usuario WHERE email='".$_SESSION['email']."'";
$resultado = executarSQL($conexao, $sql);

$usuario = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
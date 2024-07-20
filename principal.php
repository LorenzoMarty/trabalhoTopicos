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
    <link rel="stylesheet" href="css/style.css">
    <link type="image/png" sizes="96x96" rel="icon" href="img/email.png">
    <title>Document</title>
</head>
<body>
    <h1 class="logado">Seja Bem-vindo <?= $usuario['nome']; ?></h1>
    <a href="form-editar.php">Editar</a>
    <a href="fomr-excluir.php">Excluir</a>

</body>
</html>
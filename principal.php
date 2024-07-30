<?php session_start();

require_once "conecta.php";
$conexao = conectar();
$usuario = conectarUsuario($conexao);

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
<style>
    .logado {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        text-align: center;
    }

    .img {
        width: 150px;
        height: auto;
    }

    .container {
        padding: 2em;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        text-align: left;
        width: 20%;
        height: auto;
    }
</style>

<body>
    <div class="logado container">
        <img class="img" src="img/usuarios/<?= $usuario['foto']; ?>" alt="Foto do Usuário" width="150px" height="auto">
        <h1><?= $usuario['nome']; ?></h1>
        <h2>Seja Bem-Vindo</h2>
        <a href="form-editar.php">Editar</a>
        <a href="excluir.php?email=<?= $usuario['email']; ?>">Excluir</a>
        <a href="sair.php">Sair</a>
    </div>
</body>

</html>